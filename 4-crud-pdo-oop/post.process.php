<?php

include("includes/class-autoload.inc.php");

$posts = new Posts();

if (isset($_POST["submit"])) {
    
    $title = $_POST["post-title"];
    $body = $_POST["post-content"];
    $author = $_POST["post-author"];
    $posts->addPost($title, $body, $author);

    header("Location: {$_SERVER['HTTP_REFERER']}");
} else if (isset($_POST["update"])) {

    $id = $_GET["id"];
    $title = $_POST["post-title"];
    $body = $_POST["post-content"];
    $author = $_POST["post-author"];
    $posts->updatePost($title, $body, $author, $id);

    header("Location: /pdo/4-crud-pdo-oop");
} else if ($_GET["send"] === 'del') {

    $id = $_GET["id"];
    $posts->deletePost($id);

    header("Location: {$_SERVER['HTTP_REFERER']}");
}