<?php

namespace PlayStore\Controller;

use \PlayStore\Model\Track as Track;


include(dirname(__FILE__).'/Controller.class.php');
require(dirname(__FILE__).'/../model/Track.class.php');



class TrackNew extends Controller {
    
    public function run(){
        
        $view = new \PlayStore\View\View('TrackFormView'); 
        $view->render(array('object'=> new Track())); //we pass a fake object 
    }
}




