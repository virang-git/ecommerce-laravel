<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Contact Us</title>
    <style>
        .contact-container {
            width: 100%;
            background-color: linear-gradient;
            display: flex;
            flex-direction: column;
        }

        h1 {
            margin-top: 1rem;
            text-align: center;
        }

        .contact-table {
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
    <div class="contact-container">
        <div>
            <h1>List of Contact Us </h1>
        </div>
        <div class="contact-table">
            <table>
                <thead>
                    <th>Sr No.</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Mobile No.</th>
                    <th>Purpose</th>
                    <th>Address</th>
                    <th>DELETE</th>
                </thead>
                <tbody>
                    <td>1</td>
                    <td>Virang</td>
                    <td>v@gmail.com</td>
                    <td>9998887776</td>
                    <td>Get Sample Of Boil rice</td>
                    <td>Valsad</td>
                    <td><button>DELETE</button></td>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>