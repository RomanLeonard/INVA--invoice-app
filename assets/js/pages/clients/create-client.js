$(document).ready(function(){


    $('#submit-client').on('click', function(){
        $.ajax({
            method: "POST",
            url: "create-client-action",
            dataType: "json",
            data: {
                'AJAX': true,
                
                'client_name': $('input[name="client_name"]').val(),
                'client_address': $('input[name="client_address"]').val(),
                'client_cui': ( $('input[name="client_cui"]').val() ) ? $('input[name="client_cui"]').val() : '' ,
                'client_onrc': ( $('input[name="client_onrc"]').val() ) ? $('input[name="client_onrc"]').val() : '',
                'client_phone': ( $('input[name="client_phone"]').val() ) ? $('input[name="client_phone"]').val() : '',
                'client_iban': ( $('input[name="client_iban"]').val() ) ? $('input[name="client_iban"]').val() : '',
                'client_bank': ( $('input[name="client_bank"]').val() ) ? $('input[name="client_bank"]').val() : '',
                'client_email': ( $('input[name="client_email"]').val() ) ? $('input[name="client_email"]').val() : '',
            }
        })
        .done(function( data ) {
            if(data == 'success'){
                notification('success', 'Client created successfuly.');
                setTimeout(function(){
                    location.reload();
                }, 2000) } 
            else if (data == 'error-existing-client') { notification('danger', 'Client already existing.'); }
            else { notification('danger', 'An error has occured.'); }
        });
    });
    

});