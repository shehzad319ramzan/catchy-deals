<x-layouts.auth page-title="All Products">


    @if (auth()->user()->can('add_product'))
        <x-slot name="sideButton">
            <!-- Add product Button -->
            <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">
                Add Product
            </a>
        </x-slot>
    @endif

    <div class="row" style="min-height: 100vh !important;">
        <div class="col-md-12">
            <x-auth.card card-header="All Products">
                <x-auth.datatable>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>ASIN</th>
                            <th>Current Price</th>
                            <th>Old Price</th>
                            <th>Posted At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['all'] as $key => $product)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $product?->title }}</td>
                                <td>{{ $product?->asin }}</td>
                                <td>{{ $product?->current_price ? '$' . number_format($product->current_price, 2) : '-' }}</td>
                                <td>{{ $product?->old_price ? '$' . number_format($product->old_price, 2) : '-' }}</td>
                                <td>{{ $product?->posted_at ? $product->posted_at->format('Y-m-d') : '-' }}</td>
                                <td style="display: flex; justify-content: space-between; align-items: center;">
                                    @if (auth()->user()->can('view_product'))
                                        <x-action-buttons.detail route="{{ route('products.show', $product?->id) }}" />
                                    @endif

                                    @if (auth()->user()->can('edit_product'))
                                        <x-action-buttons.edit route="{{ route('products.edit', $product?->id) }}" />
                                    @endif

                                    @if (auth()->user()->can('delete_product'))
                                        <x-action-buttons.trash route="{{ route('products.destroy', $product?->id) }}" />
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-auth.datatable>
            </x-auth.card>
        </div>
    </div>

</x-layouts.auth>
