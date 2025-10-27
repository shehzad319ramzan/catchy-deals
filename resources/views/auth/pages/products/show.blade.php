<x-layouts.auth page-title="Product Details">

    @if(!$data)
        <div class="alert alert-danger">
            <strong>Error:</strong> Product not found.
        </div>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
    @else
    <div class="row">
        <div class="col-md-12">
            <x-auth.card card-header="Product Information">
                
                <!-- Product Image and Basic Info -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        @if($data->img_url)
                            <div class="text-center">
                                <img src="{{ $data->img_url }}" alt="{{ $data->title }}" 
                                     class="img-fluid rounded shadow" style="max-height: 300px;">
                            </div>
                        @else
                            <div class="text-center bg-light rounded p-5">
                                <i class="fas fa-image fa-3x text-muted"></i>
                                <p class="text-muted mt-2">No Image Available</p>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-3">{{ $data->title }}</h2>
                        
                        @if($data->description)
                            <div class="mb-3">
                                <h5>Description</h5>
                                <p class="text-muted">{{ $data->description }}</p>
                            </div>
                        @endif

                        @if($data->product_url)
                            <div class="mb-3">
                                <a href="{{ $data->product_url }}" target="_blank" class="btn btn-outline-primary">
                                    <i class="fas fa-external-link-alt me-2"></i>View Product Online
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Product Identifiers -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h5 class="mb-3">Product Identifiers</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-item">
                                    <label class="info-label">ASIN:</label>
                                    <span class="info-value">{{ $data->asin ?? 'Not provided' }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item">
                                    <label class="info-label">EAN:</label>
                                    <span class="info-value">{{ $data->ean ?? 'Not provided' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pricing Information -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h5 class="mb-3">Pricing Information</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="price-card">
                                    <div class="price-label">Current Price</div>
                                    <div class="price-value current-price">
                                        {{ $data->current_price ? '$' . number_format($data->current_price, 2) : 'Not set' }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="price-card">
                                    <div class="price-label">Old Price</div>
                                    <div class="price-value old-price">
                                        {{ $data->old_price ? '$' . number_format($data->old_price, 2) : 'Not set' }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="price-card">
                                    <div class="price-label">Savings</div>
                                    <div class="price-value savings">
                                        @if($data->current_price && $data->old_price)
                                            ${{ number_format($data->old_price - $data->current_price, 2) }}
                                        @else
                                            Not available
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Regional Pricing -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h5 class="mb-3">Regional Pricing</h5>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="region-price">
                                    <div class="region-flag">🇩🇪</div>
                                    <div class="region-name">Germany</div>
                                    <div class="region-price-value">
                                        {{ $data->de_price ? '$' . number_format($data->de_price, 2) : 'Not set' }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="region-price">
                                    <div class="region-flag">🇪🇸</div>
                                    <div class="region-name">Spain</div>
                                    <div class="region-price-value">
                                        {{ $data->es_price ? '$' . number_format($data->es_price, 2) : 'Not set' }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="region-price">
                                    <div class="region-flag">🇫🇷</div>
                                    <div class="region-name">France</div>
                                    <div class="region-price-value">
                                        {{ $data->fr_price ? '$' . number_format($data->fr_price, 2) : 'Not set' }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="region-price">
                                    <div class="region-flag">🇮🇹</div>
                                    <div class="region-name">Italy</div>
                                    <div class="region-price-value">
                                        {{ $data->it_price ? '$' . number_format($data->it_price, 2) : 'Not set' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h5 class="mb-3">Additional Information</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-item">
                                    <label class="info-label">Posted At:</label>
                                    <span class="info-value">
                                        {{ $data->posted_at ? $data->posted_at->format('M d, Y \a\t g:i A') : 'Not set' }}
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item">
                                    <label class="info-label">Created At:</label>
                                    <span class="info-value">{{ $data->created_at->format('M d, Y \a\t g:i A') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex gap-2">
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back to Products
                            </a>
                            @if (auth()->user()->can('edit_product'))
                                <a href="{{ route('products.edit', $data->id) }}" class="btn btn-primary">
                                    <i class="fas fa-edit me-2"></i>Edit Product
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

            </x-auth.card>
        </div>
    </div>
    @endif

    <style>
        .info-item {
            margin-bottom: 1rem;
        }
        .info-label {
            font-weight: 600;
            color: #6c757d;
            display: block;
            margin-bottom: 0.25rem;
        }
        .info-value {
            color: #212529;
            font-size: 1rem;
        }
        .price-card {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 1.5rem;
            text-align: center;
            height: 100%;
        }
        .price-label {
            font-size: 0.875rem;
            color: #6c757d;
            margin-bottom: 0.5rem;
        }
        .price-value {
            font-size: 1.5rem;
            font-weight: 600;
        }
        .current-price {
            color: #28a745;
        }
        .old-price {
            color: #dc3545;
            text-decoration: line-through;
        }
        .savings {
            color: #17a2b8;
        }
        .region-price {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 1rem;
            text-align: center;
            height: 100%;
        }
        .region-flag {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }
        .region-name {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        .region-price-value {
            font-size: 1.25rem;
            color: #28a745;
            font-weight: 600;
        }
    </style>

</x-layouts.auth>
