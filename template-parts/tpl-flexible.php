<?php

/**
 * Template Name: PAGE FLEXIBLE
 */

get_header(); ?>
<?php 
        $version = "";
        if (get_field('version_page') == "en") {
            $version = "_en";
        }
        ?>
<?php
if( have_rows('page_dynamique') ): ?>
	<?php while ( have_rows('page_dynamique') ) : the_row(); ?>
    <?php if( get_row_layout() == 'banniere_page' ): ?>
        <section id="banniere" class="container">
            <?php if( get_sub_field('image_banniere_page') ): ?>
                <img src="<?php the_sub_field('image_banniere_page'); ?>" class="img-fluid desktop">
            <?php endif; ?>
            <img class="img-fluid mobile" src="<?php the_field("images_mobile"); ?>" alt="Banniere">
            <img class="img-fluid ipad" src="<?php the_field("images_ipad"); ?>" alt="Banniere">

<!--            <div class="content">
                <div class="titres"><?php // the_title(); ?></div>
            </div>-->
        </section>
         <!-- Breadcrumb va-->
        <nav aria-label="breadcrumb" class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php the_field('lien_home' . $version, 'option'); ?>"><?php the_field('libelle_home' . $version, 'option'); ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
            </ol>
        </nav>
    <?php elseif( get_row_layout() == 'texte_gauche_image_droite' ):  ?>
        <section id="text-image" class="container">
            <div class="row">
                <div class="col-sm-6">
                    <?php if( get_sub_field('contenu_texte_gauche_image_droite') ): ?>
                        <div><?php the_sub_field('contenu_texte_gauche_image_droite'); ?></div>
                    <?php endif; ?>
                </div>
                <div class="col-sm-6">
                    <?php 
                    $imagess = get_sub_field('image_texte_gauche_image_droite');
                    $images1  = $imagess[0]; 
                    if( $images1 < 1 ) : ?> 
                        <div class="box-image"><img src="<?php echo $images1['url']; ?>" class="img-fluid" alt="<?php echo $images1['alt']; ?>"></div>
                    <?php else : ?>
                        <div class="slider-page">
                            <?php foreach( $imagess as $images ): ?>
                                <div class="box-image"><img src="<?php echo $images['url']; ?>" class="img-fluid" alt="<?php echo $images['alt']; ?>"></div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-sm-12">
                    <?php if( get_sub_field('description_texte_gauche_image_droite') ): ?>
                        <div><?php the_sub_field('description_texte_gauche_image_droite'); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php elseif( get_row_layout() == 'image_gauche_texte_droite' ):  ?>
        <section id="text-image" class="container">
            <div class="row">
                <div class="col-sm-6">
                    <?php 
                    $images = get_sub_field('image_image_gauche_texte_droite');
                    $image1  = $images[0]; 
                    if( $image1 < 1 ) : ?> 
                        <div class="box-image"><img src="<?php echo $image1['url']; ?>" class="img-fluid" alt="<?php echo $image1['alt']; ?>"></div>
                    <?php else : ?>
                        <div class="slider-page">
                            <?php foreach( $images as $image ): ?>
                                <div class="box-image"><img src="<?php echo $image['url']; ?>" class="img-fluid" alt="<?php echo $image['alt']; ?>"></div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-sm-6 d-flex align-items-center">
                    <?php if( get_sub_field('contenu_image_gauche_texte_droite') ): ?>
                        <div><?php the_sub_field('contenu_image_gauche_texte_droite'); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php elseif( get_row_layout() == 'zone_de_texte' ):  ?>
        <section id="zone-texte" class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php if( get_sub_field('contenu_zone_de_texte') ): ?>
                        <?php the_sub_field('contenu_zone_de_texte'); ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php elseif( get_row_layout() == 'zone_de_texte_bleu' ):  ?>
        <section id="zone-texte" class="bleu">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <?php if( get_sub_field('contenu_zone_de_texte_bleu1') ): ?>
                            <?php the_sub_field('contenu_zone_de_texte_bleu1'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php elseif( get_row_layout() == 'texte_video' ):  ?>
        <section id="texte-video">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <?php if( get_sub_field('logo_texte_video') ): ?>
                            <a href="<?php the_sub_field('lien_texte_video'); ?>" target="_blank"><div class="logo"><img src="<?php the_sub_field('logo_texte_video'); ?>" class="img-fluid"></div></a>
                        <?php endif; ?>
                        <?php if( get_sub_field('contenu_texte_video') ): ?>
                            <?php the_sub_field('contenu_texte_video'); ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-6">
                        <?php if( get_sub_field('video_texte_video') ): ?>
                            <iframe width="100%" height="350" src="<?php the_sub_field('video_texte_video'); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php elseif( get_row_layout() == 'titre_section' ):  ?>
        <section id="titre-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <?php if( get_sub_field('titre_titre_section') ): ?>
                            <div class="titre"><?php the_sub_field('titre_titre_section'); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php elseif( get_row_layout() == 'video_texte' ):  ?>
        <section id="texte-video" class="mobile-rtl">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <?php if( get_sub_field('video_video_texte') ): ?>
                            <iframe width="100%" height="350" src="<?php the_sub_field('video_video_texte'); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-6">
                        <?php if( get_sub_field('logo_video_texte') ): ?>
                            <a href="<?php the_sub_field('lien_video_texte'); ?>" target="_blank"><div class="logo"><img src="<?php the_sub_field('logo_video_texte'); ?>" class="img-fluid"></div></a>
                        <?php endif; ?>
                        <?php if( get_sub_field('contenu_video_texte') ): ?>
                            <?php the_sub_field('contenu_video_texte'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php elseif( get_row_layout() == 'clients_batpro' ):  ?>
        <section id="clients" class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php 
                    $imagesc = get_sub_field('logo_clients_batpro');
                    if( $imagesc ): ?>
                    <ul>
                        <?php foreach( $imagesc as $imagec ): ?>
                            <li>
                                <a href="<?php echo esc_attr($imagec['alt']); ?>">
                                    <img src="<?php echo esc_url($imagec['url']); ?>" alt="<?php echo esc_attr($imagec['alt']); ?>" class="img-fluid"/>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php elseif( get_row_layout() == 'faq' ):  ?>
        <div id="wrapperIntern">
            <div class="cntboxTxt">
                <div class="container">
                    <div class="cntAccordion">
                        <?php if(get_sub_field('liste_faq')): ?>
                            <?php while(has_sub_field('liste_faq')): ?>
                                <div class="itemAccordion">
                                    <h3><?php the_sub_field('titre'); ?>
                                        <span class="icnbox"></span>
                                    </h3>
                                    <div class="bodyAccordion">
                                        <?php the_sub_field('contenu'); ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?> 
                    </div>
                </div>
            </div>
        </div>
    <?php elseif( get_row_layout() == 'statistique_batpro' ):  ?>
        <div id="statistics">
            <section class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="titre"><?php echo get_sub_field('titre'); ?></div>   
                        </div>
                        <?php while(has_sub_field('descriptions')): ?>
                            <div class="col-sm-6 text-center">
                                <span class="statvalue" numx="<?php the_sub_field('numx'); ?>"><?php the_sub_field('value'); ?></span>
                                <p><?php the_sub_field('titre'); ?></p>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </section>
        </div>
	<?php endif; ?>
    <?php endwhile; ?>
<?php else : endif; ?>

<!-- Partenaires -->
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <?php get_template_part( 'template-parts/partenaire'); ?>

            <?php get_template_part('template-parts/newsletter'); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
