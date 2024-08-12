<?php

get_header(); 
$decl_default = null;
if(isset($_GET['decl'])) {
    $decl_default = $_GET['decl'];
}
?>
  <!-- Banniere -->
  <section id="banniere" class="container">
        <?php
            $terms = get_the_terms( $post->ID , 'nos-produits');
            if (!isset($terms)) {
                if( $terms[0]->parent != 0 ) {
                    $terms = array_reverse($terms, false);
                }

                $lengthTerms = count($terms) - 1 ;
                $images = get_field( 'taxonomy_banniere', 'nos-produits_'.$terms[$lengthTerms]->parent);
                $imagesipad = get_field( 'taxonomy_banniere_ipad', 'nos-produits_'.$terms[$lengthTerms]->parent);
                $imagesmobile = get_field( 'taxonomy_banniere_mobile', 'nos-produits_'.$terms[$lengthTerms]->parent);

                echo '<img src="'. $images['url'] .'" class="img-fluid desktop">';
                echo '<img src="'. $imagesipad['url'] .'" class="img-fluid ipad">';
                echo '<img src="'. $imagesmobile['url'] .'" class="img-fluid mobile">';
            }
            
        ?>
        <div class="content">
            <div class="titres">

                <ul class="taxonomy">
                <li><?php echo $terms[$lengthTerms]->name; ?></li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#" id="produitsText">Nos produits</a></li>
            <li class="breadcrumb-item">
                <ul class="taxonomy">
                    <?php 
                    if (!isset($terms)) {
                        foreach ( $terms as $term ) { ?>
                    <li><a href="<?php echo get_term_link($term->term_id); ?>">
                            <?php echo  $term->name ; ?>
                        </a>
                    </li>
                    <?php } } ?>
                </ul>
            </li>
            <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
        </ol>
    </nav>

    <!-- Contenu Page -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!--Détail-->
                
                <section id="detail-produit">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="liste-detail1">
                                <?php
                                        $declinaison = get_field('declinaison');
                                        if(!empty($declinaison) && $declinaison["value_repetiteur"] != false): 
                                        $j = 0;
                                        $type_declinaison = "";
                                        $numero_declinaison = "";
                                        foreach( $declinaison['value_repetiteur'] as $valueRepetiteur ):
                                            if ($valueRepetiteur["reference"] == $decl_default) {
                                                $numero_declinaison = $j;
                                                $type_declinaison = $declinaison['type_declinaison'];
                                            }
                                            if(!empty($valueRepetiteur["image"]) && $valueRepetiteur["image"] != "") :
                                            ?>
                                                <li>
                                                    <img src="<?php echo $valueRepetiteur["image"]; ?>" class="img-fluid">
                                                </li>
                                    <?php 
                                            endif;
                                    $j++;
                                    endforeach;
                                    endif; ?> 
                                <?php
                                $images = get_field('galerie_produit');
                                if( $images ): ?>
                                    <?php 
                                    foreach( $images as $image ): ?>
                                            <li class="item ">
                                            <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid">
                                        </li>
                                    <?php 
                                    endforeach; ?>
                                <?php endif; ?>
                            </ul>
                            <ul class="liste-detail2">
                                <?php
                                        $declinaison = get_field('declinaison');
                                        if(!empty($declinaison) && $declinaison["value_repetiteur"] != false): 
                                        $j = 0;
                                        foreach( $declinaison['value_repetiteur'] as $valueRepetiteur ): 
                                            if(!empty($valueRepetiteur["image"]) && $valueRepetiteur["image"] != "") :
                                            ?>
                                            <li>
                                                <img src="<?php echo $valueRepetiteur["image"]; ?>" class="img-fluid">
                                            </li>
                                    <?php 
                                    endif;
                                    $j++;
                                    endforeach;
                                    endif; ?> 
                                <?php
                                $images = get_field('galerie_produit');
                                if( $images ): ?>
                                    <?php foreach( $images as $image ): ?>
                                        <li>
                                            <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid">
                                        </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                            <div class="btncartmobile mobile">
                                <?php $featured_posts = get_field('departement_ou_equipe'); ?>
                                    <?php // if( $featured_posts ): ?>
                                        <?php // foreach( $featured_posts as $post ): ?>
