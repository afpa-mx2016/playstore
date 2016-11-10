<?php

namespace PlayStore\Controller;

include(dirname(__FILE__).'/Controller.class.php');

include(dirname(__FILE__).'/../model/dao/TrackStore.php');
include(dirname(__FILE__).'/../model/dao/PlayListStore.php');



class TrackList extends Controller {
    
    
    public function run(){
        
        
        //fetch all tracks
        $searchStr = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING);
        if ($searchStr){
            $tracks = \PlayStore\Model\Dao\TrackStore::getTracksByTitle($searchStr);
        }else{
             $tracks = \PlayStore\Model\Dao\TrackStore::getTracks();
        }
        
        $playlists = \PlayStore\Model\Dao\PlayListStore::getPlayLists($this->current_userid);
        
        
       
        //var_dump($tracks);
        //render view
        $view = new \PlayStore\View\View('TrackListView');
        $view->render(array(
            "tracks"=>$tracks,
            "search"=> $searchStr,
            "playlists"=> $playlists,
            "isadmin" => $this->isAdmin()));
    }
    
    
}


