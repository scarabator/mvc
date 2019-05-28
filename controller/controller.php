<?php
$rt = ('/var/www/html/mvc/mvc-op');
$_SERVER['DOCUMENT_ROOT']=$rt;

define("ROOT", $_SERVER['DOCUMENT_ROOT']);

require_once ROOT . '/model/model.php';


function listPosts()
{
    $posts = getPosts();

    require_once ROOT . '/view/indexView.php';
}

function post()
{
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);

    require('../view/frontend/postView.php');
}