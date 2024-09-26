<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Payments</title>
    <style>
        .payment-container {
            width: 100%;
            background-color: linear-gradient;
            display: flex;
            flex-direction: column;
        }

        h1 {
            margin-top: 1rem;
            text-align: center;
        }

        .payment-table {
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
    <div class="payment-container">
        <div>
            <h1>List of Payments</h1>
        </div>
        <div class="payment-table">
            <table>
                <thead>
                    <th>Sr No.</th>
                    <th>Order Id</th>
                    <th>User Name</th>
                    <th>Payment Mode</th>
                    <th>Payment Date</th>
                    <th>DELETE</th>
                </thead>
                <tbody>
                    <td>1</td>
                    <td>23</td>
                    <td>Virang</td>
                    <td>UPI</td>
                    <td>29/08/2024</td>
                    <td><button>DELETE</button></td>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>