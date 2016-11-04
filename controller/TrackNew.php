<?php

namespace PlayList\Controller;

use \PlayList\Model\Track as Track;


include(dirname(__FILE__).'/Controller.class.php');
require(dirname(__FILE__).'/../model/Track.class.php');



class TrackNew extends Controller {
    
    public function run(){
        
        $view = new \PlayList\View\View('TrackFormView'); 
        $view->render(array('content'=> new Track())); //we pass a fake object 
    }
}




