<?php
/**
 * Template Name: tpl-destockage
 */

get_header(); ?>

<?php 
        $version = "";
        if (get_field('version_page') == "en") {
            $version = "_en";
        }
        ?>

<!-- Banniere-->
    <section id="banniere" class="container">
        <img src="<?php the_field('image'); ?>" class="img-fluid desktop">
        <img src="<?php the_field('images_mobile'); ?>" class="img-fluid ipad">
        <img src="<?php the_field('images_mobile'); ?>" class="img-fluid mobile">
    </section>


    <!-- Contenu Page -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Nouveautes -->
                <section id="nouveaux">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2><?php single_cat_title(); ?></h2>
                        </div>
                        <div class="col-sm-12">
                            <div class="wrapper">
                                <div class="header">
                                  <i class="[ icon  icon--grid ]  [ fa  fa-th ]  [ icon ]  active"></i>
                                  <i class="[ icon  icon--list ]  [ fa  fa-list ]  [ icon ]"></i>
                                </div>
                                <div class="products grid group">
                                <?php // 
                                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                $references = explode(", ", get_field('liste'));
                                $catlist = new WP_Query(array(
                                    'post_type' => 'produits',  
                                    'posts_per_page' => '20',
                                    'paged'          => $paged, // Ajout de la pagination
                                    'meta_query'     => array(
                                            array(
                                                'key'     => 'references', // Nom du champ ACF
                                                'value'   => $references, // Tableau de références
                                                'compare' => 'IN',        // Recherche les produits avec une référence dans le tableau
                                            ),
                                            ),
                                    )); ?>
	                                <?php if( $catlist->have_posts() ) : while( $catlist->have_posts() ) : $catlist->the_post(); ?>
                                    <?php // if (have_posts()) : while (have_posts()) : the_post(); ?>
                                        <div class="product">
                                            <div class="content-product-imagin"></div>
                                            <div class="content-product-list"></div>
                                            <div class="product__inner">
                                                <a href="<?php the_permalink(); ?>" class="link">
                                                    <div class="product__image">
                                                        <?php
                                                        $images = get_field('galerie_produit');
                                                        $image  = $images[0];
                                                        if( $image ) : ?>
                                                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-fluid"/>
                                                        <?php endif; ?>
                                                    </div>
                                                </a>
                                                <div class="product__details">
                                                    <div class="product__name"><span class="product__name_span"><?php the_title(); ?></span></div>
                                                    <div class="ref"><?php if( get_field('marques') ): ?><strong>Marque:</strong> <?php the_field('marques'); ?> - <?php endif; ?>  <?php if( get_field('references') ): ?><strong>Ref:</strong> <?php the_field('references'); ?><?php endif; ?></div>
                                                    <div class="content-product">
                                                        <div class="product__short-description">
                                                            <?php //the_field("extrait_description"); ?>
                                                            <?php echo wp_trim_words( get_field("extrait_description"), 23, '...' ); ?>
                                                        </div>
                                                        <a href="<?php the_permalink(); ?>" class="btns">En savoir plus</a>
                                                        
                                                        <?php
                                                                $declinaison = get_field('declinaison');
                                                                if(empty($declinaison) ||  $declinaison["value_repetiteur"] == false): 
                                                            ?>
                                                                <?php echo do_shortcode('[bpcart_button product="'.get_the_ID().'"]')?>
                                                            <?php endif;?>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; 
                                    wp_reset_postdata();?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 text-center">
                            <?php wp_pagenavi(array('query' => $catlist));?>
                        </div>
                        <?php endif; ?>
                    </div>
                </section>

                <?php get_template_part('template-parts/prestation'); ?>

                <?php get_template_part('template-parts/pub',
                        null,
                        array(
                            'version'   => $version,
                            'full' => false
                        )); ?>

                <?php get_template_part( 'template-parts/partenaire' ); ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
