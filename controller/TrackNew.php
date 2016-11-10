<?php

namespace PlayStore\Controller;

use \PlayStore\Model\Entities\Track;


include(dirname(__FILE__).'/Controller.class.php');
require(dirname(__FILE__).'/../model/entities/Track.class.php');



class TrackNew extends Controller {
    
    public function run(){
        
        $view = new \PlayStore\View\View('TrackFormView'); 
        $view->render(array('track'=> new Track())); //we pass a fake object 
    }
}




