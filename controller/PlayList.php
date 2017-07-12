<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PlayStore\Controller;

include(dirname(__FILE__).'/Controller.class.php');
include(dirname(__FILE__).'/../model/dao/PlayListStore.php');


/**
 * Description of PlayList
 *
 * @author lionel
 */
class PlayList extends Controller{
    //put your code here
    public function run() {
        

        $playlists = \PlayStore\Model\Dao\PlayListStore::getPlayLists($this->current_userid);

        //render view

        $this->render('PlayListView',array("playlists"=>$playlists));
        
        
    }

}
