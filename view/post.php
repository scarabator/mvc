<?php

$rt = ('/var/www/html/mvc/mvc-op');
$_SERVER['DOCUMENT_ROOT']=$rt;

define("ROOT", $_SERVER['DOCUMENT_ROOT']);

require_once ROOT . '/model/model.php';

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);
 
    require_once ROOT . '/view/frontend/postView.php';
 
}
else {
    echo 'Erreur : aucun identifiant de billet envoyé';
}

