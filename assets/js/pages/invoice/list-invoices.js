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
    })
    
    /*




    */
    // PRINT action
    $(document).on('click', '.invoice-print-btn', function(){
        var invoice_id = $(this).closest('td').find('input[name="invoice_id"]').val();
        $.ajax({
            method: "GET",
            url: "print",
            dataType: "json",
            data: {
                AJAX: true,
                PRINT_PAGE: true,
                invoice_id: invoice_id
            }
        })
        .done(function( data ) {
            var new_window = window.open()
            new_window.document.open();
            new_window.document.write(data.html);
            new_window.document.close();
            setTimeout(function(){
                new_window.print()
            }, 300)
        });
    });
    

    // STORNO action
    $(document).on('click', '.invoice-storno-btn', function(){
        var invoice_id = $(this).closest('td').find('input[name="invoice_id"]').val();
        var invoice_number = $(this).closest('tr').find('td').first().text();

        // get modal ready
        $('.modal').addClass('modal-lg');
        $('.modal-title').html('Storno invoice - '+invoice_number);
        $('.modal-body').html('');
        
        $.ajax({
            method: "GET",
            url: "storno/get-details",
            dataType: "json",
            data: {
                AJAX: true,
                invoice_id: invoice_id
            }
        })
        .done(function( data ) {
            var items = jQuery.parseJSON(data.items)

            var shipping = false;

            // get table ready
            var html_code =`
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="min-width: 34px; width: 34px; max-width: 35px;">#</th>
                            <th style="min-width: 100px;">Name</th>
                            <th style="min-width: 80px; width: 80px; max-width: 81px;">Qty</th>
                            <th style="min-width: 120px; width: 120px; max-width: 121px;">Price</th>
                        </tr>
                    </thead>
                    <tbody>`;
            // insert items
            $(items).each(function(index){
            html_code += `<tr>
            
                <td><input name="item_checkbox" class="form-check-input" type="checkbox" value="`+items[index].item_name+`" id="invoice_item_`+index+`"></td>
                <td><label class="form-check-label" for="invoice_item_`+index+`">`+items[index].item_name+`</label></td>   
                <td>
                    <input name="item_qty" type="text" class="form-control" value="`+items[index].item_qty+`">
                    <input type="hidden" name="item_um" value="`+items[index].item_um+`">
                </td>  
                <td style="text-align: right">
                    <label class="form-check-label" for="invoice_item_`+index+`">`+items[index].item_price+`</label>
                    <input type="hidden" name="item_price" value="`+items[index].item_price+`">
                </td>  

            </tr>`;});
            // insert shipping
            if(data.shipping_price != 'none'){
                html_code += `<tr>
                    <td><input name="shipping_checkbox" class="form-check-input" type="checkbox" value="`+data.shipping_price+`" id="shipping"></td>
                    <td><label class="form-check-label" for="shipping">Taxa de transport</label></td>   
                    <td><input type="text" class="form-control" value="1"></td>  
                    <td style="text-align: right"><label class="form-check-label" for="shipping">`+data.shipping_price+`</label></td>  
                </tr>`; 
            }
            // end table
            html_code += `</tbody>
                </table>
            </div>`;

            $('.modal-body').html(html_code);

            
            // show modal
            $('.modal').modal('show');

            $(document).on('click', '.modal-storno-btn', function(){

                // get checked items
                var items = [];
                var storno_total = 0;
                $('input[name="item_checkbox"]').each(function(index){
                    if( $(this).is(':checked') ){
                        var item_name  = $(this).val();
                        var item_qty   = $(this).closest('tr').find('input[name="item_qty"]').val();
                        var item_um    = $(this).closest('tr').find('input[name="item_um"]').val();
                        var item_price = $(this).closest('tr').find('input[name="item_price"]').val();

                        var item = {
                            'item_name': item_name,
                            'item_um': item_um,
                            'item_qty': item_qty,
                            'item_price': ( item_price > 0 ) ? Math.abs(item_price) * -1 : Math.abs(item_price)
                        };

                        storno_total = storno_total + ( parseInt(item_price) * parseInt(item_qty) );
                        items.push(item);
                    }
                });

                $.ajax({
                    method: "POST",
                    url: "storno",
                    dataType: "json",
                    data: {
                        AJAX: true,
                        invoice_id: invoice_id,
                        shipping: ( $('input[name="shipping_checkbox"]').is(':checked') ) ? 'with-shipping' : 'without-shipping',
                        items: items,
                        storno_total: Math.abs(storno_total) * -1
                    }
                })
                .done(function( data ) {
                    // console.log(data)
                    $('.modal').modal('hide'); 
                    if(data == 'success'){
                        notification('success', 'Success! List will be refreshed now.')
                        setTimeout(function(){ location.reload(); }, 1500)
                    }
                    else if(data == 'error-storno'){ notification('warning', 'Warning! This invoice is already a storno invoice.') }
                    else if(data == 'error-cancelled'){ notification('danger', 'You cannot storno a cancelled invoice.') }
                    else if(data == 'error-unknown'){ notification('danger', 'An error has occured. Unknown invoice type.') }
                }); // sender ajax end

            });


        }); // main ajax end

        
    });

});