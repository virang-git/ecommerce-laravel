<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories</title>
    <style>
        .category-container {
            width: 100%;
            background-color: linear-gradient;
            display: flex;
            flex-direction: column;
        }

        h1 {
            margin-top: 1rem;
            text-align: center;
        }

        .category-table {
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
    <div class="category-container">
        <div>
            <h1>List of Categories</h1>
        </div>
        <button><a href="{{ url('/addcategory') }}">Add Category</a></button>
        <div class="category-table">
            <table>
                <thead>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                </thead>
                @if($category->isEmpty())
                    <tbody>
                        <tr>
                            <td>No Category is Available</td>
                        </tr>
                    </tbody>
                @else
                @foreach($category as $item)
                <tbody>
                    <td>{{$item->category_id}}</td>
                    <td>{{$item->category_name}}</td>
                    <td><button onclick="return confirm('Are You Sure Want to Edit Category...?');"><a href="{{ url('editcategory',$item->category_id)}}">EDIT</a></button></td>
                    <td><button onclick="return confirm('Are You Sure Want to Delete Category...?');"><a href="{{ url('deletecategory',$item->category_id)}}">DELETE</a></button></td>
                </tbody>
                @endforeach
                @endif
            </table>
        </div>
    </div>
</body>

</html>