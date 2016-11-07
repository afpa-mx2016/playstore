<?php

namespace PlayList\Controller;

include(dirname(__FILE__).'/Controller.class.php');

include(dirname(__FILE__).'/../dao/TrackStore.php');
include(dirname(__FILE__).'/../dao/PlayListStore.php');



class TrackList extends Controller {
    
    
    public function run(){
        
        
        //fetch all tracks
        $searchStr = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING);
        if ($searchStr){
            $tracks = \PlayList\Dao\TrackStore::getTracksByTitle($searchStr);
        }else{
             $tracks = \PlayList\Dao\TrackStore::getTracks();
        }
        
        $playlists = \PlayList\Dao\PlayListStore::getPlayLists($this->current_userid);
        
        
       
        //var_dump($tracks);
        //render view
        $view = new \PlayList\View\View('TrackListView');
        $view->render(array(
            "content"=>$tracks,
            "search"=> $searchStr,
            "playlists"=> $playlists,
            "isadmin" => $this->isAdmin()));
    }
    
    
}


