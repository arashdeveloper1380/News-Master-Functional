<?php

//start session
session_start();


//config
define('BASE_PATH', __DIR__);
define('CURRENT_DOMAIN', currentDomain() . '/');
define('DISPLAY_ERROR', true);
define('DB_HOST', 'localhost');
define('DB_NAME', '');
define('DB_USERNAME', '');
define('DB_PASSWORD', '');




//display error
if(DISPLAY_ERROR){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
}



//load files
require_once ("admin-dashboard/Category.class.php");
require_once ("admin-dashboard/Dashboard.class.php");
require_once ("admin-dashboard/Article.class.php");
require_once ("admin-dashboard/WebSetting.class.php");
require_once ("admin-dashboard/User.class.php");
require_once ("admin-dashboard/Comment.class.php");
require_once ("admin-dashboard/Auth.class.php");
require_once ("admin-dashboard/CreateDB.php");
require_once ("admin-dashboard/Menu.class.php");
require_once ("admin-dashboard/Home.class.php");




//
//$createDB= new CreateDB();
//$createDB->run();




//helpers
function uri($reservedUrl,$class,$method,$requestMethod = 'GET'){

    //current url array
    $currentUrl = explode('?', currentUrl())[0];
    $currentUrl = str_replace(CURRENT_DOMAIN, '', $currentUrl);
    $currentUrl = trim($currentUrl,'/');
    $currentUrlArray = explode('/', $currentUrl);
    $currentUrlArray = array_filter($currentUrlArray);

    //reserved url array
    $reservedUrl = trim($reservedUrl, '/');
    $reservedUrlArray = explode('/', $reservedUrl);
    $reservedUrlArray = array_filter($reservedUrlArray);


    if (sizeof($currentUrlArray) != sizeof($reservedUrlArray) || methodField() != $requestMethod) {
        return false;
    }

    //match
    $parameters = [];
    for ($key = 0; $key < sizeof($currentUrlArray); $key++) {
        if ($reservedUrlArray[$key][0] == '{' && $reservedUrlArray[$key][strlen($reservedUrlArray[$key]) - 1] == '}')
        {
            array_push($parameters, $currentUrlArray[$key]);
        }
         elseif($currentUrlArray[$key] !== $reservedUrlArray[$key]) {
            return false;
        }
    }

    //request parameter
    if(methodField() == 'POST') {
        $request = isset($_FILES) ? array_merge($_POST, $_FILES) : $_POST;
        $parameters = array_merge([$request], $parameters);
    }

    $class = "AdminDashboard\\" . $class;
    $object= new $class;
    call_user_func_array(array($object, $method), $parameters);
    exit();
}


//helpers
function asset($src){
    $domain = trim(CURRENT_DOMAIN, '/ ');
    $src = $domain . '/' . trim($src, '/ ');
    return $src;
}

function url($url){
    $domain = trim(CURRENT_DOMAIN, '/ ');
    $url = $domain . '/' . trim($url, '/ ');
    return $url;
}

function protocol(){
    return stripos($_SERVER['SERVER_PROTOCOL'],'https')=== true ? 'https://' : 'http://';
}

function currentDomain(){
    return protocol() . $_SERVER['HTTP_HOST'];
}

function currentUrl(){
    return currentDomain() . $_SERVER['REQUEST_URI'];
}

function methodField(){
    return $_SERVER['REQUEST_METHOD'];
}



/**
 * reserve routes
 */

//dashboard
uri('admin','Dashboard','index');


//category
uri('category','Category','index');
uri('category/show/{id}','Category','show');
uri('category/create','Category','create');
uri('category/store','Category','store','POST');
uri('category/edit/{id}','Category','edit');
uri('category/update/{id}','Category','update','POST');
uri('category/delete/{id}','Category','delete');


//article
uri('article','Article','index');
uri('article/show/{id}','Article','show');
uri('article/create','Article','create');
uri('article/store','Article','store','POST');
uri('article/edit/{id}','Article','edit');
uri('article/update/{id}','Article','update','POST');
uri('article/delete/{id}','Article','delete');

//menu
uri('menu','Menu','index');
uri('menu/show/{id}','Menu','show');
uri('menu/create','Menu','create');
uri('menu/store','Menu','store','POST');
uri('menu/edit/{id}','Menu','edit');
uri('menu/update/{id}','Menu','update','POST');
uri('menu/delete/{id}','Menu','delete');


//users
uri('user','User','index');
uri('user/permission/{id}','User','permission');
uri('user/edit/{id}','User','edit');
uri('user/update/{id}','User','update','POST');
uri('user/delete/{id}','User','delete');

//web setting
uri('web-setting','WebSetting','index');
uri('web-setting/set','WebSetting','set');
uri('web-setting/store','WebSetting','store','POST');


//comments
uri('comment','Comment','index');
uri('comment/show/{id}','Comment','show');
uri('comment/approved/{id}','Comment','approved');

//Auth
uri('login','Auth','login');
uri('check-login','Auth','checkLogin','POST');
uri('register','Auth','register');
uri('register/store','Auth','registerStore','POST');
uri('logout','Auth','logout');


//Home
uri('/','Home','index');
uri('home','Home','index');
uri('show-article/{id}','Home','show');
uri('show-category/{id}','Home','category');
uri('comment-store','Home','commentStore','POST');



/**
 * route not match - 404 error
 */

echo '404 - page not found';exit;
