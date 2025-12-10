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
            // Eager loading optimization - only select columns that are needed
            $query = product::select([
                'id',
                'title',
                'asin',
                'ean',
                'product_url',
                'img_url',
                'description',
                'current_price',
                'old_price',
                'de_price',
                'es_price',
                'fr_price',
                'it_price',
                'posted_at',
                'status',
                'created_at',
                'updated_at'
            ]);
            
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
            $product = product::create($request->validated());
            
            return response()->json([
                'success' => true,
                'message' => 'Product created successfully',
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
