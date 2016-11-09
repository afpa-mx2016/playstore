<?php

namespace PlayStore\Controller;

//include(dirname(__FILE__).'/Controller.class.php');
require_once(dirname(__FILE__).'/../dao/PlayListStore.php');
include(dirname(__FILE__).'/PlayListTrackList.php');

class PlayListTrackDelete extends Controller {

    
    public function run($params){
   
        //$playListId = filter_input(INPUT_GET, 'playlist_id', FILTER_VALIDATE_INT);
        //$trackId = filter_input(INPUT_GET, 'track_id', FILTER_VALIDATE_INT);
        $playListId = $params['playlist_id'];
        $trackId = $params['track_id'];
        
        if ($playListId && $trackId){
            
            try{
                $ok = \PlayStore\Dao\PlayListStore::delete($playListId, $trackId, $this->getCurrentUserId());
                if (!$ok){
                    $this->errors = 'something went wrong with deleting playlist track';
                }else{
                      header("Location: /playlist/".$playListId."/tracks",true,303);
                }
                
                
            } catch (\Exception $ex) {
                $this->errors .= $ex->getMessage();
            }


        }else{
            $this->errors = 'playlist id and track_id must not be null';
        }
        
        
        if ($this->hasErrors()){
            $params['id']= $playListId;
            $ctrl = new PlayListTrackList();
            $ctrl->setErrors($this->errors);
            $ctrl->run($params);
            
        }
    }
    
    
    
    
}



