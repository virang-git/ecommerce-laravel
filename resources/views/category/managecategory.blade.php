<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories</title>
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

        .category-container {
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

        .add-category-btn {
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

        .add-category-btn:hover {
            background-color: #003a99;
        }

        .category-table-wrapper {
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

            button {
                padding: 0.3rem 0.6rem;
            }
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="category-container">
        <h1>List of Categories</h1>
        <a href="{{ url('/addcategory') }}" class="add-category-btn">Add Category</a>

        <div class="category-table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                @if($category->isEmpty())
                <tbody>
                    <tr>
                        <td colspan="4">No Category is Available</td>
                    </tr>
                </tbody>
                @else
                @foreach($category as $item)
                <tbody>
                    <tr>
                        <td>{{ $item->category_id }}</td>
                        <td>{{ $item->category_name }}</td>
                        <td><button class="edit" onclick="return confirm('Are you sure you want to edit this category?');"><a href="{{ url('editcategory', $item->category_id) }}">Edit</a></button></td>
                        <td><button class="delete-category-btn" data-id="{{ $item->category_id }}">Delete</button></td>
                    </tr>
                </tbody>
                @endforeach
                @endif
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.delete-category-btn').on('click', function (e) {
                e.preventDefault();

                if (!confirm('Are you sure you want to delete this category?')) return;

                // Get the category ID from the button's data-id attribute
                let categoryId = $(this).data('category_id');

                $.ajax({
                    url: `{{ url('deletecategory') }}/${categoryId}`,
                    type: 'DELETE',

                    success: function (response) {
                        alert(response.message); // Optional: Display a success message
                        
                        // Remove the deleted row from the table
                        $('#category-' + categoryId).remove();
                    },
                    error: function (xhr) {
                        alert('Failed to delete the category. Please try again.');
                    }
                });
            });
        });
    </script>
</body>

</html>
