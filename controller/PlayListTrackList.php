<?php

namespace PlayList\Controller;

include(dirname(__FILE__).'/Controller.class.php');

include(dirname(__FILE__).'/../dao/PlayListStore.php');
include(dirname(__FILE__).'/../view/PlayListItemsView.php');

class PlayListTrackList extends Controller {
    
    
    public function run(){
        
        $view = new \PlayList\View\PlayListItemsView();
        

        $playlist_id = filter_input(INPUT_GET, 'playlist_id', FILTER_VALIDATE_INT);
        
        $playList = \PlayList\Dao\PlayListStore::getPlayListById($playlist_id);

        $tracks = \PlayList\Dao\PlayListStore::getTracks($playlist_id);
        
        $playList->setTracks($tracks);

        //render view

        $view->render(array("content"=>$playList));
    }
    
    
}


