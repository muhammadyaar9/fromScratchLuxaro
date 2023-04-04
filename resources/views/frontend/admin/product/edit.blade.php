@extends('frontend.admin.layouts.app')
@section('title')
    <title>Edit Product</title>
@endsection
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />

    <style>
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: #ffffff;
            background: #2196f3;
            padding: 3px 7px;
            border-radius: 3px;
        }

        .bootstrap-tagsinput {
            width: 100%;
        }
    </style>

    <div class="row">
        <!-- Form controls -->
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Product</h5>
                <div class="card-body">
                    <form action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="Pending" name="status">
                        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Product Name </label>
                                    <input type="text"
                                        class="form-control @error('product_name') is-invalid @enderror"name="product_name"
                                        placeholder="Product Name" title="Product Name"
                                        value="{{ $product->product_name }}" />
                                    @if ($errors->has('product_name'))
                                        <span class="text-danger mt-2">{{ $errors->first('product_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Product Price </label>
                                    <input type="text" class="form-control @error('product_price') is-invalid @enderror"
                                        name="product_price" placeholder="Product Price" title="Product Price"
                                        value="{{ $product->product_price }}" />
                                    @if ($errors->has('product_price'))
                                        <span class="text-danger">{{ $errors->first('product_price') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Product SKU </label>
                                    <input type="text" class="form-control @error('sku') is-invalid @enderror"
                                        name="sku" value="{{ $product->sku }}" placeholder="Product Sku"
                                        title="Product Sku" value="{{ old('sku') }}" />
                                    @if ($errors->has('sku'))
                                        <span class="text-danger">{{ $errors->first('sku') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">ProductId </label>
                                    <input type="text" class="form-control @error('productId') is-invalid @enderror"
                                        name="productId" value="{{ $product->productId }}" placeholder="Product Id"
                                        title="Product Name" value="{{ old('productId') }}" />
                                    @if ($errors->has('productId'))
                                        <span class="text-danger mt-2">{{ $errors->first('productId') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Modal Number</label>
                                    <input type="text" class="form-control @error('modal_number') is-invalid @enderror"
                                        value="{{ $product->modal_number }}" name="modal_number" placeholder="Modal Number"
                                        title="Modal Number" value="{{ old('modal_number') }}" />
                                    @if ($errors->has('modal_number'))
                                        <span class="text-danger">{{ $errors->first('modal_number') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Serial Number</label>
                                    <input type="text" class="form-control @error('serial_number') is-invalid @enderror"
                                        value="{{ $product->serial_number }}" name="serial_number"
                                        placeholder="Serial Number" title="Serial Number"
                                        value="{{ old('serial_number') }}" />
                                    @if ($errors->has('serial_number'))
                                        <span class="text-danger">{{ $errors->first('serial_number') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Quantity</label>
                                    <input type="text" class="form-control @error('quantity') is-invalid @enderror"
                                        value="{{ $product->serial_number }}" name="quantity" placeholder="Quantity"
                                        title="Quantity" value="{{ old('quantity') }}" />
                                    @if ($errors->has('quantity'))
                                        <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Product
                                        Description</label>
                                    <textarea class="form-control @error('product_description') is-invalid @enderror" name="product_description"
                                        rows="3" placeholder="Product Description" title="Product Description">{{ $product->product_description }}</textarea>
                                    @if ($errors->has('product_description'))
                                        <span class="text-danger">{{ $errors->first('product_description') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Tags</label>
                                    <input class="form-control @error('tags') is-invalid @enderror" type="text"
                                        data-role="tagsinput" name="tags"
                                        value="@foreach ($product->tags as $tags){{ $tags->name . ',' }} @endforeach">
                                    @if ($errors->has('tags'))
                                        <span class="text-danger">{{ $errors->first('tags') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Product Image </label>
                                    <input type="file"
                                        class="form-control @error('product_image') is-invalid @enderror"
                                        name="product_image" placeholder="Product Image" title="Product Image" />
                                    @if ($errors->has('product_image'))
                                        <span class="text-danger">{{ $errors->first('product_image') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Product Type </label>
                                    <select class="form-control @error('product_type_id') is-invalid @enderror"
                                        name="product_type_id">
                                        <option value="">Select Product Type</option>
                                        @foreach ($productType as $productTyp)
                                            <option
                                                value="{{ $productTyp->id }}"{{ $productTyp->id == $product->product_type_id ? 'selected' : '' }}>
                                                {{ $productTyp->title }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('product_type_id'))
                                        <span class="text-danger">{{ $errors->first('product_type_id') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Product Category </label>
                                    <select class="form-control @error('category_id') is-invalid @enderror "
                                        name="category_id">
                                        <option value="">Select Product Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                {{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Delivory Option
                                    </label>
                                    <select class="form-control @error('delivory_option_id') is-invalid  @enderror"
                                        name="delivory_option_id">
                                        <option value="">Select Delivory Option</option>
                                        @foreach ($delivoryOption as $delivoryOp)
                                            <option value="{{ $delivoryOp->id }}"
                                                {{ $delivoryOp->id == $product->delivory_option_id ? 'selected' : '' }}>
                                                {{ $delivoryOp->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('delivory_option_id'))
                                        <span class="text-danger">{{ $errors->first('delivory_option_id') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Shipping Type </label>
                                    <select class="form-control @error('shipping_type_id') is-invalid  @enderror "
                                        name="shipping_type_id">
                                        <option value="">Select Shipping Type</option>
                                        @foreach ($shippingType as $shippingTy)
                                            <option value="{{ $shippingTy->id }}"
                                                {{ $shippingTy->id == $product->shipping_type_id ? 'selected' : '' }}>
                                                {{ $shippingTy->title }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('shipping_type_id'))
                                        <span class="text-danger">{{ $errors->first('shipping_type_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Shipping Charge
                                    </label>
                                    <input type="text"
                                        class="form-control @error('shipping_charge') is-invalid @enderror"
                                        name="shipping_charge" placeholder="Shipping Charge" title="Shipping Charge"
                                        value="{{ $product->shipping_charge }}" />
                                    @if ($errors->has('shipping_charge'))
                                        <span class="text-danger">{{ $errors->first('shipping_charge') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Product Multiple
                                            images </label>
                                        <input type="file" name="multiple_image[]" class="form-control" multiple>
                                        @if ($errors->has('multiple_image'))
                                            <span class="text-danger">{{ $errors->first('multiple_image') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row py-3">
                                <div class="col-sm-12 text-end">
                                    <a href="{{ route('product.index') }}" class="btn btn-outline-danger mx-2">Closed</a>
                                    <button class="btn btn-outline-primary" type="submit" onclick="this.form.submit();this.disabled=true;">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
@endsection
