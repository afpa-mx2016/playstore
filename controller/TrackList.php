<?php

namespace PlayList\Controller;

include(dirname(__FILE__).'/Controller.class.php');

include(dirname(__FILE__).'/../dao/TrackStore.php');
include(dirname(__FILE__).'/../view/TrackListView.php');

class TrackList extends Controller {
    
    
    public function run(){
        
        $view = new \PlayList\View\TrackListView();
        //fetch all tracks
        $tracks = \PlayList\Dao\TrackStore::getTracks();
        //var_dump($tracks);
        //render view
        $view->setContent($tracks);
        $view->render();
    }
    
    
}


