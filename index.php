<?php

namespace PlayList;

include('config.inc.php');
include('view/MainTemplate.php');

//default controller
$ctrl = 'TrackList';

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

if ($action){
    

    if (!file_exists('controller/'.$action.'.php')){
       //TODO controller does not exist
        echo 'pouah, controller:'.$action.' not found';
        return;
    }
    $ctrl = $action;
    
}

//load controller definition
include('controller/'.$ctrl.'.php');


$ctrlClassName = "PlayList\\Controller\\".$ctrl;
$controller = new $ctrlClassName();

//load output from controllers into memory
ob_start();

$controller->run();

$content = ob_get_contents();

ob_end_clean();



$data = array("errors"=>$controller->getErrors(),
	"content"=>$content);
//load view
$tpl = new View\MainTemplate();

$tpl->render($data);