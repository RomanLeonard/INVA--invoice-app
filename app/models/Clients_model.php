<?php

class Clients_model extends Model{

	// get clients list
	function get_clients($page, $query){
		$f3 = Base::instance();
		$db = $f3->get('db.instance');

		$rs = new DB\SQL\Mapper($db,'clients');
		$clients = $rs->paginate($page-1, 20, array("name LIKE CONCAT('%',:name,'%') OR address LIKE CONCAT('%',:address,'%') OR mobile LIKE CONCAT('%',:mobile,'%') ",
			array(
				':name' => $query,
				':address' => $query,
				':mobile' => $query
			)
		), array());
		
        return $clients;
	} 

	// delete client from database
	function delete_client_from_db($client_id){
		$f3 = Base::instance();
		$db = $f3->get('db.instance');

		$rs = new DB\SQL\Mapper($db,'clients');
		$rs->load(array('id=?', $client_id));
		$rs->erase();
		$rs->reset();

		return 'success';
	}

	// add client to database
	function add_client_action(
		$client_name,
		$client_address,
		$client_cui,
		$client_onrc,
		$client_phone,
		$client_iban,
		$client_bank,
		$client_email
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

			return 'success';
		} 
		else{ 
			$rs_client->reset(); 
			return 'error-existing-client';
		}
		
	} // add new invoice to database


}
