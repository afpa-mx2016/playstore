<?php

namespace PlayStore;


include('config.inc.php');
include('lib/AltoRouter.php');
//load view class definition file
include('view/View.php');

$router = new \AltoRouter();

// routes
$router->map('GET', '/', 'Welcome');
$router->map('GET', '/login', 'LoginForm');
$router->map('POST', '/login', 'LoginFormHandler');
$router->map('GET', '/logout', 'LogoutHandler');


$router->map('GET', '/playlist', 'PlayList');
$router->map('GET', '/playlist/_new', 'PlayListNew');
$router->map('GET', '/playlist/[i:id]/tracks', 'PlayListTrackList');
$router->map('GET', '/playlist/[i:playlist_id]/tracks/[i:track_id]/_delete', 'PlayListTrackDelete');
$router->map('PUT', '/playlist/[i:playlist_id]/tracks/[i:track_id]', 'TrackToPlayList');
$router->map('POST', '/playlist', 'PlayListFormHandler');

$router->map('GET', '/tracks', 'TrackList');
$router->map('GET', '/tracks/_new', 'TrackNew');
$router->map('GET', '/tracks/[i:id]/_edit', 'TrackEdit');
$router->map('GET', '/tracks/[i:id]/_delete', 'TrackDelete'); //too complicated to handle a DELETE http request , use GET instead
$router->map('PUT', '/tracks/[i:id]', 'TrackFormHandler');
$router->map('POST', '/tracks', 'TrackFormHandler');

//match current request url
$match = $router->match();
//var_dump($match);

if(!($match && (file_exists('controller/'.$match['target'].'.php')))) {
	
    // no route was matched
    //http_response_code(404);
    return false;

} 
$ctrl = $match['target'];

//direct_rendering=true means don't output main template, only conntent from controller
$direct_rendering = filter_input(INPUT_GET, 'direct_rendering', FILTER_VALIDATE_BOOLEAN);
if (!$direct_rendering) $direct_rendering = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

////if accessing protected pages without being logged, redirect to LoginForm
session_start();
if (!in_array($match['target'], DMZ) && !isset($_SESSION['user_id'])){
    //redirect to login
    $ctrl = 'LoginForm';
    //header("Location: /Login");
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

$controller->run($match['params']);

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

