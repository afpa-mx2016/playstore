<?php

namespace PlayStore\Controller;

include(dirname(__FILE__).'/Controller.class.php');
require_once(dirname(__FILE__).'/../model/dao/PlayListStore.php');


class PlayListTrackList extends Controller {
    
    
    public function run(){
        
        
        

        $playlist_id = filter_input(INPUT_GET, 'playlist_id', FILTER_VALIDATE_INT);
        
        //ensure that user can only see its own playlist
        $ok = \PlayStore\Model\Dao\PlayListStore::exist($playlist_id, $this->getCurrentUserId());
        if (!$ok){
            http_response_code(403);
        }else{
            $playList = \PlayStore\Model\Dao\PlayListStore::getPlayListById($playlist_id);

            $tracks = \PlayStore\Model\Dao\PlayListStore::getTracks($playlist_id);

            $playList->setTracks($tracks);

            //render view

            $this->render('PlayListItemsView',array("playList"=>$playList, "errors" =>$this->errors));
        }
        
        
    }
    
    
}


