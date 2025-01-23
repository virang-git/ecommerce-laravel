<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Contact Us</title>
    
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

        /* Table header styling */
        thead th {
            background-color: #002366; /* Dark blue color */
            color: white;
            padding: 0.75rem;
            font-size: 1rem;
        }

        .contact-container {
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

        .contact-table {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 2rem;
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
            .contact-container {
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
    <div class="contact-container">
        <h1>List of Contact Us</h1>
        <div class="contact-table">
            <table>
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile No.</th>
                        <th>Purpose</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>

                @if($contact->isEmpty())
                <tbody>
                    <tr>
                        <td colspan="4">No Contact Us is Available</td>
                    </tr>
                </tbody>
                @else
                @foreach($contact as $item)
                <tbody>
                    <!-- Sample Static Row -->
                    <tr>
                        <td>{{ $item->contact_id }}</td>
                        <td>{{ $item->contact_name }}</td>
                        <td>{{ $item->contact_email }}</td>
                        <td>{{ $item->contact_mobileno }}</td>
                        <td>{{ $item->purpose }}</td>
                        <td>{{ $item->contact_address }}</td>
                        <td>
                            <button class="delete-btn" onclick="return confirm('Are you sure you want to delete this contact?');">
                                <a href="#">Delete</a>
                            </button>
                        </td>
                    </tr>
                   
                </tbody>
                @endforeach
                @endif
            </table>
        </div>
    </div>
</body>

</html>
