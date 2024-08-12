<?php
/**
 * Template Name: Partenaire
 */

get_header(); ?>

<?php 
        $version = "";
        if (get_field('version_page') == "en") {
            $version = "_en";
        }
        ?>

<section id="sectwrapper">
		<section id="banniere" class="container">
				<img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', false )[0] ?>" class="img-fluid desktop">
            	<img class="img-fluid mobile" src="<?php the_field('banniere_mobile'); ?>" alt="Banniere">
<!--            <div class="content">
                <div class="titres"><?php // the_title(); ?></div>
            </div>-->
        </section>
         <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php the_field('lien_home' . $version, 'option'); ?>"><?php the_field('libelle_home'. $version, 'option'); ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
            </ol>
        </nav>
		<div class="container content">
			<div class="row">
				<div class="col-sm-12">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php  the_content(); ?>
					<?php endwhile; ?>
				</div>


				<div class="col-sm-6">
					<?php the_field('contenu_scb'); ?>
				</div>
				<div class="col-sm-6">
					<div class="galerie-part1">
						<?php 
						$images = get_field('galerie1');
						if( $images ): ?>
							<?php foreach( $images as $image ): ?>
								<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img-fluid"/>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
				
				<div class="col-sm-6">
					<div class="galerie-part2">
							<?php 
							$images2 = get_field('galerie2');
							if( $images2 ): ?>
								<?php foreach( $images2 as $image ): ?>
									<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image2['alt']); ?>" class="img-fluid"/>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
				</div>
				<div class="col-sm-6">
					<?php the_field('contenu_cimelta'); ?>
				</div>
				<div class="col-sm-12">
				<?php if( get_field('contenu_partenaire') ): ?>
					<?php the_field('contenu_partenaire'); ?>
				<?php endif; ?>
				</div>
			</div>
		</div>
    </section>
<?php get_footer(); ?>
