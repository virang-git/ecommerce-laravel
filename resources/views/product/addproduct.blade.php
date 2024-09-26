<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
</head>
<body>
    <div class="add-product" >
        <form action="{{ route('storeproduct') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="p_name">
                <input type="text" name="product_name" placeholder="Enter Product Name" required/>
            </div>
            <div class="p_image">
                <input type="file" name="product_image" placeholder="Enter Product Image" multiple required/>
            </div>
            <div class="p_description">
                <textarea type="text" name="product_description" placeholder="Enter Product Description" required></textarea>
            </div>
            <div class="p_price">
                <input type="text" name="product_price" placeholder="Enter Product Price" required/>
            </div>
            <div class="p_quantity">
                <input type="number" name="product_quantity" placeholder="Enter Product Quantity" required/>
            </div>
            <div class="p_category">
                {{-- <input type="text" name="category_id" placeholder="Enter Product Category" required/> --}}
                <select name="category_id">
                    Select The Category
                    <option>Select an Option</option>
                    @if ($category->isEmpty())
                        <option>No Category Available</option>
                    @else
                        @foreach ($category as $item)
                            <option value="{{ $item->category_id }}">{{$item->category_name}}</option>
                        @endforeach
                    @endif
                </select> 
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>