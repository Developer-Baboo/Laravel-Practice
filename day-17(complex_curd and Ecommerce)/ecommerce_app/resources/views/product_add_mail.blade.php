<!-- resources/views/product_add_mail.blade.php -->

@component('mail::message')
# New Product Added: {{ $product->name }}

Dear Sir/Madam {{ $notifiable->name }},

We are excited to inform you that a new product has been added to our catalog.

**Product Details:**
- **Name:** {{ $product->name }}
- **Description:** {{ $product->description }}
- **Original Price:** ${{ number_format($product->original_price, 10) }}
- **Selling Price:** ${{ number_format($product->selling_price, 10) }}

@component('mail::button', ['url' => url("/products/{$product->id}")])
View Product
@endcomponent

Thank you for choosing our products. If you have any questions, feel free to contact us.

@endcomponent
