<?php

/**
 * Template Name: Contact
 */

get_header(); ?>

<?php 
        $version = "";
        $contactForm = "31138";
        if (get_field('version_page') == "en") {
            $version = "_en";
            $contactForm = "46428";
        }
        ?>

<section id="sectwrapper">
    <div id="banniere" class="container">
        <div class="banniereimg" >
            <img class="img-fluid mobile" src="<?php the_field("images_mobile"); ?>" alt="Banniere">
            <img class="img-fluid desktop" src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', false )[0] ?>" alt="Banniere">
        </div>
        <div class="content">
            <div class="titres"><?php the_title(); ?></div>
        </div>
    </div>
    <div id="wrapperIntern">
        <div id="sectContact" class="boxbg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
<!--                        <div class="bannieretxt">
                            <div class="container">
                                <h1 class="titleborder"><?php // the_title(); ?></h1>
                            </div>
                        </div>-->
                    </div>
                    <div class="col-lg-6 colForm mb-4">
                        <?php if( get_field('contenu_contact') ): ?>
                            <?php the_field('contenu_contact'); ?>
                        <?php endif; ?>
                        <div id="boxcontact">     
                            <?php echo do_shortcode('[contact-form-7 id="'. $contactForm . '" title="Contact"]'); ?>              
                        </div>
                    </div>
                    <div class="col-lg-6 coordAside">
                        
                        
                        <h3 class=" col-lg-9 col-md-12 "><?php the_field('experts'); ?></h3>
                        <div class="container row">
                            <div class="col-lg-6 col-md-5">
                                <div class="embed-responsive embed-responsive-1by1 listing-contact listing-contact-2">
                                    <?php if( have_rows('liste_expert_contact') ): ?>
                                        <?php 
                                        $chefI = 0;
                                        while( have_rows('liste_expert_contact') ): the_row(); ?>
                                            <div class="embed-responsive-item txtCoord blockBox container" style="background-color: #<?php the_sub_field('couleur'); ?> ">
                                                <div class="d-flex align-items-start flex-column" style="height: 100%; width: 100%">
                                                    <div class="mb-auto mt-3">
                                                        
                                                        <div class="container pad-0 cntNumb" style="color: #<?php the_sub_field('couleur_text'); ?> "><?php the_sub_field('nom'); ?></div>
                                                        <address class="container pad-0"><?php the_sub_field('profil'); ?></address>
                                                        <div class="container pad-0 profil_2_contact"><?php the_sub_field('profil_2'); ?></div>
                                                    </div>

                                                    <div class="container pad-0 marg_contact">
                                                        <div class="tab-content" id="v-pills-tabContent-<?php echo $chefI; ?>">
                                                            <?php if( get_sub_field('tel') ): ?>
                                                            <div class="tab-pane fade" id="v-pills-home-<?php echo $chefI; ?>" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                                <a href="#" class="boxtel"><?php the_sub_field('tel'); ?></a>
                                                            </div>
                                                            <?php endif; ?>
                                                            <?php if( get_sub_field('phone') ): ?>
                                                            <div class="tab-pane fade" id="v-pills-profile-<?php echo $chefI; ?>" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                                <a href="#" class="boxtel"><?php the_sub_field('phone'); ?></a>
                                                            </div>
                                                            <?php endif; ?>
                                                            <?php if( get_sub_field('email') ): ?>
                                                            <div class="tab-pane fade" id="v-pills-messages-<?php echo $chefI; ?>" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                                                <a href="mailto:<?php the_sub_field('email'); ?>" class="boxtel"><?php the_sub_field('email'); ?></a>
                                                            </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="container p-2">
                                                        <div class="nav nav-pills row info-contact" id="v-pills-tab-<?php echo $chefI; ?>" role="tablist" aria-orientation="horizontal">
                                                            <?php if( get_sub_field('tel') ): ?>
                                                            <a class="nav-link col-lg-4 col-md-4 col-sm-4" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home-<?php echo $chefI; ?>" role="tab" aria-controls="v-pills-home-<?php echo $chefI; ?>" aria-selected="true">
                                                                <div class="embed-responsive embed-responsive-1by1 text-center icon-square">
                                                                    <div class="embed-responsive-item d-flex justify-content-center align-items-center active" >
                                                                        <i class="fas fa-mobile-alt"></i>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <?php endif; ?>
                                                            <?php if( get_sub_field('phone') ): ?>
                                                            <a class="nav-link col-lg-4 col-md-4 col-sm-4" id="v-pills-profile-tab-<?php echo $chefI; ?>" data-toggle="pill" href="#v-pills-profile-<?php echo $chefI; ?>" role="tab" aria-controls="v-pills-profile-<?php echo $chefI; ?>" aria-selected="false">
                                                                <div class="embed-responsive embed-responsive-1by1 text-center icon-square">
                                                                    <div class="embed-responsive-item d-flex justify-content-center align-items-center active" >
                                                                        <i class="fas fa-phone-alt"></i>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <?php endif; ?>
                                                            <?php if( get_sub_field('email') ): ?>
                                                            <a class="nav-link col-lg-4 col-md-4 col-sm-4" id="v-pills-messages-tab-<?php echo $chefI; ?>" data-toggle="pill" href="#v-pills-messages-<?php echo $chefI; ?>" role="tab" aria-controls="v-pills-messages-<?php echo $chefI; ?>" aria-selected="false">
                                                                <div class="embed-responsive embed-responsive-1by1 text-center icon-square">
                                                                    <div class="embed-responsive-item d-flex justify-content-center align-items-center active" >
                                                                        <i class="fas fa-envelope"></i>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <?php endif; ?>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php 
                                        $chefI++;
                                        endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="container row mb-4">
                            
                            <?php if( have_rows('liste_expert_contact_tamatave') ):
                                
                                while( have_rows('liste_expert_contact_tamatave') ): the_row(); ?>
                                    <div class="col-lg-6 col-md-5">
                                        <div class="embed-responsive embed-responsive-1by1 listing-contact">
                                            <div class="embed-responsive-item txtCoord  container" style="background-color: #<?php the_sub_field('couleur'); ?> ">
                                                <div class="d-flex align-items-start flex-column" style="height: 100%; width: 100%">
                                                    <div class="mb-auto mt-3">
                                                        <div class="container pad-0 cntNumb" style="color: #<?php the_sub_field('couleur_text'); ?> "><?php the_sub_field('nom'); ?></div>
                                                        <address class="container pad-0"><?php the_sub_field('profil'); ?></address>
                                                        <div class="container pad-0 profil_2_contact"><?php the_sub_field('profil_2'); ?></div>
                                                    </div>
                                                    
                                                    <div class="container pad-0 marg_contact">
                                                        <div class="tab-content" id="v-pills-tabContent-<?php echo $chefI; ?>">
                                                            <div class="tab-pane fade" id="v-pills-home-<?php echo $chefI; ?>" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                                <a href="#" class="boxtel"><?php the_sub_field('tel'); ?></a>
                                                            </div>
                                                            <div class="tab-pane fade" id="v-pills-profile-<?php echo $chefI; ?>" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                                <a href="#" class="boxtel"><?php the_sub_field('phone'); ?></a>
                                                            </div>
                                                            <div class="tab-pane fade" id="v-pills-messages-<?php echo $chefI; ?>" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                                                <a href="mailto:<?php the_sub_field('email'); ?>" class="boxtel"><?php the_sub_field('email'); ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="p-2 container-fluid">
                                                        <div class="nav nav-pills row info-contact" id="v-pills-tab-<?php echo $chefI; ?>" role="tablist" aria-orientation="horizontal">
                                                            <a class="nav-link col-lg-4 col-md-4 col-sm-4" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home-<?php echo $chefI; ?>" role="tab" aria-controls="v-pills-home-<?php echo $chefI; ?>" aria-selected="true">
                                                                <div class="embed-responsive embed-responsive-1by1 text-center icon-square">
                                                                    <div class="embed-responsive-item d-flex justify-content-center align-items-center active" >
                                                                        <i class="fas fa-mobile-alt"></i>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a class="nav-link col-lg-4 col-md-4 col-sm-4" id="v-pills-profile-tab-<?php echo $chefI; ?>" data-toggle="pill" href="#v-pills-profile-<?php echo $chefI; ?>" role="tab" aria-controls="v-pills-profile-<?php echo $chefI; ?>" aria-selected="false">
                                                                <div class="embed-responsive embed-responsive-1by1 text-center icon-square">
                                                                    <div class="embed-responsive-item d-flex justify-content-center align-items-center active" >
                                                                        <i class="fas fa-phone-alt"></i>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a class="nav-link col-lg-4 col-md-4 col-sm-4" id="v-pills-messages-tab-<?php echo $chefI; ?>" data-toggle="pill" href="#v-pills-messages-<?php echo $chefI; ?>" role="tab" aria-controls="v-pills-messages-<?php echo $chefI; ?>" aria-selected="false">
                                                                <div class="embed-responsive embed-responsive-1by1 text-center icon-square">
                                                                    <div class="embed-responsive-item d-flex justify-content-center align-items-center active" >
                                                                        <i class="fas fa-envelope"></i>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
