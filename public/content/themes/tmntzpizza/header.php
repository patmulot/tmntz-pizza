<?php
$isUserLogged = is_user_logged_in();
wp_head();

global $post;
$page_slug = $post->post_name;

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

// var_dump($paged);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>