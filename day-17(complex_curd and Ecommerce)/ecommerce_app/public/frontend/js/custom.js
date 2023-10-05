$(document).ready(function () {
        loadcart();
        loadwishlist();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    function loadcart(){
        $.ajax({
            type: "GET",
            url: "/load-cart-data",

            success: function (response) {
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
                // console.log(response.count);
            }
        });
    }

    function loadwishlist(){
        $.ajax({
            type: "GET",
            url: "/load-wishlist-count",

            success: function (response) {
                $('.wishlist-count').html('');
                $('.wishlist-count').html(response.count);
                // console.log(response.count);
            }
        });
    }

    // // Attach a click event handler to elements with the class '.addtoCartbtn'
    $('.addtoCartbtn').click(function (e) {
        e.preventDefault();// Prevent the default form submission behavior

         // Retrieve the product ID and quantity from the clicked element's parent container
        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();

        // Set up AJAX headers to include the CSRF token for security
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

         // Send an AJAX POST request to the '/add-to-cart' URL with product data
        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty,
            },

            // When came success response below code will run
            success: function (response) {
                swal("", response.status, "success"); // Display the response message in an alert
                loadcart();
                if (response.status === 'Login to continue') {
                    // console.log('Inside AJAX success function'); // Debugging line
                    // Redirect the user to the login page
                    window.location.href = "{{ route('login') }}"; // Note: This line may not work in a separate .js file
                }
            },
        });
    });

    //Add to wish List
    $('.addToWishlist').click(function (e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajax({
            method: "POST",
            url: "/add-to-wishlist",
            data: {
                'product_id': product_id,
            },
            success: function (response) {
                swal("", response.status, "success"); // Display the response message in an alert
                loadwishlist()
                if (response.status === 'Login to continue') {
                    // console.log('Inside AJAX success function'); // Debugging line
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
    // $('.increment-btn').click(function (e) {
        $(document).on('click','.increment-btn', function (e) {
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
    // $('.decrement-btn').click(function (e) {
    $(document).on('click','.decrement-btn', function (e) {
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

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    //Delete product cart item
    $('.delete-cart-item').click(function (e) {
        e.preventDefault();
        // console.log("Delete button clicked");

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajax({
            type: "POST",
            url: "delete-cart-item",
            data: {
                'prod_id':prod_id,
            },
            success: function (response) {
                loadcart();
                // console.log(response);
                // window.location.reload();
                $('.cartitem').load(location.href + " .cartitem");
                swal("", response.status, "success"); // Display the response message in an alert
            }
        });
    });

    // remove item from wishlist
    $('.remove-wishlist-item').click(function (e) {
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajax({
            type: "POST",
            url: "delete-wishlist-item",
            data: {
                'prod_id':prod_id,
            },
            success: function (response) {
                loadwishlist();
                // console.log(response);
                // window.location.reload();
                $('.wishlistitems').load(location.href + " .wishlistitems");
                 swal("", response.status, "success"); // Display the response message in an alert
            }
        });
    });


    //jasaa user increment/decrement kra product quantity ko to sath sath total price decrease/increase ho

    // $(".changeQuantity").click(function (e) {
    $(document).on('click','.changeQuantity', function (e) {
        e.preventDefault();
        //take product id
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();
        data = {
            'prod_id' : prod_id,
            'prod_qty' : qty,
        }
        $.ajax({
            type: "POST",
            url: "update_cart",
            data: data,
            success: function (response) {
                // window.location.reload();
                $('.cartitem').load(location.href + " .cartitem");
            }
        });
    });


    $('#buttonxyz').click(function (e) {
        e.preventDefault();
        $('#exampleModal').modal('show');

    });

    $('.closeModal').click(function (e) {
        e.preventDefault();
        $('#exampleModal').modal('hide');

    });
});

