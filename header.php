<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package sparkling
 */
?>

<?php
// Déterminez le schéma (http/https) et le nom d'hôte
$scheme = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];

// Déterminez le chemin de base de votre application
$scriptName = dirname($_SERVER['SCRIPT_NAME']);

// Définir l'URL de base
$source = get_bloginfo("template_url");
 
$uploadsUrl = $source . "/realtime-batpro/uploads/";
?>
<!doctype html>
<!--[if !IE]>
<html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>
<html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>
<html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>
<html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php wp_title(''); ?></title>
    <?php if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) header('X-UA-Compatible: IE=edge,chrome=1'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="stylesheet" href="https://use.typekit.net/mym6gdz.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <?php wp_head(); ?>
    <link rel="shortcut icon" href="<?php bloginfo("template_url");  ?>/images/logo.png" type="image/x-icon">
    <link href="https://fonts.cdnfonts.com/css/gotham" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="image" property="og:image" content="<?php the_field('logo_header', 'option'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha512-L7MWcK7FNPcwNqnLdZq86lTHYLdQqZaz5YcAgE+5cnGmlw8JT03QB2+oxL100UeB6RlzZLUxCGSS4/++mNZdxw==" crossorigin="anonymous" referrerpolicy="no-referrer" />-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .square:before{
            content: "";
            display: block;
            padding-top: 100%; 	/* initial ratio of 1:1*/
        }
        
        input[type="file"] {
            display: none;
          }

          .custom-file-upload {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
          }
        
    </style>
    
    
    <link rel="stylesheet" href="<?php bloginfo("template_url");  ?>/realtime-batpro/style/chatbox.css">
</head>

<body <?php body_class(); ?>>
    <?php 
        $version = "";
        $versionPanier = 33416;
        $menu = 'primary';
        if (get_field('version_page') == "en") {
            $version = "_en";
            $versionPanier = 46184;
            $menu = 'menu-principal-en';
        }
        ?>
          <!--Upline-->
    <div id="upline" lang="<?php echo get_field('version_page'); ?>">
        <div class="container">
            <ul>
                <li>
                    <div class="horaires">
                        <ul>
                            <li>
                                <i class="fas fa-clock"></i>
                            </li>
                            
                            <!-- en ---------------------------------------------- -->
                            <?php if( get_field('horaire_header', 'option') ): ?>
                                <li><?php the_field('horaire_header' . $version, 'option'); ?></li>
                            <?php endif; ?>
                            <?php if( get_field('horaire2_header', 'option') ): ?>
                                <li><?php the_field('horaire2_header' . $version, 'option'); ?></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </li>
                <li>
                <div class="dropdown">
                    <a href="#" class="dropdown" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-map-marker-alt"></i>Antananarivo
                    </a>
                    <div id="tip-first" class="tip-content dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="box">
                            <ul class="infos">
                                <?php if( have_rows('antananarivo_header', 'option') ): ?>
                                    <?php while( have_rows('antananarivo_header', 'option') ): the_row(); ?>
                                        <li><i class="fas <?php the_sub_field('icon'); ?>"></i><?php the_sub_field('texte'); ?></li>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </ul>
                            <iframe style="border: 0;" tabindex="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7547.860554910893!2d47.52410809117495!3d-18.9344800274862!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x21f07e7b8b511371%3A0x2ba79672eb399f11!2sBatpro!5e0!3m2!1sfr!2smg!4v1603421799544!5m2!1sfr!2smg" width="100%" height="200" frameborder="0" allowfullscreen="allowfullscreen" aria-hidden="false"></iframe>
                        </div>
                    </div>
                </div>
                </li>
                <li>
                <div class="dropdown toamasina">
                    <a href="#" id="dropdownMenuButton2" class="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-map-marker-alt"></i>Toamasina</a>
                    <div id="tip-first" class="tip-content dropdown-menu" aria-labelledby="dropdownMenuButton2">
                        <div class="box">
                                <ul class="infos">
                                    <?php if( have_rows('toamasina_header', 'option') ): ?>
                                        <?php while( have_rows('toamasina_header', 'option') ): the_row(); ?>
                                            <li><i class="fas <?php the_sub_field('icone'); ?>"></i><?php the_sub_field('texte'); ?></li>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </ul>
                            <iframe style="border: 0;" tabindex="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2898.1661297026794!2d49.41089646286673!3d-18.15647866697904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x21f501b64665865f%3A0x6a8892ff7ceb5d29!2s23%20Boulevard%20Augagneur%2C%20Toamasina!5e0!3m2!1sfr!2smg!4v1603421928834!5m2!1sfr!2smg" width="100%" height="200" frameborder="0" allowfullscreen="allowfullscreen" aria-hidden="false"></iframe>
                        </div>
                    </div>
                </div>
                </li>
                <?php if( get_field('email_header', 'option') ): ?>
                    <li class="email"><a href="mailto:<?php the_field('email_header', 'option'); ?>">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if( get_field('linkedin_header', 'option') ): ?>
                    <li class="linked linkeds"><a href="<?php the_field('linkedin_header', 'option'); ?>" target="_blank">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                        
                    </li>
                <?php endif; ?>
                <?php if( get_field('facebook_header', 'option') ): ?>
                    <li class="linked"><a href="<?php the_field('facebook_header', 'option'); ?>" target="_blank">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a></li>
                <?php endif; ?>

                <li class="users"><a href="<?php the_field('lien_contact' . $version, 'option'); ?>"><i class="fas fa-user-alt"></i><?php the_field('contactez_nous' . $version, 'option'); ?></a></li>
                
                <li class="d-inline">
                    <ul>
                        <li>
                            <a class="font-weight-bold">
                                <?php if (get_field('version_page') === "fr"): echo "FR"; else: echo "EN"; endif; ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo get_field('page_contraire'); ?>">
                                <?php if (get_field('version_page') === "fr"): echo "EN"; else: echo "FR"; endif; ?>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <!--Header-->
    <header>
        <div class="container head">
            <div class="logo d-flex align-items-center">
                <a href="<?php echo get_home_url(); ?>">
                    <?php if( get_field('logo_header', 'option') ): ?>
                        <img src="<?php the_field('logo_header', 'option'); ?>" class="img-fluid" alt="BatPro Madagascar">
                    <?php endif; ?>
                </a>
                <div class="d-inline d-lg-none">
                    <a class="font-weight-bold  mr-1">
                        <?php if (get_field('version_page') === "fr"): echo "FR"; else: echo "EN"; endif; ?>
                    </a>
                    <a href="<?php echo get_field('page_contraire'); ?>">
                        <?php if (get_field('version_page') === "fr"): echo "EN"; else: echo "FR"; endif; ?>
                    </a>
                </div>
                
            </div>
            

            <div class="search">
                <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
            </div>

            <div id="cartTop">
                <a href="<?php echo get_permalink($versionPanier) ?>" class="cartIcon">
                    <img src="<?php echo get_template_directory_uri() ?>/images/cart-icon.png" alt="Panier" width="50">
                </a>
                <span class="cartItemCount"><?php echo get_cart_total_count() ?></span>
            </div>
        </div>

        <!-- Navigation produit -->
        <nav id="navigation">
            
            <div id="btnnavs">
                <div class="titlenav"><?php the_field('nos_produits' . $version, 'option'); ?></div>
                <div class="btninter">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <ul class="listnav">
                <?php $categories = get_categories(['taxonomy' => 'nos-produits', 'parent'  => 0]);
                    foreach($categories as $category) {
                        $catAng = get_field( 'version_anglais', 'nos-produits_'.$category->term_id);
                        $catName = $category->name;
                        if (get_field('version_page') == "en" && $catAng != "") {
                            $catName = $catAng;
                        }
                        ?>
                        <li class="cat-item cat-item-12 cntsubitem parent-cat blockBox">
                            <a href="javascript:void(0)" class=""><?php echo $catName ?></a>
                            <ul class="children boxsubitem" style="display: none;">
                                <?php $categories_child = get_categories(['taxonomy' => 'nos-produits', 'parent'  => $category->term_id]);
                                        foreach($categories_child as $category_child) { 
                                            $sousAng = get_field( 'version_anglais', 'nos-produits_'.$category_child->term_id);
                                            $sousName = $category_child->name;
                                            
                                            if (get_field('version_page') == "en" && $sousAng != "") {
                                                $sousName = $sousAng;
                                            }
                                            
                                            ?>
                                            <li class="cat-item cntsubitem">
                                                <a href="<?php echo get_category_link($category_child->term_id); ?>"><?php echo $sousName; ?></a>
                                            </li>
                                <?php 
                                    }
                                ?>
                            </ul>
                        </li>
                <?php 
                    }
                    ?>
            </ul>
            
<!-- css = > segmentation no tedavina            
<div class="listnav list_container">
                <?php $categories = get_categories(['taxonomy' => 'nos-produits', 'parent'  => 0]);
                    //get top level
                    //    var_dump(get_field( 'version_anglais', 'nos-produits_'.$category->term_id));
                    //    get_category_link($category->term_id)
                    //    $category->name
                    //get child
                    foreach($categories as $category) {
//                            var_dump($category->name);
//                        if (get_field( 'check', 'nos-produits_'.$category->term_id) == true) {
                        ?>
                        <div class="item_direction">
                            <div class="btn-group dropright container mb-2">
                                <button type="button" class="col-3 btn btn-secondary dropdown-toggle blockBox <?php echo get_field( 'color', 'nos-produits_'.$category->term_id); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo get_field( 'titre', 'nos-produits_'.$category->term_id); ?>
                                </button>
                                <div class="dropdown-menu">
                                    <ul>
                                        <?php $categories_child = get_categories(['taxonomy' => 'nos-produits', 'parent'  => $category->term_id]);
                                                foreach($categories_child as $category_child) { ?>
                                                    <li><a class="dropdown-item <?php echo get_field( 'color', 'nos-produits_'.$category_child->term_id); ?>" href="<?php echo get_category_link($category_child->term_id); ?>"><?php echo get_field( 'titre', 'nos-produits_'.$category_child->term_id); ?></a></li>
                                        <?php 
                                            }
                                        ?>
                                    </ul>

                                </div>
                            </div>
                        </div>

                    <?php 
//                        }
                    }
                    ?>
            </div>-->

        </nav>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-xl">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <div id="nav-icon1">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="container">
                <div id="btnnav">
                    <div class="btninter">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="titlenav"><?php the_field('nos_produits' . $version, 'option'); ?></div>
                </div>
                <?php 
                
                wp_nav_menu( array(
                    'menu'              => $menu,
                    'theme_location'    => 'primary',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse',
                    'container_id'      => 'navbarSupportedContent',
                    'menu_class'        => 'navbar-nav',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'walker'            => new wp_bootstrap_navwalker())
                ); ?>
            </div>
        </nav>
    </header>


    