<!--                                                <div class="container pad-0 cntNumb" style="color: #<?php the_sub_field('couleur_text'); ?> "><?php the_sub_field('nom'); ?></div>
                                                <address class="container pad-0"><?php the_sub_field('profil'); ?></address>
                                                <div class="container pad-0 profil_2_contact"><?php the_sub_field('profil_2'); ?></div>
                                                <div class="container pad-0 mt-5">
                                                    <div class="tab-content" id="v-pills-tabContent-<?php echo $chefI; ?>">
                                                        <div class="tab-pane fade" id="v-pills-home-<?php echo $chefI; ?>" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                            <a href="#" class="boxtel"><?php the_sub_field('tel'); ?></a>
                                                        </div>
                                                        <div class="tab-pane fade" id="v-pills-profile-<?php echo $chefI; ?>" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                            <a href="#" class="boxtel"><?php the_sub_field('phone'); ?></a>
                                                        </div>
                                                        <div class="tab-pane fade" id="v-pills-messages-<?php echo $chefI; ?>" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                                            <a href="mailto:<?php the_sub_field('email'); ?>" class="boxtel"><?php the_sub_field('email'); ?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="container-fluid">
                                                    <div class="nav nav-pills row info-contact" id="v-pills-tab-<?php echo $chefI; ?>" role="tablist" aria-orientation="horizontal">
                                                        <a class="nav-link col-lg-4 col-md-4 col-sm-4" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home-<?php echo $chefI; ?>" role="tab" aria-controls="v-pills-home-<?php echo $chefI; ?>" aria-selected="true">
                                                            <div class="embed-responsive embed-responsive-1by1 text-center icon-square">
                                                                <div class="embed-responsive-item d-flex justify-content-center align-items-center active" >
                                                                    <i class="fas fa-mobile-alt"></i>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a class="nav-link col-lg-4 col-md-4 col-sm-4" id="v-pills-profile-tab-<?php echo $chefI; ?>" data-toggle="pill" href="#v-pills-profile-<?php echo $chefI; ?>" role="tab" aria-controls="v-pills-profile-<?php echo $chefI; ?>" aria-selected="false">
                                                            <div class="embed-responsive embed-responsive-1by1 text-center icon-square">
                                                                <div class="embed-responsive-item d-flex justify-content-center align-items-center active" >
                                                                    <i class="fas fa-phone-alt"></i>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a class="nav-link col-lg-4 col-md-4 col-sm-4" id="v-pills-messages-tab-<?php echo $chefI; ?>" data-toggle="pill" href="#v-pills-messages-<?php echo $chefI; ?>" role="tab" aria-controls="v-pills-messages-<?php echo $chefI; ?>" aria-selected="false">
                                                            <div class="embed-responsive embed-responsive-1by1 text-center icon-square">
                                                                <div class="embed-responsive-item d-flex justify-content-center align-items-center active" >
                                                                    <i class="fas fa-envelope"></i>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    
                                                </div>-->
                                            </div>
                                        </div>
                                    </div>
                            <?php 
                                $chefI++;
                                endwhile;
                                endif; ?>
                                    
                        </div>
                        
                        <div class="col-lg-9 col-md-12">                          
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
