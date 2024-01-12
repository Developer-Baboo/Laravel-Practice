<!-- resources/views/emails/product_added_mail.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Product Added</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles for the email */
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        .header {
            background-color: #007bff;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .product-details {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            text-decoration: none;
            color: #fff;
            cursor: pointer;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .footer {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Product Added: {{ $product->name }}</h2>
        </div>

        <div class="product-details">
            <p>Dear {{ $notifiable->name }},</p>

            <p>We are excited to inform you that a new product has been added to our catalog.</p>

            <strong>Product Details:</strong>
            <ul>
                <li><strong>Name:</strong> {{ $product->name }}</li>
                <li><strong>Description:</strong> {{ $product->description }}</li>
                <li><strong>Original Price:</strong> ${{ number_format($product->original_price, 2) }}</li>
                <li><strong>Selling Price:</strong> ${{ number_format($product->selling_price, 2) }}</li>
            </ul>

            <p>
                <a href="{{ url("/products/{$product->id}") }}" class="btn btn-primary">
                    View Product
                </a>
            </p>

            <p>Thank you for choosing our products. If you have any questions, feel free to contact us.</p>
        </div>

        <div class="footer">
            &copy; 2022 Your Company. All rights reserved.
        </div>
    </div>
</body>
</html>
