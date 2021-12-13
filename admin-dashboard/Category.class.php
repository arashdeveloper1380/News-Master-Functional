<?php
namespace AdminDashboard;
require_once("Admin.class.php");
require_once(BASE_PATH . "/admin-dashboard/DataBase.php");

use DataBase\DataBase;

class Category extends Admin
{
    public function index()
    {
        $db = new DataBase();
        $categories = $db->select('SELECT * FROM `categories` ORDER BY `id` DESC ;');
        require_once (BASE_PATH . "/template/admin/categories/index.php");
    }

    public function show($id)
    {
        $db = new DataBase();
        $category = $db->select("SELECT * FROM `categories` WHERE( `id` = ?) ;", [$id])->fetch();
        require_once (BASE_PATH . "/template/admin/categories/show.php");
    }

    public function create()
    {
        require_once (BASE_PATH . "/template/admin/categories/create.php");
    }

    public function store($request)
    {
        $db = new DataBase();
        $db->insert('categories', array_keys($request), $request);
        $this->redirect('category');
    }

    public function edit($id)
    {
        $db = new DataBase();
        $category = $db->select("SELECT * FROM `categories` WHERE `id` = ? ;", [$id])->fetch();
        require_once (BASE_PATH . "/template/admin/categories/edit.php");
    }

    public function update($request, $id)
    {
        $db = new DataBase();
        $db->update('categories', $id, array_keys($request), $request);
        $this->redirect('category');
    }

    public function delete($id)
    {
        $db = new DataBase();
        $db->delete('categories',$id);
        $this->redirectBack();
    }
}