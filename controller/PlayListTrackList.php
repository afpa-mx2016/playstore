<?php

namespace PlayList\Controller;

include(dirname(__FILE__).'/Controller.class.php');

include(dirname(__FILE__).'/../dao/PlayListStore.php');


class PlayListTrackList extends Controller {
    
    
    public function run(){
        
        
        

        $playlist_id = filter_input(INPUT_GET, 'playlist_id', FILTER_VALIDATE_INT);
        
        $playList = \PlayList\Dao\PlayListStore::getPlayListById($playlist_id);

        $tracks = \PlayList\Dao\PlayListStore::getTracks($playlist_id);
        
        $playList->setTracks($tracks);

        //render view
        $view = new \PlayList\View\View('PlayListItemsView');
        $view->render(array("content"=>$playList));
    }
    
    
}


