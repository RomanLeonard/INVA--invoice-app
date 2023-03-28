$(document).ready(function(){
   
    $('.table-details .table-details-expanded').css('display', 'none');
    $(document).on('click', '.table-details-btn', function(){
        var element = $(this).closest('.table-details').find('.table-details-expanded');
        element.css('display', 'block');

        // open table details pop-up
        $('body').on('click', function(e){ 
            if (!$(e.target).closest('.table-details-expanded').length) {
                element.css('display', 'none');
            }
        });
    });


    // BACKUP
    function BACKUP_DATABASE(){
        $.ajax({
            method: "GET",
            url: "database-backup",
            dataType: "json",
            data: { AJAX: true }
        })
        .done(function( data ) {
            notification('success', 'Success! Your database will automatically be downloaded in 2 seconds.');

            setTimeout(() => {
                var URL = window.location.origin + "/" + data;
                window.location = URL

                setTimeout(() => {
                    $.ajax({
                        method: "GET",
                        url: "database-clear-backups",
                        dataType: "json",
                        data: { AJAX: true }
                    }).done(function(data){ 
                        notification(data.type, data.message) 
                    })
                }, 2000);
            }, 2050);
        });
    }




    $('.backup-btn').on('click', function(e){
        e.preventDefault();
        BACKUP_DATABASE();
    });

});