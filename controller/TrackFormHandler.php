<?php

namespace PlayList\Controller;

include(dirname(__FILE__).'/Controller.class.php');
include(dirname(__FILE__).'/../dao/TrackStore.php');
include(dirname(__FILE__).'/../view/TrackFormView.php');


class TrackFormHandler extends Controller {

    public function run(){

        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        $author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING);
        $duration = filter_input(INPUT_POST, 'duration', FILTER_VALIDATE_INT);
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        if ($title && $author && $duration){

            $track = new \PlayList\Model\Track();
            $track->setTitle($title);
            $track->setAuthor($author);
            $track->setDuration($duration);

            if ($id){ //edit mode
                $track->setId($id);
                $ok = \PlayList\Dao\TrackStore::update($track);
            }else{ //create mode
                $ok = \PlayList\Dao\TrackStore::save($track);
            }


            if(!$ok){
                $this->error = 'error while saving data';
            }else{
                header("Location: /index.php?action=TrackList",true,303);
            }


        }else{
            $this->error = 'something missing in your form ?';

        }
    }
}