<?php
namespace AdminDashboard;
require_once("Admin.class.php");
require_once(BASE_PATH . "/admin-dashboard/DataBase.php");

use DataBase\DataBase;

class Dashboard extends Admin
{
    public function index()
    {
        $db = new DataBase();
        $articleCount = $db->select('SELECT COUNT(*) FROM `articles`  ;')->fetch();
        $articlesViews = $db->select('SELECT SUM(view) FROM `articles`  ;')->fetch();

        $commentsCount = $db->select('SELECT COUNT(*) FROM `comments`  ;')->fetch();
        $commentsUnseenCount = $db->select("SELECT COUNT(*) FROM `comments` WHERE `status` = 'unseen' ;")->fetch();
        $commentsApprovedCount = $db->select("SELECT COUNT(*) FROM `comments` WHERE `status` = 'approved' ;")->fetch();
        $userCount = $db->select("SELECT COUNT(*) FROM `users` WHERE `permission` = 'user';")->fetch();
        $adminCount = $db->select("SELECT COUNT(*) FROM `users` WHERE `permission` = 'admin' ;")->fetch();
        $categoryCount = $db->select("SELECT COUNT(*) FROM `categories` ;")->fetch();
        $articlesWithView = $db->select('SELECT * FROM `articles` ORDER BY `view` DESC LIMIT 0,5 ;');


        $articlesComments = $db->select("SELECT `articles`.`id`, `articles`.`title`, COUNT(`comments`.`article_id`) AS 'comment_count' FROM `articles`  LEFT JOIN  `comments`  ON `articles`.`id` = `comments`.`article_id` GROUP BY `articles`.`id` ORDER BY `comment_count` DESC LIMIT 0,5 ;");


        $lastComments = $db->select('SELECT comments.id, comments.comment, comments.status, comments.article_id, users.username FROM comments, users WHERE comments.user_id = users.id order by comments.created_at DESC LIMIT 0,5 ;');


        require_once (BASE_PATH . "/template/admin/dashboard/index.php");
    }
}