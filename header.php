<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <title>blog</title>
</head>
<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="#">
                <h1 class="header__title"><?php bloginfo( 'name' ); ?></h1>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <?php 
                    $path=get_bloginfo( 'stylesheet_directory' )."/pages.json";
                    $links=json_decode(file_get_contents($path));
                    foreach ($links as $link) : ?>
                    <?php if ($link->active==True):?>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= home_url();?><?=$link->path ?>"><?=$link->title?><span class="sr-only">(current)</span></a>
                    </li>
                    <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= home_url();?><?=$link->path ?>"><?=$link->title?></a>
                    </li>
                    <?php endif ?>
                <?php endforeach; ?>
                </ul>
                
                <?php if ( is_active_sidebar( 'navbar-widget' ) ) : ?>
                    <div class="navbar__widget">
                        <?php dynamic_sidebar( 'navbar-widget' ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="row">