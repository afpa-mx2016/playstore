<?php

namespace PlayList\Controller;

include(dirname(__FILE__).'/Controller.class.php');

require_once(dirname(__FILE__).'/../dao/PlayListStore.php');


class PlayListTrackList extends Controller {
    
    
    public function run(){
        
        
        

        $playlist_id = filter_input(INPUT_GET, 'playlist_id', FILTER_VALIDATE_INT);
        
        //ensure that user can only see its own playlist
        $ok = \PlayList\Dao\PlayListStore::exist($playlist_id, $this->getCurrentUserId());
        if (!$ok){
            http_response_code(403);
        }else{
            $playList = \PlayList\Dao\PlayListStore::getPlayListById($playlist_id);

            $tracks = \PlayList\Dao\PlayListStore::getTracks($playlist_id);

            $playList->setTracks($tracks);

            //render view
            $view = new \PlayList\View\View('PlayListItemsView');
            $view->render(array("object"=>$playList, "errors" =>$this->errors));
        }
        
        
    }
    
    
}


