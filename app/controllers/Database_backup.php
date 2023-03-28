<?php

class Database_backup extends Controller{
    
    // create backup
	function create_backup(){
        $f3 = Base::instance();

        $mysqli = new mysqli(
            $f3->get('db.host'), $f3->get('db.user'),
            $f3->get('db.pass'), $f3->get('db.name')
        ); 
        $mysqli->select_db( $f3->get('DB_NAME') ); 
        $mysqli->query("SET NAMES 'utf8'");

        $queryTables    = $mysqli->query('SHOW TABLES'); 
        while($row = $queryTables->fetch_row()) { $target_tables[] = $row[0]; }   
        foreach($target_tables as $table){
            $result         =   $mysqli->query('SELECT * FROM '.$table);  
            $fields_amount  =   $result->field_count;  
            $rows_num=$mysqli->affected_rows;     
            $res            =   $mysqli->query('SHOW CREATE TABLE '.$table); 
            $TableMLine     =   $res->fetch_row();
            $content        = (!isset($content) ?  '' : $content) . "\n\n".$TableMLine[1].";\n\n";
            for($i=0, $st_counter=0; $i<$fields_amount; $i++, $st_counter=0){
                while($row = $result->fetch_row()){ 
                    if ($st_counter%100 == 0 || $st_counter == 0 ){ $content .= "\nINSERT INTO ".$table." VALUES"; }
                    $content .= "\n(";
                    for($j=0; $j<$fields_amount; $j++){ 
                        $row[$j] = str_replace("\n","\\n", addslashes($row[$j]) ); 
                        if (isset($row[$j])){ $content .= '"'.$row[$j].'"' ; }
                        else{ $content .= '""'; }     
                        if ($j<($fields_amount-1)){ $content.= ','; }      
                    }
                    $content .=")";
                    if ( (($st_counter+1)%100==0 && $st_counter!=0) || $st_counter+1==$rows_num) 
                    { $content .= ";"; } 
                    else{ $content .= ","; } 
                    $st_counter=$st_counter+1;
                }
            } $content .="\n\n\n";
        }

        $backup_name = "backups/invoices_db_".date('Y-m-d').".sql";
        $handle = fopen($backup_name,'w+');
        fwrite($handle,$content);
        fclose($handle);

        echo json_encode($backup_name);
    }

    
    // delete current backups from folder
    function clear_backups(){
        $files = glob('backups/*');
        foreach($files as $file){ if(is_file($file)) { unlink($file); } }
        $response['type'] = 'info';
        $response['message'] = 'Backup history cleared.';   
        echo json_encode($response);
    }

}
