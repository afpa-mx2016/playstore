<?php

namespace PlayStore\Controller;

use \PlayStore\Model\Entities\Track;


include(dirname(__FILE__).'/Controller.class.php');
require(dirname(__FILE__).'/../model/entities/Track.class.php');



class TrackNew extends Controller {
    
    public function run(){
        
        $view->render('TrackFormView', array('track'=> new Track())); //we pass a fake object 
    }
}




