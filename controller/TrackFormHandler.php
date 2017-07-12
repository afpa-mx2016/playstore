<?php

namespace PlayStore\Controller;

include(dirname(__FILE__).'/Controller.class.php');
include(dirname(__FILE__).'/../model/dao/TrackStore.php');


class TrackFormHandler extends Controller {

    public function run(){

        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        $author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING);
        $duration = filter_input(INPUT_POST, 'duration', FILTER_VALIDATE_INT);
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        
        //form validation
        $track = new \PlayStore\Model\Entities\Track();
        if ($title) {
            $track->setTitle($title);
        }else{
            $this->errors .= "title is required\n";
        }
        
        if ($author) {
            $track->setAuthor($author);
        }else{
            $this->errors .= "author is required\n";
        }
        
        if ($duration) {
            $track->setDuration($duration);
        }else{
            $this->errors .= "duration is required\n";
        }
        
        

        //all required fields are ok
        if (!$this->hasErrors()){
            
            if ($id){ //edit mode
                $track->setId($id);
                $ok = \PlayStore\Model\Dao\TrackStore::update($track);
            }else{ //create mode
                $ok = \PlayStore\Model\Dao\TrackStore::save($track);
            }
            
            
            if(!$ok){
                $this->errors .= "error while saving to database";
            }
            
        }

        


        if($this->hasErrors()){
             //replay form when error occurs
             $this->render('TrackFormView', 
                array('track'=> $track,
                       'errors'=> $this->errors));
        }else{
            header("Location: /index.php?action=TrackList",true,303);
        }


        
    }
}