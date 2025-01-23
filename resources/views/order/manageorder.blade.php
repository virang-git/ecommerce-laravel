<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders</title>
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

        /* Styling the header similar to the other pages */
        thead th {
            background-color: #002366; /* Same dark blue as other pages */
            color: white;
            padding: 0.75rem;
            font-size: 1rem;
        }

        .order-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2rem;
            text-align: center;
            color: #002366;
            margin-bottom: 20px;
        }

        .order-table {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 2rem;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: center;
        }

        /* Alternating row colors for better readability */
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Delete button styling */
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
            .order-container {
                padding: 10px;
            }

            table th, table td {
                padding: 10px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <div class="order-container">
        <h1>List of Orders</h1>
        <div class="order-table">
            <table>
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>User Name</th>
                        <th>Order Status</th>
                        <th>Total Amount</th>
                        <th>Order Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($order->isEmpty())
                    <tr>
                        <td colspan="6" style="text-align: center;">No Orders Available</td>
                    </tr>
                    @else
                    @foreach ($order as $list)
                    <tr>
                        <td>{{ $list->order_id }}</td>
                        <td>{{ $list->user_id }}</td> <!-- You can fetch username by joining the user table if needed -->
                        <td>{{ $list->order_status }}</td>
                        <td>{{ $list->total_amount }}</td>
                        <td>{{ $list->order_date }}</td>
                        <td>
                            <button class="delete-btn" onclick="return confirm('Are you sure you want to delete this order?');">
                                <a href="{{ url('deleteorder', $list->order_id) }}">Delete</a>
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
