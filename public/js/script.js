$(document).ready(function(){


    window.setTimeout(function(){
        $('.alert').fadeTo(300, 0).slideUp(300, function(){
            $(this).remove();
        });
    }, 4000);

    // Js Show password
    $('#flexCheckDefault').click(function(){
        if($(this).is(':checked')){
            $('#password').attr('type', 'text')
        }else{
            $('#password').attr('type', 'password')
        }
    });

});


