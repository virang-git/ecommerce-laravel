<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .product-container {
            width: 90%;
            max-width: 1200px;
            margin: 2rem auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
        }

        h1 {
            text-align: center;
            color: #002366;
            margin-bottom: 1rem;
            font-size: 2rem;
            font-weight: bold;
        }

        .add-product-btn {
            display: inline-block;
            background-color: #002366;
            color: white;
            padding: 0.7rem 1.2rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
            margin-bottom: 1.5rem;
        }

        .add-product-btn:hover {
            background-color: #003a99;
        }

        .product-table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2rem;
            text-align: center;
        }

        thead th {
            background-color: #002366;
            color: white;
            padding: 0.75rem;
            font-size: 1rem;
        }

        tbody td {
            padding: 0.75rem;
            border: 1px solid #ddd;
            font-size: 0.9rem;
            vertical-align: middle;
        }

        tbody td img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 4px;
            border: 2px solid #ddd;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        button {
            background-color: #ff0000;
            color: white;
            padding: 0.4rem 0.8rem;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button a {
            color: white;
            text-decoration: none;
        }

        button:hover {
            background-color: #cc0000;
        }

        button.edit {
            background-color: #4CAF50;
        }

        button.edit:hover {
            background-color: #45a049;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            h1 {
                font-size: 1.5rem;
            }

            table {
                font-size: 0.8rem;
            }

            tbody td img {
                width: 60px;
                height: 60px;
            }

            button {
                padding: 0.3rem 0.6rem;
            }
        }
    </style>
</head>

<body>
    <div class="product-container">
        <h1>List of Products</h1>
        <a href="{{ url('/addproduct') }}" class="add-product-btn">Add Product</a>

        <div class="product-table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Description</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Product Category</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                @if($product->isEmpty())
                <tbody>
                    <tr>
                        <td colspan="9">No Product is Available</td>
                    </tr>
                </tbody>
                @else
                @foreach($product as $item)
                <tbody>
                    <tr>
                        <td>{{ $item->product_id }}</td>
                        <td><img src="{{ asset('asset/images/product_images/'.$item->product_image) }}" alt="{{ $item->product_name }}"></td>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->product_description }}</td>
                        <td>${{ $item->product_price }}</td>
                        <td>{{ $item->product_quantity }}</td>
                        <td>{{ $item->category_id }}</td>
                        <td><button class="edit" onclick="return confirm('Are you sure you want to edit this product?');"><a href="{{ url('editproduct', $item->product_id) }}">Edit</a></button></td>
                        <td><button onclick="return confirm('Are you sure you want to delete this product?');"><a href="{{ url('deleteproduct', $item->product_id) }}">Delete</a></button></td>
                    </tr>
                </tbody>
                @endforeach
                @endif
            </table>
        </div>
    </div>
</body>

</html>
