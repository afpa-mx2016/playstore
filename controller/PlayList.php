<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PlayList\Controller;

include(dirname(__FILE__).'/Controller.class.php');
include(dirname(__FILE__).'/../dao/PlayListStore.php');


/**
 * Description of PlayList
 *
 * @author lionel
 */
class PlayList extends Controller{
    //put your code here
    public function run() {
        
        $view = new \PlayList\View\View('PlayListView');


        $playlists = \PlayList\Dao\PlayListStore::getPlayLists($this->current_userid);

        
        
        
       
        //var_dump($tracks);
        //render view

        $view->render(array("object"=>$playlists));
        
        
    }

}
