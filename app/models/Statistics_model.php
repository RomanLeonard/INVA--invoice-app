<?php

class Statistics_model extends Model{

	// get statistics
	function get_statistics(){
		$f3 = Base::instance();
		$db = $f3->get('db.instance');
        
		$rs = $db->exec("SELECT price_total, MONTH(date) as month, YEAR(date) as year FROM invoices WHERE MONTH(date); ");

        $list = [];
        foreach($rs as $line){
            $list[$line['year']][$line['month']] += $line['price_total'];
        }

        return $list;
	} 

}
