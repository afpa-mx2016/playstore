<?php

namespace PlayStore;

include('config.inc.php');
//load view class definition file
include('view/View.php');

//default controller
$ctrl = 'Welcome';

//action = controller name.  could be send with either GET or POST
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
if (!$action) $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

//direct_rendering=true means don't output main template, only conntent from controller
$direct_rendering = filter_input(INPUT_GET, 'direct_rendering', FILTER_VALIDATE_BOOLEAN);
if (!$direct_rendering) $direct_rendering = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

if ($action){
    
    if (file_exists('controller/'.$action.'.php')){
        $ctrl = $action;
    }else{
        http_response_code(404);
        return;
    }
    
    
}


////if accessing protected pages without being logged, redirect to LoginForm
session_start();
if (!in_array($ctrl, DMZ) && !isset($_SESSION['user_id'])){
    //redirect to login
    header("Location: /index.php?action=LoginForm");
}



//load controller definition
include('controller/'.$ctrl.'.php');


$ctrlClassName = "PlayStore\\Controller\\".$ctrl;
$controller = new $ctrlClassName();

//inject current_ user id 
if (isset($_SESSION['user_id'])) {
    $controller->setCurrentUserId($_SESSION['user_id']);
    $controller->setCurrentUserName($_SESSION['current_user']);
    $controller->setIsAdmin($_SESSION['isadmin']);
}

//load output from controllers into memory
ob_start();

$controller->run();

$content = ob_get_clean();

//

if ($direct_rendering){ //don't render with template
    echo $content;
}else{
    $data = array(
        "errors"=>$controller->getErrors(),
	"content"=>$content, 
        "current_user" => $controller->getCurrentUserName(),
        "isadmin" => $controller->isAdmin()
        );
    //load view
    $tpl = new View\View('MainTemplate');

    $tpl->render($data);
}

