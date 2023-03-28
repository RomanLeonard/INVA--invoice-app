<?php

class Clients extends Controller{

	// list clients
	function list_clients_render(){
		$f3 = Base::instance();
		$model = new Clients_model;

		if($f3->get('GET.page')){
			$page = $f3->get('GET.page');
		} else { $page = 1; }

		if($f3->get('GET.query')){
			$query = $f3->get('GET.query');
		} else { $query = ''; }

		$f3->set('clients', $model->get_clients($page, $query));
		$f3->set('current_page', $page);
		$f3->set('query', $query);	

		$f3->set('PAGE_TITLE', 'Clients list');
		// $f3->set('CSS_PATH', 'assets/css/clients/clients.css');
		$f3->set('JS_PATH', 'assets/js/pages/clients/list-clients.js');
		$f3->set('ACTIVE_PAGE', 'clients');

		$f3->set('title_utility','page-utility/clients/util_list_clients_view.php');
		$f3->set('content','pages/clients/list_clients_view.php');
	}


	// delete client
	function delete_client_action(){
		$f3 = Base::instance();
		$model = new Clients_model;
		$client_id = $f3->get("POST.client_id");
		echo json_encode($model->delete_client_from_db($client_id));
	}


	// create client page - render
	function create_client_render(){
		$f3 = Base::instance();

		$f3->set('PAGE_TITLE', 'New client');
		// $f3->set('CSS_PATH', 'assets/css/clients/clients.css');
		$f3->set('JS_PATH', 'assets/js/pages/clients/create-client.js');
		
		$f3->set('title_utility','page-utility/clients/util_create_client_view.php');
		$f3->set('content','pages/clients/create_client_view.php');
	}


	// create client page - action
	function create_client_action(){
		$f3 = Base::instance();

		if($f3->get("POST.client_name") && $f3->get("POST.client_address")){
			$model = new Clients_model;

			// client details
			$client_name 	= $f3->get("POST.client_name");
			$client_address = $f3->get("POST.client_address");
			$client_cui 	= $f3->get("POST.client_cui");
			$client_onrc 	= $f3->get("POST.client_onrc");
			$client_phone 	= $f3->get("POST.client_phone");
			$client_iban 	= $f3->get("POST.client_iban");
			$client_bank 	= $f3->get("POST.client_bank");
			$client_email 	= $f3->get("POST.client_email");

			$new_client_entry = $model->add_client_action(
				$client_name,
				$client_address,
				$client_cui,
				$client_onrc,
				$client_phone,
				$client_iban,
				$client_bank,
				$client_email
			);

			echo json_encode($new_client_entry);
		}
		else{
			echo json_encode('error');
		}

	}



	/* --------------------------
	
		EDIT 
	
	---------------------------*/

	// create client page - render
	function edit_client_render(){
		$f3 = Base::instance();

		$f3->set('PAGE_TITLE', 'Edit client');
		// $f3->set('CSS_PATH', 'assets/css/clients/clients.css');
		$f3->set('JS_PATH', 'assets/js/pages/clients/edit-client.js');
		
		$f3->set('title_utility','page-utility/clients/util_edit_client_view.php');
		$f3->set('content','pages/clients/edit_client_view.php');
	}
}
