<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<!--Breadcrumb-->
<nav aria-label="breadcrumb">
	<?php
	if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb( '<p id="breadcrumbs" class="yoast-breadcrumb">','</p>' );
	}
	?>
</nav>

<!--Boutique-->
<div id="boutique-page" class="pizza">
	<section id="intros">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
						<?php  /* <h1><?php single_cat_title(); ?><h1> */ ?>
						<?php the_archive_description( '<p>', '</p>' ); ?>
				</div>


			</div>
		</div>
		<div class="slide-boutique">
			<div id="slideboutique" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					<?php if( have_rows('slider_tpl_epiceriefine','categories_' . get_queried_object()->term_id) ): ?>
						<?php while( have_rows('slider_tpl_epiceriefine','categories_' . get_queried_object()->term_id) ): the_row(); ?>
							<div class="carousel-item">
								<img src="<?php the_sub_field('image_slider_tpl_epiceriefine'); ?>" class="d-block w-100">
								<div class="carousel-caption">
									<div class="titre"><?php the_sub_field('titre_slider_tpl_epiceriefine'); ?></div>
									<div class="content">
										<p><?php the_sub_field('description_slider_tpl_epiceriefine'); ?></p>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
				<a class="carousel-control-prev" href="#slideboutique" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#slideboutique" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
		<div class="container contenu">
			<div class="row">
				<div class="col-sm-12">
					<ul class="lien-contact">
						<?php if( get_field('contactez-nous', 'option') ): ?>
							<li>
								<a href="<?php the_field('contactez-nous', 'option'); ?>"><img src="<?php bloginfo("template_url"); ?>/assets/images/phone-white.svg" class="img-fluid">Contactez-nous</a>
							</li>
						<?php endif; ?>

						<?php if( get_field('demandez_un_devis', 'option') ): ?>
						<li>
							<a href="<?php the_field('demandez_un_devis', 'option'); ?>"><img src="<?php bloginfo("template_url"); ?>/assets/images/devis-white.svg" class="img-fluid">Demandez un devis</a>
						</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<!-- Nos pizzas -->
	<section class="listing-pizza">
		<div class="container-fluid">
		<div class="col-sm-12 filter-produits">
			<?php
				$terms = get_terms('categories', array('hide_empty' => false));

				$count = count($terms); $i=0;
				if ($count > 0) {
						?><ul class="menus"><?php

						foreach ($terms as $term) {
							$currentActive="";
							$cat_picto= get_field('picto',$term->taxonomy . '_' . $term->term_id);

							if($term->term_id==get_queried_object()->term_id){
								$currentActive="current";
							}
							?>
							<li class="<?php echo $currentActive; ?>">
									<a href="<?php echo site_url() ?>/epicerie-fine/<?php echo $term->slug; ?>"><img  src="<?php echo esc_url($cat_picto['url']); ?>" alt="<?php echo esc_attr($cat_picto['alt']); ?>" class="img-fluid"><p><?php echo get_field('intitule',$term->taxonomy . '_' . $term->term_id); ?></p></a>
							</li>
							<?php

						}
						?></ul><?php
				}
			?>
				<!-- <div class="col-sm-12 text-center"><h2 class="filtre">Sauces & accompagnements</h2></div> -->
				<div class="row listing-block">


			<?php if ( have_posts() ) :
			while ( have_posts() ) : the_post(); ?>
					<div class="col-sm-3 <?php echo $firstCategory->slug;  ?> <?php echo $firstCategory2->slug;  ?>">
                            <div class="block">
                                <a href="<?php the_permalink(); ?>"></a>
                                <div class="img-media">
                                    <?php
                                        $images = get_field('photo_epiceriefine');
                                        $image  = $images[0];

                                        if( $image ) : ?>
                                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                        <?php endif; ?>
                                </div>
                                <div class="titre"><?php the_title(); ?></div>
                                <div><?php if(get_field('resume')) echo get_field('resume'); else the_excerpt_limit(180); ?></div>
                                <div class="btn"></div>
                            </div>
                     </div>
				<?php endwhile; ?>
				</div>
			</div>
			<nav id="pagination">
				<?php wp_pagenavi();?>
			</nav>
			<?php endif; ?>
		</div>
	</section>

	<ul class="lien-contact">
		<?php if( get_field('contactez-nous', 'option') ): ?>
			<li>
				<a href="<?php the_field('contactez-nous', 'option'); ?>"><img src="<?php bloginfo("template_url"); ?>/assets/images/phone-white.svg" class="img-fluid">Contactez-nous</a>
			</li>
		<?php endif; ?>

		<?php if( get_field('demandez_un_devis', 'option') ): ?>
		<li>
			<a href="<?php the_field('demandez_un_devis', 'option'); ?>"><img src="<?php bloginfo("template_url"); ?>/assets/images/devis-white.svg" class="img-fluid">Demandez un devis</a>
		</li>
		<?php endif; ?>
	</ul>
</div>

<?php get_footer();
