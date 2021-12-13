<?php
namespace AdminDashboard;

require_once(BASE_PATH . "/admin-dashboard/DataBase.php");
use DataBase\DataBase;

class Auth
{

    public function login()
    {
        require_once(BASE_PATH . "/template/auth/login.php");
    }
    public function checkLogin($request)
    {
        if (empty($request['email']) || empty($request['password'])) {
            $this->redirectBack();
        } else {
            $db = new DataBase();
            $user = $db->select("SELECT * FROM `users` WHERE (`email` = ?); ", [$request['email']])->fetch();
            if ($user != null) {
                if (password_verify($request['password'], $user['password'])) {
                    $_SESSION['user'] = $user['id'];
                    $this->redirect('admin');
                } else {
                    $this->redirectBack();
                }
            } else {
                $this->redirectBack();
            }
        }
    }
    public function register()
    {
        require_once(BASE_PATH . "/template/auth/register.php");
    }
    public function registerStore($request)
    {

        if (empty($request['email']) || empty($request['password'])) {
            $this->redirectBack();
        } else if (strlen($request['password'] < 8)) {
            $this->redirectBack();
        } else if (!filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
            $this->redirectBack();
        } else {
            $db = new DataBase();
            $user = $db->select("SELECT * FROM `users` WHERE (`email` = ?); ", [$request['email']])->fetch();
            if ($user != null) {
                $this->redirectBack();
            } else {
                $request['password'] = $this->hash($request['password']);
                $db->insert('users', array_keys($request), $request);
                $this->redirect('login');
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            session_destroy();
        }
        $this->redirectBack();
    }

    public function checkAdmin()
    {
        if (isset($_SESSION['user'])) {
            $db = new DataBase();
            $user = $db->select("SELECT * FROM `users` WHERE `id` = ? ; ", [$_SESSION['user']])->fetch();
            if ($user != null) {
                if ($user['permission'] != 'admin') {
                    $this->redirect('home');
                }
            } else {
                $this->redirect('home');
            }
        } else {
            $this->redirect('home');
        }
    }


    protected function redirect($url)
    {
        header("Location: ". trim(CURRENT_DOMAIN, '/ ') . '/' . trim($url, '/ '));
        exit();
    }


    protected function redirectBack()
    {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function hash($string){
        $hashString= password_hash($string,PASSWORD_DEFAULT);
        return $hashString;
    }
}
