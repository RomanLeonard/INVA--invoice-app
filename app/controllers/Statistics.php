<?php

class Statistics extends Controller{

	// render statistics page
	function statistics_render(){
		$f3 = Base::instance();

		$f3->set('PAGE_TITLE', 'Statistics');
		$f3->set('JS_PATH', 'assets/js/pages/statistics/statistics.js');
		$f3->set('ACTIVE_PAGE', 'statistics');

		$f3->set('title_utility','page-utility/statistics/util_statistics_view.php');
		$f3->set('content','pages/statistics/statistics_view.php');
	}

    // get statistics value through AJAX
    function statistics_values(){
        $model = new Statistics_model;
        echo json_encode($model->get_statistics());
    }

}
