    <!-- Footer vaovao -->
    <footer>
        <?php 
                    $version = "";
if (get_field('version_page') == "en") {
                        $version = "_en";
                    }
                    ?>
        
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 d-flex align-items-center">
                    <div class="row">
                        <a href="<?php echo get_home_url(); ?>" class="logo-footer col-6">
                            <?php if( get_field('logo_footer', 'option') ): ?>
                                <img src="<?php the_field('logo_footer', 'option'); ?>" class="img-fluid" width="200" alt="Logo">
                            <?php endif; ?>
                        </a>
                        <?php if( get_field('logo_footer2', 'option') ): ?>
                            <div class="logos col-6 row d-flex justify-content-center">
                                <a href="<?php the_field('lien_certification' . $version, 'option'); ?>"><img src="<?php the_field('logo_footer2', 'option'); ?>" class="img-fluid" alt="Logo"></a>
                                <a href="<?php the_field('lien_certification' . $version, 'option'); ?>">ISO 9001</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- <div class="col-sm-2 menus">
                    <div class="titres">Informations</div>
                    <?php // wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'menu-footer', 'menu_id' => 'menu-footer' ) ); ?>
                </div> -->
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 noustrouver">
                    <div class="titres"><?php the_field('nous_trouver' . $version, 'option'); ?></div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p><strong>Antananarivo</strong></p>
                            <ul class="infos">
                                <?php if( get_field('antananarivo_adresse', 'option') ): ?>
                                    <li><i class="fas fa-map-marker-alt"></i><?php the_field('antananarivo_adresse', 'option'); ?></li>
                                <?php endif; ?>
                                <?php if( get_field('email_antananarivo', 'option') ): ?>
                                    <li><a href="mailto:<?php the_field('email_antananarivo', 'option'); ?>"><i class="fas fa-envelope"></i><?php the_field('email_antananarivo', 'option'); ?></a></li>
                                <?php endif; ?>
                                <?php if( get_field('tel_antananarivo', 'option') ): ?>
                                    <li><i class="fas fa-phone-alt"></i><?php the_field('tel_antananarivo', 'option'); ?></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <p><strong>Toamasina</strong></p>
                            <ul class="infos">
                                <?php if( get_field('toamasina_adresse', 'option') ): ?>
                                    <li><i class="fas fa-map-marker-alt"></i><?php the_field('toamasina_adresse', 'option'); ?></li>
                                <?php endif; ?>
                                <?php if( get_field('email_toamasina', 'option') ): ?>
                                    <li><a href="mailto:<?php the_field('email_toamasina', 'option'); ?>">
                                            <i class="fas fa-envelope"></i><?php the_field('email_toamasina', 'option'); ?></a></li>
                                <?php endif; ?>
                                <?php if( get_field('tel_toamasina', 'option') ): ?>
                                    <li><i class="fas fa-phone-alt"></i><?php the_field('tel_toamasina', 'option'); ?></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-1 col-lg-1 col-md-2 col-sm-2 partenaires d-flex justify-content-center align-items-center flex-column">
                    <?php if( get_field('icone_plaquette', 'option') ): ?>
                        <img src="<?php the_field('icone_plaquette', 'option'); ?> " class="img-fluid" alt="Logo">
                        <a class="" href="<?php the_field('url_plaquette_digital' . $version, 'option'); ?>" target="_blank" data-toggle="tooltip" data-placement="top" title="<?php the_field('plaquette' . $version, 'option'); ?>" style="text-align: center; color: red;">
                            <strong><?php if (get_field('version_page') === "fr"): echo "FR"; else: echo "EN"; endif; ?></strong>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </footer>
   
    <!-- Copyright -->
    <div id="copyright" style="background: url('<?php the_field('background', 'option'); ?>'); background-repeat: no-repeat; background-size: cover;  background-position: center;">
<!--        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <?php // if( get_field('copyright', 'option') ): ?>
                        <div>
                            <?php // the_field('copyright', 'option'); ?> 
                        ‎</div>
                    <?php // endif; ?>
                </div>
            </div>
        </div>-->
    </div>

<!--<script src="<?php bloginfo("template_url");  ?>/js/jquery-3.4.1.min.js"></script>-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<!--<script src="<?php bloginfo("template_url");  ?>/js/popper.min.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>


<!--<script src="<?php bloginfo("template_url");  ?>/js/bootstrap.min.js"></script>-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!--<script src="<?php bloginfo("template_url");  ?>/js/slick.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!--<script src="<?php bloginfo("template_url");  ?>/js/jquery.waypoints.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.0/jquery.waypoints.min.js" integrity="sha512-oy0NXKQt2trzxMo6JXDYvDcqNJRQPnL56ABDoPdC+vsIOJnU+OLuc3QP3TJAnsNKXUXVpit5xRYKTiij3ov9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="<?php bloginfo("template_url");  ?>/js/count.js"></script>


<!--<script src="<?php bloginfo("template_url");  ?>/js/aos.js"></script>-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php wp_footer(); ?>
<script src="<?php bloginfo("template_url");  ?>/js/script.js"></script> 

<script>
    
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
        
        var langue = $("#upline").attr('lang');
        var more = "en savoir plus";
        var cartButton = " ajouter au panier";
        if($("#cookie-notice").length > 0 && langue == "en") {
            $("#cn-notice-text").text("We use cookies to ensure you get the best experience on our website. If you continue to use this site we will assume that you are happy with it."); 
            $("#cn-more-info").text("Privacy Policy");
            $("#cn-more-info").attr('href', 'https://batpro-madagascar.com/privacy-policy/');
            more = "learn more";
            cartButton = " add to cart";
        }
        
        $(".text_more").text(more);
        $(".cartButton span").text(cartButton);
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            autoplay:true,
            navText: ["<i class='fa-solid fa-angle-left '></i>", "<i class='fa-solid fa-angle-right '></i>"],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });
    });
</script> 
</body>
</html>