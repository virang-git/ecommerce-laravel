<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: aqua;
        }

        .admin-nav {
            display: flex;
            align-items: center;
            justify-content: space-around;
        }

        .admin-nav img {
            width: 60px;
            height: 60px;
            filter: drop-shadow(5px 10px 15px #000000);
        }

        .admin-companyname {
            font-size: xx-large;
        }

        .main-panel ul {
            display: flex;
            align-items: center;
            justify-content: space-around;
            list-style: none;
            margin-top: 1rem;
            font-size: 1.5rem;
        }
    </style>
</head>

<body>
    <div class="admin-nav">
        <div class="admin-navlogo">
            <img src="{{ asset('asset/images/logo.png') }}" alt="Logo" />
        </div>
        <div class="admin-companyname">
            Madhav Traders
        </div>
    </div>
    <div class="main-panel">
        <ul>
            <a href="{{ url('manageuser') }}">
                <li>Manage User</li>
            </a>
            <a href="{{ url('manageproduct') }}">
                <li>Manage Product</li>
            </a>
            <a href="{{ url('managecategory') }}">
                <li>Manage Category</li>
            </a>
            <a href="{{ url('manageorder') }}">
                <li>Manage Orders</li>
            </a>
            <a href="{{ url('allpayments') }}">
                <li>All Payments</li>
            </a>
            <a href="{{ url('managecontactus') }}">
                <li>Contact Us Details</li>
            </a>
        </ul>
    </div>

    <!-- Main content area -->
    {{-- <div class="main-body">
        {{ $content }}
    </div> --}}
</body>

</html>
