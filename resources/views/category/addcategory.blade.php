<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Category</title>
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

        .add-category {
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .add-category form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .add-category h2 {
            text-align: center;
            margin-bottom: 1rem;
            font-size: 1.5rem;
            color: #333;
        }

        .add-category input {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border 0.3s ease;
        }

        .add-category input:focus {
            border: 1px solid #007bff;
        }

        .add-category button {
            padding: 0.8rem;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .add-category button:hover {
            background-color: #0056b3;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .add-category {
                padding: 1.5rem;
            }

            .add-category button {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .add-category {
                padding: 1rem;
            }

            .add-category input {
                padding: 0.6rem;
                font-size: 0.9rem;
            }

            .add-category button {
                font-size: 0.8rem;
                padding: 0.7rem;
            }
        }
    </style>
</head>
<body>
    <div class="add-category">
        <h2>Add Category</h2>
        <form action="{{ route('storecategory') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="category_nm">
                <input type="text" name="category_name" placeholder="Enter Category" required/>
            </div>
            <button type="submit">Add Category</button>
        </form>
    </div>
</body>
</html>
