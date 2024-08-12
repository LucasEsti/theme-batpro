<?php

/**
 * Template Name: Promo page
 */

get_header(); ?>

<?php 
    $version = "";
    if (get_field('version_page') == "en") {
        $version = "_en";
    }
    ?>

<section id="sectwrapper2">
    <div id="banniere" class="container">
        <div class="banniereimg" >
            <img class="img-fluid mobile" src="<?php the_field("images_mobile"); ?>" alt="Banniere">
            <img class="img-fluid desktop" src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', false )[0] ?>" alt="Banniere">
        </div>
<!--        <div class="content">
            <div class="titres"><?php the_title(); ?></div>
        </div>-->
	</div>
	<!-- Breadcrumb -->
	<nav aria-label="breadcrumb" class="container">
		<ol class="breadcrumb">
                        <!-- en lien ------------------>
			<li class="breadcrumb-item"><a href="<?php the_field('lien_home'. $version, 'option'); ?>"><?php the_field('libelle_home'. $version, 'option'); ?></a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
		</ol>
	</nav>
        
        </section>
	<?php get_template_part('template-parts/pub',
                null,
                array(
                    'version'   => $version,
                    'full' => true
                )); ?>
</section>



<?php get_footer(); ?>
