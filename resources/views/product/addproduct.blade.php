<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .add-product {
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        .add-product form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .add-product h2 {
            text-align: center;
            margin-bottom: 1rem;
            font-size: 1.5rem;
            color: #333;
        }

        .add-product input, .add-product textarea, .add-product select {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border 0.3s ease;
        }

        .add-product input:focus, .add-product textarea:focus, .add-product select:focus {
            border: 1px solid #007bff;
        }

        textarea {
            resize: none;
            height: 100px;
        }

        .add-product button {
            padding: 0.8rem;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .add-product button:hover {
            background-color: #0056b3;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .add-product {
                padding: 1.5rem;
            }

            .add-product button {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .add-product {
                padding: 1rem;
            }

            .add-product input, .add-product textarea, .add-product select {
                padding: 0.6rem;
                font-size: 0.9rem;
            }

            .add-product button {
                font-size: 0.8rem;
                padding: 0.7rem;
            }
        }
    </style>
</head>
<body>
    <div class="add-product">
        <h2>Add New Product</h2>
        <form action="{{ route('storeproduct') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="p_name">
                <input type="text" name="product_name" placeholder="Enter Product Name" required/>
            </div>
            <div class="p_image">
                <input type="file" name="product_image" placeholder="Enter Product Image" multiple required/>
            </div>
            <div class="p_description">
                <textarea name="product_description" placeholder="Enter Product Description" required></textarea>
            </div>
            <div class="p_price">
                <input type="text" name="product_price" placeholder="Enter Product Price" required/>
            </div>
            <div class="p_quantity">
                <input type="number" name="product_quantity" placeholder="Enter Product Quantity" required/>
            </div>
            <div class="p_category">
                <select name="category_id" required>
                    <option value="">Select The Category</option>
                    @if ($category->isEmpty())
                        <option>No Category Available</option>
                    @else
                        @foreach ($category as $item)
                            <option value="{{ $item->category_id }}">{{$item->category_name}}</option>
                        @endforeach
                    @endif
                </select> 
            </div>
            <button type="submit">Add Product</button>
        </form>
    </div>
</body>
</html>
