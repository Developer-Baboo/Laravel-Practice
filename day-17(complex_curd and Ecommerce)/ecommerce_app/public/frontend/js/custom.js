$(document).ready(function () {
    // Add To Cart
    $('.addtoCartbtn').click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty,
            },
            success: function (response) {
                alert(response.status); // Display the response message in an alert
                if (response.status === 'Login to continue') {
                    console.log('Inside AJAX success function'); // Debugging line
                    // Redirect the user to the login page
                    window.location.href = "{{ route('login') }}"; // Note: This line may not work in a separate .js file
                }
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText); // Log any error response for debugging
                alert('An error occurred. Please try again.'); // Display an error message
            }
        });
    });

    // Increment quantity
    $('.increment-btn').click(function (e) {
        e.preventDefault();

        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_value, 10);

        // Check if value is NaN (Not-a-Number)
        value = isNaN(value) ? 0 : value;

        if (value < 10) {
            value++;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    // Decrement quantity
    $('.decrement-btn').click(function (e) {
        e.preventDefault();

        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_value, 10);

        // Check if value is NaN (Not-a-Number)
        value = isNaN(value) ? 0 : value;

        if (value > 1) {
            value--;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });


    //Delete product cart item
    $('.delete-cart-item').click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajax({
            type: "POST",
            url: "delete-cart-item",
            data: {
                'prod_id':prod_id,
            },
            dataType: "dataType",
            success: function (response) {
                alert(response.status); // Display the response message in an alert
            }
        });
    });


});
