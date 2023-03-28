<?php

class Invoices_model extends Model{

	function get_invoices($page, $query){
		$f3 = Base::instance();
		$db = $f3->get('db.instance');

		$invoices_rs = new DB\SQL\Mapper($db,'invoices');
		$invoices = $invoices_rs->paginate($page-1, 20, array("number LIKE CONCAT('%',:number,'%') OR JSON_UNQUOTE(JSON_EXTRACT(client, '$.name')) LIKE CONCAT('%',:name,'%')", 
			array(
				':number' => (int) $query,
				':name' => $query
			)
		), array('order'=>'number DESC'));
		
        return $invoices;
	} // get invoices list


	function get_last_invoice_number(){
		$f3 = Base::instance();
		$db = $f3->get('db.instance');
		$rs = $db->exec("SELECT number FROM invoices WHERE id > 0 ORDER BY id DESC LIMIT 1");
        return $rs[0]['number'];
	} // get last invoice id


	function add_invoice_action(
		$client_name,
		$client_address,
		$client_cui,
		$client_onrc,
		$client_phone,
		$client_iban,
		$client_bank,
		$client_email,

		$invoice_number,
		$invoice_shipping_price,
		$invoice_items,
		$invoices_total_price
	){
		$f3 = Base::instance();
		$db = $f3->get('db.instance');

		// client table
		$rs_client = new DB\SQL\Mapper($db,'clients');
		$rs_client->load(array('name=?', $client_name));
		if($rs_client->dry()){
			$rs_client->name    = $client_name;
			$rs_client->cui 	= $client_cui;
			$rs_client->onrc 	= $client_onrc;
			$rs_client->address = $client_address;
			$rs_client->iban 	= $client_iban;
			$rs_client->bank 	= $client_bank;
			$rs_client->mobile 	= $client_phone;
			$rs_client->email 	= $client_email;
			$rs_client->save();
			$rs_client->reset();
		} else{ $rs_client->reset(); }
		
		$client = [
			"name" => $client_name,
			"address" => $client_address,
			"cui" => $client_cui,
			"onrc" => $client_onrc,
			"phone" => $client_phone,
			"iban" => $client_iban,
			"bank" => $client_bank,
			"email" => $client_email,
		]; // create client

		// invoice table
		$rs_invoice = new DB\SQL\Mapper($db,'invoices');
		$rs_invoice->serial = 'BIZ';
		$rs_invoice->number = $invoice_number;
		$rs_invoice->date   = date('Y-m-d');
		$rs_invoice->client = json_encode($client);
		$rs_invoice->items  = json_encode($invoice_items);
		$rs_invoice->shipping_price  = $invoice_shipping_price;
		$rs_invoice->price_total  	 = ($invoice_shipping_price != 'none') ? $invoices_total_price + $invoice_shipping_price : $invoices_total_price;
		$rs_invoice->status 		 = 'normal';
		$rs_invoice->save();
		$rs_invoice->reset();

		return 'success';
	} // add new invoice to database


	function get_invoice_details_by_id($id){
		$f3 = Base::instance();
		$db = $f3->get('db.instance');
		$rs = $db->exec("SELECT * FROM invoices WHERE id=?", $id);

		$client  = json_decode($rs[0]['client']);
		$invoice = $rs[0];
		$items   = json_decode($rs[0]['items']);

		$invoice_print['invoice'] = $invoice;
		$invoice_print['client']  = $client;
		$invoice_print['items']   = $items;
 
		return $invoice_print;
	}

	function get_client_for_autocomplete($name){
		$f3 = Base::instance();
		$db = $f3->get('db.instance');
		$rs = $db->exec("SELECT * FROM `clients` WHERE `name` LIKE '%$name%' LIMIT 6");
		return $rs;
	}

	function storno_invoice_by_id($invoice_id, $shipping, $storno_items, $storno_total){
		$f3 = Base::instance();
		$db = $f3->get('db.instance');
		
		// get invoice to storno
		$invoice = $db->exec("SELECT * FROM invoices WHERE id=?", $invoice_id);

		// check if invoice is of type 'normal'
		if($invoice[0]['status'] == 'normal'){
			// get last invoice number for new entry
			$last_invoice_number = self::get_last_invoice_number();

			// shipping 
			if( $shipping == 'with-shipping' ){
				$shipping_storno_price = -1 * abs($invoice[0]['shipping_price']);
				$invoice_total_price   = $storno_total + $shipping_storno_price;
			} else if( $shipping == 'without-shipping' ){
				$shipping_storno_price = 'none';
				$invoice_total_price   = $storno_total;
			} else {}


			// create new entry
			$rs_invoice = new DB\SQL\Mapper($db,'invoices');
			$rs_invoice->serial = 'BIZ';
			$rs_invoice->number = ++$last_invoice_number;
			$rs_invoice->date   = date('Y-m-d');
			$rs_invoice->client = $invoice[0]['client'];
			$rs_invoice->items  = json_encode($storno_items);
			$rs_invoice->shipping_price = $shipping_storno_price;
			$rs_invoice->price_total  	= $invoice_total_price;
			$rs_invoice->status 		= 'storno';
			$rs_invoice->save();
			$rs_invoice->reset();

			return 'success';
		}
		// if invoice is of type 'storno'
		elseif($invoice[0]['status'] == 'storno'){ return 'error-storno'; }
		// if invoice is of type 'cancelled'
		elseif($invoice[0]['status'] == 'cancelled'){ return 'error-cancelled'; }
		// unknown type error
		else{ return 'error-unknown'; }
	}

	function get_invoice_details_from_db($invoice_id){
		$f3 = Base::instance();
		$db = $f3->get('db.instance');
		
		// get invoice details
		$invoice = $db->exec("SELECT * FROM invoices WHERE id=?", $invoice_id);

		return $invoice[0];
	}
}
