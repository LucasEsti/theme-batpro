<?php
/**
 * Template Name: Page confirmation commande
 */

global $BPCart;

if($BPCart->itemsTotal() < 1)
{
    wp_redirect(home_url());
    exit();
}

get_header();

?>

<section id="sectwrapper">
    <div id="banniere" class="container">
        <div class="banniereimg">
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
            <div class="col-sm-12 mt-5">
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
                                    <th>Produits</th>
                                    <th>Déclinaison</th>
                                    <th class="text-center" style="vertical-align: middle">Quantité</th>
                                </tr>
                            </thead>
                            <?php foreach ($BPCart->items() as $product) : ?>
                                <tr id="row-<?php echo $product->extra['id'] ?>">
                                    <td>
                                        <?php
                                            $images = get_field('galerie_produit', $product->extra['id']);
                                            if( $images ):
                                        ?>
                                            <a href="<?php echo get_permalink($product->extra['id']) ?>">
                                                <img src="<?php echo esc_url($images[0]['url']); ?>" class="img-fluid">
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                    <td style="vertical-align: middle">
                                        <p>
                                            <strong><?php echo $product->name ?></strong>
                                        </p>

                                        <span class="ref text-muted"><strong>Reférence</strong>: <?php  echo $product->extra['ref']; ?></span><br>
                                        <span class="brand text-muted"><strong>Marque</strong>: <?php echo get_field('marques', $product->extra['id']) ?></span>
                                    </td>
                                    
                                    <td style="vertical-align: middle">
                                        <span class="brand text-muted"><strong><?php echo $product->extra['type_declinaison']; ?></strong>: <?php echo $product->extra['declinaison']; ?> <?php echo $product->extra['metric']; ?></span>
                                    </td>
                                    
                                    <td class="text-center" style="vertical-align: middle">
                                        <?php echo $product->quantity ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </table>
                    <?php else: ?>
                        <div class="alert alert-warning mt-5">
                            Votre panier est vide
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $BPCart->clearCart() ?>
<?php get_footer(); ?>
