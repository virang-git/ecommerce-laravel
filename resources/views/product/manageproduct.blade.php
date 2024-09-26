<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
    <style>
        .product-container {
            width: 100%;
            background-color: linear-gradient;
            display: flex;
            flex-direction: column;
        }

        h1 {
            margin-top: 1rem;
            text-align: center;
        }

        .product-table {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 2rem;
            text-align: center;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 0.5rem 0.5rem 0.5rem 0.5rem;
        }
    </style>
</head>

<body>
    <div class="product-container">
        <div>
            <h1>List of Products</h1>
            <button><a href="{{ url('/addproduct') }}">Add Product</a></button>
        </div>
        <div class="product-table">
            <table>
                <thead>
                    <th>Sr No.</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Description</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    <th>Product Category</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                </thead>
                @if($product ->isEmpty())
                    <tbody>
                        <tr>
                            <td>No Product is Available</td>
                        </tr>
                    </tbody>
                @else
                @foreach($product as $item)
                <tbody>
                    <td>{{$item-> product_id}}</td>
                    <td><img src="{{ asset('asset/images/product_images/'.$item->product_image) }}" width="100" height="100" alt="{{ $item->product_image }}"  </td>
                    <td>{{$item-> product_name}}</td>
                    <td>{{$item-> product_description}}</td>
                    <td>{{$item-> product_price}}</td>
                    <td>{{$item-> product_quantity}}</td>
                    <td>{{$item-> category_id}}</td>
                    <td><button onclick="return confirm('Are you Sure Want to Edit this Product...?');"><a href=" {{ url('editproduct', $item-> product_id) }}">Edit</a></button></td>
                    <td><button onclick="return confirm('Are you Sure Want to Delete this Product...?');"><a href=" {{ url('deleteproduct', $item-> product_id) }}">Delete</a></button></td>
                </tbody>
                @endforeach
                @endif
            </table>
        </div>
    </div>
</body>

</html>