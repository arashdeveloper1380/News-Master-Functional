<?php
namespace AdminDashboard;

class Admin{

    function __construct()
    {
        $auth = new Auth();
        $auth->checkAdmin();
        $this->currentDomain = CURRENT_DOMAIN;
        $this->basePath = BASE_PATH;
    }

    protected function redirect($url){
        header("Location: ". trim($this->currentDomain, '/ ') . '/' . trim($url, '/ '));
        exit();
    }


    protected function redirectBack(){
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit();
    }

    protected function saveImage($image,$imagePath, $imagename=null){

        if ($imagename)
            $imagename= $imagename.".".substr($image['type'],6,strlen($image['type']));
        else
            $imagename = date('Y-m-d-H-i-s').".".substr($image['type'],6 , strlen($image['type']));

        $imagetemp= $image['tmp_name'];

        $imagePath="public/".$imagePath."/";

        if (is_uploaded_file($imagetemp)){
            if (move_uploaded_file($imagetemp, $imagePath . $imagename)){
                return $imagePath . $imagename;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }


    protected function removeImage($path){
      $path = trim($this->basePath, '/ ') . '/' . trim($path, '/ ');
      unlink($path);
    }


}
