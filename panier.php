<?php
/**
 * Template Name: Page panier
 */
get_header();
global $BPCart;

if(isset($_POST['firstname']) && isset($_POST['email'])){
    return bp_send_order();
}

?>

<section id="sectwrapper">
    <div id="banniere" class="container">
        <div class="banniereimg" >
            <img class="img-fluid mobile" src="<?php the_field("images_mobile"); ?>" alt="Banniere">
            <img class="img-fluid ipad" src="<?php the_field("images_ipad"); ?>" alt="Banniere">
            <img class="img-fluid desktop" src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', false )[0] ?>" alt="Banniere">
        </div>
<!--        <div class="content">
            <div class="titres"><?php // the_title(); ?></div>
        </div>-->
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
                <?php //var_dump($BPCart->items()) ?>
                <div id="cartDetails">
                    <?php if (get_cart_total_count() > 0) : ?>
                        <table class="table table-bordered table-striped table-hover mt-5">
                            <thead>
                                <tr>
                                    <th width="100"></th>
                                    <th><?php the_field("produits"); ?></th>
                                    <th><?php the_field("declinaison"); ?></th>
                                    <th class="text-center" style="vertical-align: middle"><?php the_field("quantite"); ?></th>
                                    <th class="text-center" style="vertical-align: middle"></th>
                                </tr>
                            </thead>
                            <?php foreach ($BPCart->items() as $product) : 
                                ?>
                            
                                <tr id="row-<?php echo $product->extra['id'] ?>">
                                    <td class="text-center" style="vertical-align: middle">
                                        <?php
                                            $images = get_field('galerie_produit', $product->extra['id']);
                                            if( $images ):
                                        ?>
                                            <a href="<?php echo get_permalink($product->extra['id']) ?>" target="_blank">
                                                <img src="<?php echo esc_url($images[0]['url']); ?>" class="img-fluid">
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                    <td style="vertical-align: middle">
                                        <p>
                                            <strong><?php echo $product->name ?></strong>
                                        </p>

                                        <span class="ref text-muted"><strong><?php the_field("reference"); ?></strong>: <?php  echo $product->extra['ref']; ?></span><br>
                                        <span class="brand text-muted"><strong><?php the_field("marque"); ?></strong>: <?php echo get_field('marques', $product->extra['id']) ?></span>
                                    </td>
                                    
                                    <td style="vertical-align: middle">
                                        <span class="brand text-muted"><strong><?php echo $product->extra['type_declinaison']; ?></strong>: <?php echo $product->extra['declinaison']; ?> <?php echo $product->extra['metric']; ?></span>
                                    </td>
                                    
                                    <td class="text-center" style="vertical-align: middle">
                                        <div class="cartQte">
                                            <button class="minus" data-action="bpcart_downqte" data-product="<?php echo $product->id ?>">-</button>
                                            <input type="text" class="qte qte-<?php echo $product->id ?>" value="<?php echo $product->quantity ?>">
                                            <button class="plus" data-action="bpcart_upqte" data-product="<?php echo $product->id ?>">+</button>
                                        </div>
                                    </td>
                                    <td class="text-center" style="vertical-align: middle">
                                        <button class="remove" data-action="bpcart_removefromcart" data-product="<?php echo $product->id ?>">X</button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </table>
                        <div id="orderStep">
                            <div class="d-flex align-items-end justify-content-end mb-5">
                                <a href="#" id="orderButton" class="btn btn-primary btn-lg rounded-0"><i class="fas fa-cart-arrow-down"></i><?php the_field("devis"); ?></a>
                            </div>
                            <div id="orderForm" class="mb-5">
                                <form action="" id="formOrder" method="POST">
                                    <div class="card p-4">
                                        <?php 
                                            $version_gf = "1";
                                            if (get_field('version_page') == "en") {
                                                $version_gf = "2";
                                            }
                                            ?>
                                        
                                        <?php echo do_shortcode('[gravityform id="' . $version_gf . '" title="false" description="false" ajax="false"]')?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-warning mt-5">
                            <?php the_field("vide"); ?>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
