<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow: hidden;
        }

        /* Navbar */
        .admin-nav {
            display: flex;
            align-items: center;
            background-color: #17a2b8;
            color: white;
            padding: 10px;
        }

        .admin-nav img {
            height: 40px;
            margin-right: 10px;
        }

        .admin-companyname {
            font-size: 20px;
            font-weight: bold;
        }

        /* Sidebar */
        .main-panel {
            width: 200px;
            background-color: #343a40;
            color: white;
            padding: 15px 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
            position: fixed;
            top: 60px;
            bottom: 0;
            overflow-y: auto;
        }

        .main-panel a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            transition: background-color 0.3s;
        }

        .main-panel a.active,
        .main-panel a:hover {
            background-color: #17a2b8;
            border-radius: 5px;
        }

        /* Content Area */
        .main-body {
            margin-left: 220px;
            padding: 20px;
            overflow-y: auto;
            height: calc(100vh - 60px);
        }

        @media (max-width: 768px) {
            .main-panel {
                width: 100%;
                position: relative;
            }

            .main-body {
                margin-left: 0;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Navbar -->
        <div class="admin-nav">
            <img src="{{ asset('asset/images/logo.png') }}" alt="Logo" />
            <div class="admin-companyname">Madhav Traders</div>
        </div>

        <!-- Sidebar -->
        <div class="main-panel">
            <a href="{{ url('dashboard') }}" class="ajax-link active">Dashboard</a>
            <a href="{{ url('manageuser') }}" class="ajax-link">Manage User</a>
            <a href="{{ url('manageproduct') }}" class="ajax-link">Manage Product</a>
            <a href="{{ url('managecategory') }}" class="ajax-link">Manage Category</a>
            <a href="{{ url('manageorder') }}" class="ajax-link">Manage Orders</a>
            <a href="{{ url('allpayments') }}" class="ajax-link">All Payments</a>
            <a href="{{ url('managecontactus') }}" class="ajax-link">Contact Us Details</a>
        </div>


        <!-- Content Area -->
        <div class="main-body">
        
        </div> 
    </div>

    <script>
       
     //manage user and all content loaded
    $(document).ready(function () {
        // Function to load content dynamically
        function loadContent(url, link) {
            // Show loading indicator
            $('.main-body').html('<p>Loading...</p>');

            $.ajax({
                url: url,
                type: 'GET',
                success: function (response) {
                    $('.main-body').html(response); // Inject the content
                    $('.main-panel a').removeClass('active'); // Remove active class from all links
                    link.addClass('active'); // Add active class to the clicked link
                },
                error: function () {
                    $('.main-body').html('<p>Error loading content. Please try again later.</p>');
                }
            });
        }

        // Handle clicks on sidebar links
        $('.ajax-link').on('click', function (e) {
            e.preventDefault(); // Prevent default link behavior
            const url = $(this).attr('href'); // Get the URL to load
            loadContent(url, $(this));
        });
    });


    </script>
</body>
</html>
