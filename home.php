<?php
/*
Template Name: home
*/
?>
<?php get_header()?>    
<div class="container">
    <div class="main">
        <div class="main__left">
            <h1 class="main___head"><?php the_field('Line1'); ?></h1>
            <h1 class="main___head"><?php the_field('Line2'); ?></h1>
            <h1 class="main___head"><span><?php the_field('Line3'); ?></span></h1>
             <h1 class="main___head"><?php the_field('Line4'); ?></h1>
        </div>
        <div class="main__right">
            <?php echo get_the_post_thumbnail( $page->ID, 'full');?>
        </div>     
    </div>
    <div class="stack">
        <img src="<?php bloginfo('template_url');?>/assets/img/html-icon.svg" alt="HTML">
        <img src="<?php bloginfo('template_url');?>/assets/img/css-icon.svg" alt="CSS">
        <img src="<?php bloginfo('template_url');?>/assets/img/js-icon.svg" alt="JS">
        <img src="<?php bloginfo('template_url');?>/assets/img/logos_react.svg" alt="React">
        <img src="<?php bloginfo('template_url');?>/assets/img/Vector.png" alt="">
        <img src="<?php bloginfo('template_url');?>/assets/img/logos_bootstrap.svg" alt="">
    </div>
    <div class="projects">
        <h2 class="projects__head"><?php the_field('project_title'); ?></h2>

        <div class="projects-wrap">

            <?php
                global $post;

                $myposts = get_posts([ 
                    'numberposts' => 3,
                     'category_name'    => 'project'
                ]);

                if( $myposts ){
                    foreach( $myposts as $post ){
                        setup_postdata( $post );
                        ?>
                        <!-- Вывод постов, функции цикла: the_title() и т.д. -->
                        <div class="project">
                            <div class="post">
                                <?php echo get_the_post_thumbnail( $page->ID, 'full'); ?>
                            </div>
                        
                            <div class="project-wrap">
                                <h3 class="project__head"><?php the_title();?></h3>
                                <p class="project__text"><?php the_field('project_line1'); ?></p>
                                <p class="project__stack"><?php the_field('project_line2'); ?><span><?php the_field('project_line3'); ?></span></p>
                                <div class="project__link">
                                    <img src="<?php bloginfo('template_url');?>/assets/img/akar-icons_link-chain.svg" alt="">
                                    <a href="<?php echo get_permalink(); ?>"><?php the_field('project_line4'); ?></a>
                                </div>
                            </div>
                        </div>
                        <?php 
                    }
                }

                wp_reset_postdata(); // Сбрасываем $post
                ?>

            
                
                                
        </div>
    </div>
</div> 
<?php get_footer()?>    