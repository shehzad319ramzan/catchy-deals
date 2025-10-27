<x-layouts.auth page-title="Edit Product">

    <div class="row">
        <div class="col-md-12">
            <x-auth.card card-header="Edit Product">
                <form action="{{ route('products.update', $data?->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                       id="title" name="title" value="{{ old('title', $data?->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="asin">ASIN</label>
                                <input type="text" class="form-control @error('asin') is-invalid @enderror" 
                                       id="asin" name="asin" value="{{ old('asin', $data?->asin) }}">
                                @error('asin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ean">EAN</label>
                                <input type="text" class="form-control @error('ean') is-invalid @enderror" 
                                       id="ean" name="ean" value="{{ old('ean', $data?->ean) }}">
                                @error('ean')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_url">Product URL</label>
                                <input type="url" class="form-control @error('product_url') is-invalid @enderror" 
                                       id="product_url" name="product_url" value="{{ old('product_url', $data?->product_url) }}">
                                @error('product_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="img_url">Image URL</label>
                                <input type="url" class="form-control @error('img_url') is-invalid @enderror" 
                                       id="img_url" name="img_url" value="{{ old('img_url', $data?->img_url) }}">
                                @error('img_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                          id="description" name="description" rows="4">{{ old('description', $data?->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="current_price">Current Price</label>
                                <input type="number" step="0.01" class="form-control @error('current_price') is-invalid @enderror" 
                                       id="current_price" name="current_price" value="{{ old('current_price', $data?->current_price) }}">
                                @error('current_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="old_price">Old Price</label>
                                <input type="number" step="0.01" class="form-control @error('old_price') is-invalid @enderror" 
                                       id="old_price" name="old_price" value="{{ old('old_price', $data?->old_price) }}">
                                @error('old_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="de_price">DE Price</label>
                                <input type="number" step="0.01" class="form-control @error('de_price') is-invalid @enderror" 
                                       id="de_price" name="de_price" value="{{ old('de_price', $data?->de_price) }}">
                                @error('de_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="es_price">ES Price</label>
                                <input type="number" step="0.01" class="form-control @error('es_price') is-invalid @enderror" 
                                       id="es_price" name="es_price" value="{{ old('es_price', $data?->es_price) }}">
                                @error('es_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fr_price">FR Price</label>
                                <input type="number" step="0.01" class="form-control @error('fr_price') is-invalid @enderror" 
                                       id="fr_price" name="fr_price" value="{{ old('fr_price', $data?->fr_price) }}">
                                @error('fr_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="it_price">IT Price</label>
                                <input type="number" step="0.01" class="form-control @error('it_price') is-invalid @enderror" 
                                       id="it_price" name="it_price" value="{{ old('it_price', $data?->it_price) }}">
                                @error('it_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="posted_at">Posted At</label>
                                <input type="datetime-local" class="form-control @error('posted_at') is-invalid @enderror" 
                                       id="posted_at" name="posted_at" value="{{ old('posted_at', $data?->posted_at ? $data?->posted_at->format('Y-m-d\TH:i') : '') }}">
                                @error('posted_at')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update Product</button>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </x-auth.card>
        </div>
    </div>

</x-layouts.auth>
