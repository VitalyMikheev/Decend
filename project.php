<?php
/*
Template Name: project
Template Post Type: post, pages
*/
?>
<?php get_header()?>  
<div class="container">
    <div class="project_full_wrap">


    <div class="project_full">
        <?php echo get_the_post_thumbnail( $page->ID, 'full'); ?>
        <h1 class="project__head"><?php the_title(); ?></h1>
        <p class="project__text"><?php the_content(); ?></p>
    </div>
    </div>
</div>




<?php get_footer()?>    