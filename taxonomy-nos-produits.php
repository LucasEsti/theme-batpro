<?php get_header(); ?>

    <!-- Banniere-->
    <section id="banniere" class="container">

        <?php
            // Display the artist image
            $queried_object = get_queried_object();
            $taxonomy = $queried_object->taxonomy;
            $term_id = $queried_object->term_id;
            
            $terms = get_field( 'taxonomy_banniere', $taxonomy.'_'.$term_id);
            $termsipad = get_field( 'taxonomy_banniere_ipad', $taxonomy.'_'.$term_id);
            $termsmobile = get_field( 'taxonomy_banniere_mobile', $taxonomy.'_'.$term_id);

            if($queried_object->parent != 0)
                $terms = get_field( 'taxonomy_banniere', $taxonomy.'_'.$queried_object->parent);
            if($queried_object->parent != 0)
                $termsipad = get_field( 'taxonomy_banniere_ipad', $taxonomy.'_'.$queried_object->parent);
            if($queried_object->parent != 0)
                $termsmobile = get_field( 'taxonomy_banniere_mobile', $taxonomy.'_'.$queried_object->parent);

            echo '<img src="'. $terms['url'] .'" class="img-fluid desktop">';
            echo '<img src="'. $termsipad['url'] .'" class="img-fluid ipad">';
            echo '<img src="'. $termsmobile['url'] .'" class="img-fluid mobile">';

        ?>
<!--        <div class="content">
            <div class="titres"><?php //single_cat_title(); ?><?php echo get_queried_object()->name; ?></div>
        </div>-->
    </section>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="container">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#" id="produitsText">Nos produits</a></li>
          <?php if($queried_object->parent != 0) { ?>
          <li class="breadcrumb-item"><a href="<?php echo get_term_link(get_term($queried_object->parent)->term_id) ?>"><?php echo get_term($queried_object->parent)->name; ?></a></li>
          <?php } ?>
          <li class="breadcrumb-item active" aria-current="page"><?php single_cat_title(); ?></li>
        </ol>
    </nav>

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
                                <?php // $catlist = new WP_Query(array('post_type' => 'produits', 'orderby' => 'rand', 'posts_per_page' => '20', 'cat_id' => $term_id )); ?>
	                                <?php // if( $catlist->have_posts() ) : while( $catlist->have_posts() ) : $catlist->the_post(); ?>
                                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
                            <?php wp_pagenavi();?>
                            <?php //wp_pagenavi(array('query' => $catlist));?>
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
