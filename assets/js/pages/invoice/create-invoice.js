$(document).ready(function(){

    // client autocomplete
    $('.client-name-suggestion').css('display', 'none');
    $('input[name="client_name"]').keyup(function(){
        $('.client-name-suggestion').html("");

        // close suggestion on outside click
        $('body').on('click', function(e){ 
        if (!$(e.target).closest('.client-name-suggestion').length) { $('.client-name-suggestion').css('display', 'none');}});


		$.ajax({
		type: "POST",
		url: "clients/autocomplete",
		data: {
            'AJAX': true,
            'name': $(this).val()
        },
		success: function(data){
            var clients = JSON.parse(data);

			$('.client-name-suggestion').css('display', 'block');

            $.each(clients,function( index ) {
                var client_mobile = (clients[index].mobile != '') ? `<span><span class="small-text">TEL-</span>`+clients[index].mobile+`</span>` : `<span></span>`;
                var client_cui = (clients[index].cui != '') ? `<span><span class="small-text">CUI-</span>`+clients[index].cui+`</span>` : `<span></span>`;
                $('.client-name-suggestion').append(`
                    <div class="item">
                        <input type="hidden" name="client_autocomplete_index" value="`+index+`">
                        <span>`+clients[index].name+`</span>
                        <span class="small-text">`+clients[index].address+`</span>
                        `+ client_mobile 
                        + client_cui + `
                    </div>
                `)
            });

            $(document).on('click', '.client-name-suggestion .item', function(){
                // get client clicked index
                var index = $(this).children('input[name="client_autocomplete_index"]').val();
                // autocomplete all client fields with value
                $('input[name="client_name"]').val(clients[index].name)
                $('input[name="client_address"]').val(clients[index].address)
                $('input[name="client_cui"]').val(clients[index].cui)
                $('input[name="client_onrc"]').val(clients[index].onrc)
                $('input[name="client_phone"]').val(clients[index].mobile)
                $('input[name="client_iban"]').val(clients[index].iban)
                $('input[name="client_bank"]').val(clients[index].bank)
                $('input[name="client_email"]').val(clients[index].email)
            })

		}
		});
	});

    var invoice_items = 2;
    $(document).on('click', '.invoice-add-item-btn', function(){
        invoice_items++;
        
        if(invoice_items <= 15){
            $('.items-body').append(`
                <div class="row invoice-item-row">
                    <div class="col-12 col-lg-6">
                        <!-- item -->
                        <label for="item_name" class="form-label">item `+invoice_items+`</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="item_name" name="item_name">
                        </div>
                    </div>
                    <div class="col-3 col-lg-2">
                        <!-- unit measurement -->
                        <label for="item_um" class="form-label">u.m.</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="item_um" name="item_um" placeholder="buc.">
                        </div>
                    </div>
                    <div class="col-3 col-lg-2">
                        <!-- quantity -->
                        <label for="item_qty" class="form-label">qty.</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="item_qty" name="item_qty" placeholder="1">
                        </div>
                    </div>
                    <div class="col-6 col-lg-2">
                        <!-- price -->
                        <label for="item_price" class="form-label">price</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="item_price" name="item_price">
                        </div>
                    </div>
                </div>
            `)
        } else{
            notification('danger', 'You can add only 15 items.')
        }
    });


    // submit new invoice
    $('#submit-invoice').on('click', function(){

        // create invoice items array
        var items = [];
        var invoices_total_price = 0;
        $.each( $('.invoice-item-row'), function( index, record ){
            if($(this).find('input[name="item_name"]').val() != ''){
                var item_name  = $(this).find('input[name="item_name"]').val();
                var item_um    = ( $(this).find('input[name="item_um"]').val() ) ? $(this).find('input[name="item_um"]').val() : 'buc.';
                var item_qty   = ( $(this).find('input[name="item_qty"]').val() ) ? $(this).find('input[name="item_qty"]').val() : 1;
                var item_price = $(this).find('input[name="item_price"]').val();
            
                var item = {
                    "item_name": item_name,
                    "item_um": item_um,
                    "item_qty": item_qty,
                    "item_price": item_price
                }

                items.push(item);
                invoices_total_price = invoices_total_price + (item_qty * item_price);
            }
        });

        $.ajax({
            method: "POST",
            url: "create-invoice-action",
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

                'invoice_number': $('#last_invoice_number').text(),
                'invoice_shipping_price': ( $('input[name="invoice_shipping_price"]').val() != '' ) ? $('input[name="invoice_shipping_price"]').val() : 'none',

                'invoice_items': items,
                'invoices_total_price': invoices_total_price
            }
        })
        .done(function( data ) {

            if(data == 'success'){
                notification('success', 'New invoice inserted successfuly.');
                setTimeout(function(){
                    location.reload();
                }, 1500)
            } else{ notification('danger', 'An error has occured.'); }
        });

    });
    
});
  