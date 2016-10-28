<?php

namespace PlayList\Controller;

use \PlayList\Model\Track as Track;


include(dirname(__FILE__).'/Controller.class.php');
include(dirname(__FILE__).'/../view/TrackFormView.php');
require(dirname(__FILE__).'/../model/Track.class.php');



class TrackNew extends Controller {
    
    public function run(){
        
        $view = new \PlayList\View\TrackFormView(); 
        $view->setContent(new Track());
        $view->render(); //we pass a fake object 
    }
}




