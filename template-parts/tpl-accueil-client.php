<?php

/**
 * Template Name: Accueil client
 */
get_header();
get_header("client"); ?>
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
                                                    <div class="product__short-description">
                                                        <?php echo wp_trim_words( get_field("extrait_description"), 23, '...' ); ?>
                                                    </div>
                                                    
                                                    <!-- en savoir plus ---------------------------------------------- -->
                                                    <a href="<?php the_permalink(); ?>" class="btns text_more">en savoir plus</a>
                                                    
                                                    <!-- en lien---------------------------------------------- -->
                                                    <?php
                                                        $declinaison = get_field('declinaison');
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

    <div class="floating-chat">
            <div class="new-message hidden">
                <i class="fa-solid fa-1"></i>
            </div>
            
            <i class="fa fa-comments" aria-hidden="true"></i>
            <div class="chat container-fluid">
                <div class="header">
                    <span class="title">
                        ChatLive
                    </span>
                    <button type="button" class="btn-close btn-close-white" aria-label="Close"></button>
                </div>
                <ul id="chat" class="messages">
                </ul>
                <div class=" footer">
                    <div class="container">
                        <div class="row ">
                            <div id="response" class="col-12 hidden">
                                <input type="text" id="responseInput" placeholder="Entrez votre réponse" class="form-control text-box " />
                            </div>
                            
                            <div id="simpleMessage" class="col-12 hidden">
                                <input type="text" id="simpleMessageInput" placeholder="Entrez un message" class=" form-control text-box " />
                            </div>
                            
                            
                            <div id="fileInput" class="col-9 hidden mt-2 ">
                                <input type="file" id="fileInputValue" class="form-control  " title=" "/>
                            </div>
                            
                            
                            <div id="sendButton" class="col-2 mt-2 hidden ">
                                <button type="button" onclick="sendResponse()" class=" btn btn-primary ">Send</button>
                            </div>
                            <div id="sendSimpleMessageButton" class="col-2 mt-2 hidden">
                                <button type="button" onclick="sendMessage()" class=" btn btn-primary ">Send</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php get_footer(); ?>
<?php get_footer('client'); ?>
