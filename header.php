<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Дисент</title>

    <?php wp_head()?>


    
</head>
<body>
    <div class="container">
        <header class="head-menu">
            <div class="logo">
                <?php the_custom_logo(); ?>
            </div>
            <ul class="menu">
                <?php wp_nav_menu( array(
                    'container' => 'ul',
                    'container_class' => 'menu',
                    'items_wrap' => '<li class="list-item"> %3$s</li>'
                 )); ?>
            </ul>
            <div class="social">
                <a href="#"><img src="<?php bloginfo('template_url');?>/assets/img/git.svg" alt="Git" class="git"></a>
                <a href="#"><img src="<?php bloginfo('template_url');?>/assets/img/twitter.svg" alt="X" class="twitter"></a>
                <a href="#"><img src="<?php bloginfo('template_url');?>/assets/img/linked.svg" alt="Linked" class="linked"></a>
            </div>
        </header>
    </div>
    