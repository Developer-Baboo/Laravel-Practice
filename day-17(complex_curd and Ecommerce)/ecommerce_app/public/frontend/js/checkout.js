$(document).ready(function () {
    $('.razorpay_btn').click(function (e) {
        e.preventDefault();

        // alert("Hello User");
       var firstname = $('.firstname').val();
       var lastname = $('.lastname').val();
       var email = $('.email' ).val();
       var phone = $('.phone').val();
       var address1 = $('.address1').val();
       var address2 = $('.address2').val();
       var city = $('.city' ).val();
       var state = $('.state').val();
       var country = $('.country').val();
       var pincode = $('.pincode').val();

       if(!firstname){
            fname_error = "First Name is required ";
            $('#fname_error').html('');
            $('#fname_error').html(fname_error);
       }else{
            fname_error = "";
            $('#fname_error').html('');
       }
       if(!lastname){
            lname_error = "Last Name is required ";
            $('#lname_error').html('');
            $('#lname_error').html(lname_error);
       }else{
            lname_error = "";
            $('#lname_error').html('');
       }
       if(!email){
            email = "Email is required ";
            $('#email').html('');
            $('#email').html(email);
       }else{
            email = "";
            $('#email').html('');
       }
       if(!phone){
            phone = "Phone Number is required ";
            $('#phone').html('');
            $('#phone').html(phone);
       }else{
            phone = "";
            $('#phone').html('');
       }
       if(!address1){
            address1 = "Address1 is required ";
            $('#address1').html('');
            $('#address1').html(address1);
       }else{
            address1 = "";
            $('#address1').html('');
       }
       if(!address2){
            address2 = "Address2 is required ";
            $('#address2').html('');
            $('#address2').html(address2);
       }else{
            address2 = "";
            $('#address2').html('');
       }
       if(!city){
            city = "City is required ";
            $('#city').html('');
            $('#city').html(city);
       }else{
            city = "";
            $('#city').html('');
       }
       if(!state){
            state = "State is required ";
            $('#state').html('');
            $('#state').html(state);
       }else{
            state = "";
            $('#state').html('');
       }
       if(!country){
            country = "Country is required ";
            $('#country').html('');
            $('#country').html(country);
       }else{
            country = "";
            $('#country').html('');
       }
       if(!pincode){
            pincode = "Pincode is required ";
            $('#pincode').html('');
            $('#pincode').html(pincode);
       }else{
            pincode = "";
            $('#pincode').html('');
       }

       if(fname_error !='' ||lname_error!='' ||email!='' ||phone!='' ||address1!='' ||address2!='' ||city!='' ||state!='' ||country!='' ||pincode!=''){
        return false
       }else{
        var data = {
            'firstname':firstname,
            'lastname':lastname,
            'email':email,
            'phone':phone,
            'address1':address1,
            'address2':address2,
            'city':city,
            'state':state,
            'country':country,
            'pincode':pincode
        }

        $.ajax({
            type: "",
            url: "/proceed-to-pay",
            data: data,
            dataType: "dataType",
            success: function (response) {
                
            }
        });
       }
    });
});
