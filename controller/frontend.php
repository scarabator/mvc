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

    require_once ROOT .'/view/frontend/postView.php';
}



function postComment($postId, $author, $comment)
{
    $db = dbConnect();
    $comments = $db->prepare('INSERT INTO comments(post_id, author, comment) VALUES(?, ?, ?)');
    $affectedLines = $comments->execute(array($postId, $author, $comment));

    return $affectedLines;
}

function addComment($postId, $author, $comment)
{
    $affectedLines = postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}
