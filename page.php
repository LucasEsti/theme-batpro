<?php

get_header(); ?>

<?php 
    $version = "";
    if (get_field('version_page') == "en") {
        $version = "_en";
    }
    ?>
<!--page.php-->
<section id="banniere" class="container">
        <img class="img-fluid mobile" src="<?php the_field("images_mobile"); ?>" alt="Banniere">
        <img class="img-fluid ipad" src="<?php the_field("images_mobile"); ?>" alt="Banniere">
        <img class="img-fluid desktop" src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', false )[0] ?>" alt="Banniere">

<!--        <div class="content">
            <div class="titres"><?php // the_title(); ?></div>
        </div>-->
</section>  
<nav aria-label="breadcrumb" class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php the_field('lien_home' . $version, 'option'); ?>"><?php the_field('libelle_home' . $version, 'option'); ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
    </ol>
</nav>
<section id="sectwrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
