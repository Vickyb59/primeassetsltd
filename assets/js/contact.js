(function ($) {
    "use strict";
    jQuery(document).ready(function ($) {
        $(document).on('submit','#contact_form_submit',function(e){
            e.preventDefault();
            var name = $('#contact-name').val();
            var email = $('#contact-email').val();
            var message = $('#contact-message').val();
            if (!name) {
                 $('#contact-name').removeClass('error');
                 $('#contact-name').addClass('error').attr('placeholder','Please Enter Name');
             }else{
                 $('#contact-name').removeClass('error');
             }
            if (!email) {
                 $('#contact-email').removeClass('error');
                 $('#contact-email').addClass('error').attr('placeholder','Please Enter Email')
             }else{
                 $('#contact-email').removeClass('error');
             }
            if (!message) {
                 $('#contact-message').removeClass('error');
                 $('#contact-message').addClass('error').attr('placeholder','Please Enter Your Message')
             }else{
                 $('#contact-message').removeClass('error');
             }
            if ( name && email && message ) {
                 $.ajax({
                     type: "POST",
                     url:'contact.php',
                     data:{
                         'name': name,
                         'email': email,
                         'message': message,
                     },
                     success:function(data){
                         $('#contact_form_submit').children('.email-success').remove();
                         $('#contact_form_submit').prepend('<span class="alert alert-success email-success">'+data+'</span>');
                         $('#contact-name').val('');
                         $('#contact-email').val('');
                         $('#contact-message').val('');
                         $('#contact-map').height('576px');
                         $('.email-success').fadeOut(3000);
                     },
                     error:function(res){
                     }
                 });
             }else{
                $('#contact_form_submit').children('.email-success').remove();
                $('#contact_form_submit').prepend('<span class="alert alert-danger email-success">Somenthing went wrong</span>');
                $('#map').height('576px');
                $('.email-success').fadeOut(3000);
             }
        });
    })
}(jQuery));