<!--                                    <a href="mailto:<?php the_field( 'email' ); ?>" class="btns outline contactexpert">Contacter l'expert</a>-->
                                        <?php // endforeach;  wp_reset_postdata(); ?>
                                    <?php // endif; ?>
                                <span class="custompanier">
                                    <?php echo do_shortcode('[bpcart_button product="'.get_the_ID().'" type_declinaison="'. $type_declinaison.'" declinaison="'.$numero_declinaison.'" metric="" ]')?>
                                </span>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <h4 class="reference-produit">
                                <?php if( $decl_default != NULL ): ?>
                                    <strong> Ref: </strong> 
                                    <span class="reference-declinaison"> <?php echo $decl_default; ?> </span>
                                
                                <?php elseif( get_field('references') ): ?>
                                    <strong> Ref: </strong> 
                                    <span class="reference-declinaison"> <?php the_field('references'); ?> </span>
                                <?php endif; ?>
                                    
                                <?php if( get_field('marques') ): ?>
                                <strong>&nbsp;- Marque:</strong> 
                                    <?php the_field('marques'); ?> 
                                <?php endif; ?> 
                                </h4>
                            <h2 class="mb-2">
                                <?php the_title(); ?>
                            </h2>
                                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <div class="row mb-2">
                                        <?php
                                            $declinaison = get_field('declinaison');
                                            if(!empty($declinaison) && $declinaison["value_repetiteur"] != false): 
                                                ?>

                                                <div id="declinaison-<?php echo $declinaison['type_declinaison']; ?>" class="declinaison col-lg-6 col-md-6 col-sm-12 d-flex align-items-center">
                                                    <?php echo $declinaison['type_declinaison']; ?>:
                                                </div>
                                                <div id="value_type" class="col-lg-6 col-md-6 col-sm-12">
                                                    <select name="value_repetiteur" type_declinaison-value="<?php echo $declinaison['type_declinaison']; ?>" metric-value="<?php echo $declinaison['metric']; ?>" class="value_repetiteur form-control">
                                                    <?php
                                                    $j = 0;
                                                    $slick = -1;
                                                    foreach( $declinaison['value_repetiteur'] as $valueRepetiteur ): 
                                                        if ($valueRepetiteur["image"] != "") {
                                                            $slick++;
                                                            $sl = $slick;
                                                        } else {
                                                            $sl = $valueRepetiteur["numero"];
                                                        }
                                                        ?>
                                                        <option <?php if ($valueRepetiteur["reference"] == $decl_default) { ?>selected="selected" defaultDecl="<?php echo $j; ?>"<?php } ?> 
                                                                                                                              value="<?php echo $j; ?>" 
                                                                                                                              technical="<?php if (is_array($valueRepetiteur["technical"])): echo $valueRepetiteur["technical"]["url"]; elseif(get_field("fiche_produit")): the_field("fiche_produit"); else: echo '#'; endif;?>"
                                                                                                                              numeroSlick="<?php echo $sl; ?>" 
                                                                                                                              reference="<?php echo $valueRepetiteur["reference"]; ?>">
                                                            <?php echo $valueRepetiteur["value"]; ?>
                                                        </option>
                                                    <?php 
                                                    $j++;
                                                    endforeach; ?>
                                                    </select>
                                                </div>

                                            <?php endif; wp_reset_postdata();?>
                                    </div>
                                    <div class="scroll-desc">
                                        <?php if( get_field('extrait_description') ): ?>
                                            <div class="extrait-description">
                                                <p><?php the_field('extrait_description'); ?></p>
                                            </div>
                                        <?php endif; ?>
                                        <?php
                                            if(!empty($declinaison) && $declinaison["value_repetiteur"] != false): 
                                                $i = 0;
                                                foreach( $declinaison['value_repetiteur'] as $valueRepetiteur ):?>
                                            <div class="descr-decl description-declinaison-<?php echo $i; ?> <?php if($i != $numero_declinaison): echo 'd-none'; endif;?>">
                                                <p><?php echo $valueRepetiteur["description"]; ?></p>
                                            </div>
                                        <?php 
                                                $i++;
                                                endforeach;
                                            endif; ?>
                                        <?php if ( !empty( get_the_content() ) ){  ?>
                                            <div class="more">
                                                <?php the_content(); ?>
                                            </div>
                                            <a href="javascript:void(0)" class="read"></a>
                                        <?php } ?>
                                            
                                    </div>
                                    
                                <?php endwhile; endif; ?>
                                
                                
                                
                                <?php $colors = get_field( 'color' );?>
                                
                                    
                                <div class="ipad">
                                    <?php if(!empty($declinaison) && $declinaison["value_repetiteur"] != false  && $numero_declinaison != ''  ): ?>
                                            fiche produit<br>
                                            <a href="<?php if (is_array($declinaison['value_repetiteur'][$numero_declinaison]["technical"])): 
                                                echo $declinaison['value_repetiteur'][$numero_declinaison]["technical"]["url"]; 
                                            elseif (get_field('fiche_produit')): 
                                                the_field('fiche_produit');
                                            else:
                                                echo '#';
                                            endif;?>" 
                                               class="btn-down technical-sheet" target="_blank">télécharger <i class="fas fa-file-download"></i></a>
                                            
                                    <?php elseif (get_field('fiche_produit')): ?>
                                            fiche produit<br>
                                            <a href="<?php the_field('fiche_produit'); ?>" class="btn-down technical-sheet" target="_blank">télécharger <i class="fas fa-file-download"></i></a>
                                    <?php endif; ?>
                                    <?php $featured_posts = get_field('departement_ou_equipe'); ?>
                                        <?php if( $featured_posts ): ?>
                                            <?php // foreach( $featured_posts as $post ): ?>
                                            <!--<a href="mailto:<?php the_field( 'email' ); ?>" class="btns outline contactexpert">Contacter l'expert</a>-->
                                            <?php // endforeach;  wp_reset_postdata(); ?>
                                        <?php endif; ?>
                                    <span class="custompanier">
                                        <?php echo do_shortcode('[bpcart_button product="'.get_the_ID().'" type_declinaison="'. $type_declinaison.'" declinaison="'.$numero_declinaison.'" metric="" ]')?>
                                    </span>
                                </div>
                                    
                                <div class="desktop">
                                     <?php if(!empty($declinaison) && $declinaison["value_repetiteur"] != false && $numero_declinaison != '' ): 
                                     ?>
                                            fiche produit<br>
                                            <a href="<?php if (is_array($declinaison['value_repetiteur'][$numero_declinaison]["technical"])): 
                                                echo $declinaison['value_repetiteur'][$numero_declinaison]["technical"]["url"]; 
                                            elseif (get_field('fiche_produit')): 
                                                the_field('fiche_produit');
                                            else:
                                                echo '#';
                                            endif;?>"  
                                               class="btn-down technical-sheet" target="_blank">télécharger <i class="fas fa-file-download"></i></a>
                                    <?php elseif (get_field('fiche_produit')): ?>
                                            fiche produit<br>
                                            <a href="<?php the_field('fiche_produit'); ?>" class="btn-down technical-sheet" target="_blank">télécharger <i class="fas fa-file-download"></i></a>
                                    <?php endif; ?>
                                    <?php $featured_posts = get_field('departement_ou_equipe'); ?>
                                        <?php if( $featured_posts ): ?>
                                            <?php // foreach( $featured_posts as $post ): ?>
                                        <!--<a href="mailto:<?php the_field( 'email' ); ?>" class="btns outline contactexpert">Contacter l'expert</a>-->
                                            <?php // endforeach;  wp_reset_postdata(); ?>
                                        <?php endif; ?>
                                    <span class="custompanier">
                                        <?php echo do_shortcode('[bpcart_button product="'.get_the_ID().'" type_declinaison="'. $type_declinaison.'" declinaison="'.$numero_declinaison.'" metric="" ]')?>
                                    </span>
                                </div>

                                <ul class="marque">
                                    <?php if( $featured_posts ): ?>
                                        <?php foreach( $featured_posts as $post ): ?>
                                            <li>
                                                <div class="mb-4"><strong>Antananarivo</strong></div>
                                                <div class="phone"><i class="fas fa-user"></i><?php the_field( 'nom-du-responsable' ); ?></div>
                                                <div class="phone"><i class="fas fa-mobile"></i><?php the_field( 'mobile' ); ?></div>
                                                <div class="phone"><i class="fas fa-phone-square-alt"></i><?php the_field( 'telephone' ); ?></div>
                                                <div class="mail"><a href="mailto:<?php the_field( 'email' ); ?>"><i class="fas fa-envelope"></i><?php the_field( 'email' ); ?></a></div>
                                            </li>
                                            <?php endforeach;  wp_reset_postdata(); ?>
                                    <?php endif; ?>
                                    
                                        
                                        <li>
                                            <div class="mb-4"><strong>Toamasina</strong></div>
                                            <div class="phone"><i class="fas fa-user"></i>Rivoniaina RAHARISON</div>
                                            <div class="phone"><i class="fas fa-mobile"></i>+261 (0)  34 44 113 04</div>
                                            <div class="phone"><i class="fas fa-phone-square-alt"></i>+261 (0)  34 44 113 85</div>
                                            <div class="mail"><a href="mailto:batprotmv@batpro.mg"><i class="fas fa-envelope"></i>batprotmv@batpro.mg</div>
                                        </li>
                                </ul>
                        </div>
                    </div>
                </section>

                <?php get_template_part('template-parts/prestation'); ?>

                <!-- Nouveautes -->
                <section id="nouveaux">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Ces articles peuvent vous intéresser !</h2>
                            <ul class="liste-articles">
                                <?php
                                $args = array('post_type' => 'produits', 'orderby' => 'rand', 'posts_per_page' => '10');
                                if (!isset($terms)) {
                                    $args['tax_query'] = array(
                                        array(
                                          'taxonomy' => 'nos-produits',
                                          'field' => 'id',
                                          'terms' => $terms[0]->term_id
                                        )
                                    );
                                }
                                $ref = new WP_Query($args); ?>
	                                <?php  if( $ref->have_posts() ) : while( $ref->have_posts() ) : $ref->the_post(); ?>
                                        <li>
                                            <div class="product">
                                                <div class="content-product-imagin"></div>
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
                                                        <div class="ref">
                                                            <?php if( get_field('references') ): ?>
                                                                <strong> Ref: </strong> <?php the_field('references'); ?>
                                                            <?php endif; ?>
                                                            <?php if( get_field('marques') ): ?>
                                                                <strong> - Marque:</strong> <?php the_field('marques'); ?>  
                                                            <?php endif; ?>  
                                                            
                                                        </div>
                                                        <div class="content-product">
                                                            <div class="product__short-description">
                                                                <?php echo wp_trim_words( get_field("extrait_description"), 23, '...' ); ?>
                                                            </div>
                                                            <a href="<?php the_permalink(); ?>" class="btns mb-2">en savoir plus</a>
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
                                        </li>
                                    <?php endwhile; wp_reset_postdata(); ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </section>

                <?php get_template_part( 'template-parts/partenaire' ); ?>

                <?php get_template_part('template-parts/newsletter'); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
