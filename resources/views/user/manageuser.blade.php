<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        /* Apply the same thead style as Products and Categories */
        thead th {
            background-color: #002366; /* Same dark blue as other pages */
            color: white;
            padding: 0.75rem;
            font-size: 1rem;
        }

        .user-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .user-header {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 2rem;
            color: #002366;
        }

        .user-table {
            width: 100%;
            border-collapse: collapse;
        }

        .user-table th, .user-table td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .user-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .user-table tr:hover {
            background-color: #f1f1f1;
        }

        .delete-btn {
            background-color: #ff4d4d;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .delete-btn:hover {
            background-color: #cc0000;
        }

        .delete-btn a {
            color: white;
            text-decoration: none;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .user-container {
                padding: 10px;
            }

            .user-table th, .user-table td {
                padding: 10px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <div class="user-container">
        <div class="user-header">
            <h1>Manage Users</h1>
        </div>
        <div class="user-table-container">
            <table class="user-table">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>City</th>
                        <th>Mobile No.</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($showusers->isEmpty())
                    <tr>
                        <td colspan="8" style="text-align: center;">No users found.</td>
                    </tr>
                    @else
                    @foreach($showusers as $users)
                    <tr>
                        <td>{{$users->id}}</td>
                        <td>{{$users->fname}}</td>
                        <td>{{$users->lname}}</td>
                        <td>{{$users->email}}</td>
                        <td>{{$users->city}}</td>
                        <td>{{$users->mobileno}}</td>
                        <td>{{$users->created_at}}</td>
                        <td>
                            <button class="delete-btn" onclick="return confirm('Are you sure you want to delete the user?');">
                                <a href="{{ url('deleteuser', $users->id) }}">Delete</a>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
