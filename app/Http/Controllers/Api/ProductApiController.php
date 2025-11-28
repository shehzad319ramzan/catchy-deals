<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
use App\Models\product;
use App\Http\Requests\productRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProductApiController extends Controller
{
    /**
     * Display a listing of products.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {
            // Get unique product URLs - only the latest product for each product_url
            // Using a subquery to find the product with the latest created_at for each product_url
            $uniqueProductIds = product::select('id')
                ->where('created_at', '>=', now()->subHours(48))
                ->whereNotNull('product_url')
                ->whereRaw('created_at = (
                    SELECT MAX(p2.created_at) 
                    FROM products as p2 
                    WHERE p2.product_url = products.product_url 
                    AND p2.created_at >= ? 
                    AND p2.product_url IS NOT NULL
                )', [now()->subHours(48)])
                ->pluck('id');
            
            // Also include products with null product_url (they are unique by default)
            $nullUrlProductIds = product::where('created_at', '>=', now()->subHours(48))
                ->whereNull('product_url')
                ->pluck('id');
            
            // Merge both sets of IDs
            $allUniqueIds = $uniqueProductIds->merge($nullUrlProductIds);
            
            // Build the main query with unique products
            $query = product::whereIn('id', $allUniqueIds);
            
            // Sorting
            $sortBy = $request->get('sort_by', 'created_at');
            $sortOrder = $request->get('sort_order', 'desc');
            $query->orderBy($sortBy, $sortOrder);
            
            // Filtering
            if ($request->has('min_price')) {
                $query->where('current_price', '>=', $request->get('min_price'));
            }
            
            if ($request->has('max_price')) {
                $query->where('current_price', '<=', $request->get('max_price'));
            }
            
            if ($request->has('status')) {
                $query->where('status', $request->get('status'));
            }
            
            // DEFAULT: Return ALL products without pagination
            // Only use pagination if explicitly requested with 'paginate=true' parameter
            $shouldPaginate = $request->get('paginate', false);
            
            if ($shouldPaginate === true || $shouldPaginate === 'true' || $shouldPaginate === '1') {
                // Pagination requested explicitly
                $perPage = $request->get('per_page', 15);
                $perPage = (int)$perPage;
                if ($perPage <= 0) {
                    $perPage = 15;
                }
                $page = $request->get('page', 1);
                $products = $query->paginate($perPage, ['*'], 'page', $page);
                
                return response()->json([
                    'success' => true,
                    'message' => 'Products retrieved successfully',
                    'data' => new ProductCollection($products),
                    'meta' => [
                        'current_page' => $products->currentPage(),
                        'last_page' => $products->lastPage(),
                        'per_page' => $products->perPage(),
                        'total' => $products->total(),
                        'from' => $products->firstItem(),
                        'to' => $products->lastItem(),
                    ]
                ]);
            }
            
            // Return ALL products (DEFAULT BEHAVIOR)
            $products = $query->get();
            $total = $products->count();
            
            return response()->json([
                'success' => true,
                'message' => 'Products retrieved successfully',
                'data' => new ProductCollection($products),
                'meta' => [
                    'current_page' => 1,
                    'last_page' => 1,
                    'per_page' => $total,
                    'total' => $total,
                    'from' => 1,
                    'to' => $total,
                ]
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error retrieving products',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created product.
     *
     * @param productRequest $request
     * @return JsonResponse
     */
    public function store(productRequest $request): JsonResponse
    {
        try {
            // Delete products older than 48 hours before creating a new one
            $deletedCount = product::where('created_at', '<', now()->subHours(48))->delete();
            
            // Create the new product
            $product = product::create($request->validated());
            
            $message = 'Product created successfully';
            if ($deletedCount > 0) {
                $message .= " ({$deletedCount} old product(s) deleted)";
            }
            
            return response()->json([
                'success' => true,
                'message' => $message,
                'data' => new ProductResource($product)
            ], 201);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creating product',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}