<?php

namespace PlayList\Controller;



include(dirname(__FILE__).'/Controller.class.php');
include(dirname(__FILE__).'/../view/TrackFormView.php');
include(dirname(__FILE__).'/../dao/TrackStore.php');



class TrackEdit extends Controller {
    
    public function run(){
        
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id){

            //fetch track
            $track = \PlayList\Dao\TrackStore::getTrackById($id);

            if (!$track){
                $this->errors = 'something went wrong with edit with id:' + $id;
            }else{

                //render view
                $view = new \PlayList\View\TrackFormView(); 

                $view->render(array('content'=> $track));

            }




        }else{

            $this->errors = 'id must not be null';
        }
    }
}



