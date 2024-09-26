<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage User</title>
    <style>
        .user-container {
            width: 100%;
            background-color: linear-gradient;
            display: flex;
            flex-direction: column;
        }

        .name {
            margin-top: 1rem;
            text-align: center;
        }

        .user-table {
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
    <div class="user-container">
        <div class="name">
            <h1>List of Users</h1>
        </div>
        <div class="user-table">
            <table>
                <thead>
                    <th>Sr No.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Mobile No.</th>
                    <th>Created Date</th>
                    <th>DELETE</th>
                </thead>
                @if($showusers ->isEmpty())
                <tbody>
                    <tr>
                        <td colspan="8" style="text-align: center;">No users found.</td>
                    </tr>
                </tbody>
                @else
                @foreach($showusers as $users)
                <tbody>
                    
                    <td>{{$users->id}}</td>
                    <td>{{$users->fname}}</td>
                    <td>{{$users->lname}}</td>
                    <td>{{$users->email}}</td>
                    <td>{{$users->city}}</td>
                    <td>{{$users->mobileno}}</td>
                    <td>{{$users->created_at}}</td>
                    <td><button onclick="return confirm('are you sure want to delete the user..?');"><a href="{{ url('deleteuser',$users->id) }}">Delete</a></button></td>
                </tbody>
                @endforeach
                @endif
            </table>
        </div>
    </div>
</body>

</html>