<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
</head>
<body>
    <div class="add-product" >
        <form action="{{ route('updateproduct',$product->product_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="p_name">
                <input type="text" name="product_name" value="{{ $product->product_name }}" placeholder="Enter Product Name" required/>
            </div>
            <div class="p_image">
                <input type="file" name="product_image" value="{{ $product->product_image }}" placeholder="Enter Product Image" multiple />
                <img src="{{ asset('asset/images/product_images/'.$product->product_image) }}" />
            </div>
            <div class="p_description">
                <textarea type="text" name="product_description"  placeholder="Enter Product Description" required>{{ $product->product_description }}</textarea>
            </div>
            <div class="p_price">
                <input type="text" name="product_price" value="{{ $product->product_price }}"  placeholder="Enter Product Price" required/>
            </div>
            <div class="p_quantity">
                <input type="number" name="product_quantity" value="{{ $product->product_quantity }}" placeholder="Enter Product Quantity" required/>
            </div>
            <div class="p_category">
                <input type="text" name="category_id" value="{{ $product->category_id }}" placeholder="Enter Product Category" required/>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>