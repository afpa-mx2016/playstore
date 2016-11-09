<?php

namespace PlayStore\Controller;

include(dirname(__FILE__).'/Controller.class.php');
include(dirname(__FILE__).'/../dao/TrackStore.php');

class TrackDelete extends Controller {

    
    public function run($params){
   
        //$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $id = $params['id'];
        if ($id){

            $ok = \PlayStore\Dao\TrackStore::delete($id);
            if (!$ok){
                $this->errors = 'something went wrong with deleting id:'. $id . ' exist ?';
            }else{

                  header("Location: /tracks",true,303);
            }




        }else{
            $this->errors = 'id must not be null';
        }
    }
    
    
    
    
}



