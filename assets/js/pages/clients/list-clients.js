$(document).ready(function(){
    // util. -> get URL parameter
    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;
        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
        return false;
    };
    // util. -> UNIVERSAL SEARCH
    $('#universal-search-btn').on('click', function(){
        var query = $('#universal-search').val();
        window.location = '?query=' + query + '&page=1';
    })/*




    */

    // delete client
    $(document).on('click', '.delete-client-btn', function(){
        var client_name = $(this).closest('tr').find('.table-client-name').text();
        var client_id = $(this).closest('tr').find('input[name="client_id"]').val();

        $('#clients-modal').modal('show');
        $('.modal-title').html('Delete client');
        $('.modal-body').html('Are you sure you want to delete client - <b>'+client_name+"</b>?");

        $(document).on('click', '.modal-delete-btn', function(){
            $('#clients-modal').modal('hide');
            
            $.ajax({
                method: "POST",
                url: "clients-delete",
                dataType: "json",
                data: { 
                    AJAX: true,
                    client_id: client_id
                }
            })
            .done(function( data ) {
                if(data == 'success'){
                    notification('success', 'Client successfully deleted. Page will refresh.');
                    setTimeout(() => { location.reload(); }, 2500);
                }
            });
        })
        
    });

    // edit client
    // $(document).on('click', '.edit-client-btn', function(){
    //     var client_id = $(this).closest('tr').find('input[name="client_id"]').val();
    
    //     $.ajax({
    //         method: "GET",
    //         url: "client-edit",
    //         dataType: "json",
    //         data: { 
    //             client_id: client_id
    //         }
    //     })
    //     .done(function( data ) {
            
    //     });
        
    // });


})