<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Payments</title>
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

        /* Table header styling similar to other pages */
        thead th {
            background-color: #002366; /* Dark blue color */
            color: white;
            padding: 0.75rem;
            font-size: 1rem;
        }

        .payment-container {
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

        .payment-table {
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
            .payment-container {
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
    <div class="payment-container">
        <h1>List of Payments</h1>
        <div class="payment-table">
            <table>
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Order Id</th>
                        <th>User Name</th>
                        <th>Payment Mode</th>
                        <th>Payment Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <td>1</td>
                        <td>23</td>
                        <td>Virang</td>
                        <td>UPI</td>
                        <td>29/08/2024</td>
                        <td>
                            <button class="delete-btn" onclick="return confirm('Are you sure you want to delete this payment?');">
                                <a href="#">Delete</a>
                            </button>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
