<?php

/**
 * Template Name: Accueil
 */

get_header(); ?>
    <?php 
        $version = "";
        
        if (get_field('version_page') == "en") {
            $version = "_en";
            
        }
        ?>

    <!-- Slider -->
    <section id="slider" class="container">
        <div class="row">
            <div class="col-12 owl-carousel owl-theme">
                <?php if( have_rows('slider_section1') ): 
                    $i = 0;
                    $random_number_array = range(0, 6);
                    shuffle($random_number_array );
                    $random_number_array = array_slice($random_number_array ,0,3);

                    ?>
                    
                    <?php while( have_rows('slider_section1') ): the_row(); 
                        if (in_array($i, $random_number_array)) {
                    ?>
                        <div class="item">
                            <img src="<?php the_sub_field('image'); ?>" class="img-fluid">
                        </div>
                    <?php 
                    }
                    $i++;
                    endwhile; ?>
                <?php endif; ?>
            </div>

        </div>
    </section>
    
    <!-- Contenu Page -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Nouveautes -->
                <section id="nouveaux">
                    <div class="row">
                        <div class="col-sm-12">
                            
                            <!-- notre <strong>sélection</strong> du moment -->
                            <h1><?php the_field('titre_liste_produits'); ?></h1>
                            
                        </div>
                        <div class="col-sm-12">
                            <div class="wrapper">
                                <div class="header">
                                    <i class="[ icon  icon--grid ]  [ fa  fa-th ]  [ icon ]  active"></i>
                                    <i class="[ icon  icon--list ]  [ fa  fa-list ]  [ icon ]"></i>
                                </div>
                                
                                <div class="products grid group">
                                    
                                    
                                <?php //, 'post__in'=> $motoPompe
//                                $motoPompe = array(42942, 1267, 1317, 29976, 46558, 1779, 46537, 46542);
                                $ref = new WP_Query(array('post_type' => 'produits', 'orderby' => 'rand', 'posts_per_page' => '12')); ?>
                                    
	                                <?php  if( $ref->have_posts() ) : while( $ref->have_posts() ) : $ref->the_post();
	                                ?>
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
                                                            <img src="<?php echo $image['url']; ?>" alt="<?php the_title();?>" class="img-fluid" />
                                                    <?php endif; ?>
                                                </div>
                                            </a>
                                            <div class="product__details">
                                                <div class="product__name d-flex justify-content-center">
                                                    <span class="product__name_span"><?php the_title(); ?></span>
                                                </div>
                                                <div class="ref"><?php if( get_field('marques') ): ?><strong>marque:</strong> <?php the_field('marques'); ?> - <?php endif; ?>  <?php if( get_field('references') ): ?><strong>ref:</strong> <?php the_field('references'); ?><?php endif; ?></div>
                                                <div class="content-product">
                                                    <?php
                                                        $declinaison = get_field('declinaison');
                                                        $linkdecl = "";
                                                        $decl_default = "";
                                                        $description = "";
                                                        $iter = 0;
                                                        if(!empty($declinaison)): 
                                                            foreach( $declinaison['value_repetiteur'] as $valueRepetiteur ):
                                                                if($valueRepetiteur["reference"] == $_GET["s"]): 
                                                                    $linkdecl = "?decl=" . $_GET["s"];
                                                                    $decl_default = $_GET["s"];
                                                                    $description = $valueRepetiteur["description"];
                                                                    if ($iter == "" || $iter == null) {
                                                                        $iter = 0;
                                                                    } else {
                                                                        $iter = $valueRepetiteur["numero"];
                                                                    }

                                                                endif;
                                                            endforeach;
                                                    ?>
                                                    <?php endif;?>
                                                    
                                                    
                                                    <?php 
                                                        $text = get_field("extrait_description");
                                                        if (get_field("extrait_description") == "") {
                                                            $text = $description;
                                                        }
                                                        $text = trim(strip_tags($text));
                                                        $text = str_replace("\xC2\xA0", ' ', $text);
                                                        ?>
                                                    <div class="product__short-description">
                                                        <?php echo wp_trim_words( $text, 23, '...' ); ?>
                                                    </div>
                                                    
                                                    <!-- en savoir plus ---------------------------------------------- -->
                                                    <a href="<?php the_permalink(); ?>" class="btns text_more">en savoir plus</a>
                                                    
                                                    <!-- en lien---------------------------------------------- -->
                                                    <?php
                                                        if(empty($declinaison) || $declinaison["value_repetiteur"] == false): 
                                                    ?>
                                                        <?php echo do_shortcode('[bpcart_button product="'.get_the_ID().'"]')?>
                                                    <?php endif;?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                    endwhile; wp_reset_postdata(); ?>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
    
                <?php get_template_part('template-parts/prestation'); ?>
                
                <?php get_template_part('template-parts/pub',
                        null,
                        array(
                            'version'   => $version,
                            'full' => false
                        )); ?>
                
                <?php get_template_part('template-parts/partenaire'); ?>
                
                <?php get_template_part('template-parts/newsletter'); ?>
    
            </div>
        </div>
    </div>

<?php get_footer(); ?>
