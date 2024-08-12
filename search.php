<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header();
?>

<?php 
    $version = "";
    if (get_field('version_page') == "en") {
        $version = "_en";
    }
    ?>

<!-- Banniere -->
<section id="banniere" class="container">
	<img src="<?php echo site_url(); ?>/wp-content/uploads/2020/12/Recherche-01.jpg" class="img-fluid">
<!--	<div class="content">
		<div class="titres">
			<?php // _e( 'Resultat de recherche pour :  ', 'twentynineteen' ); ?>&nbsp;<span class="page-description"><?php  echo get_search_query(); ?></span>
		</div>
	</div>-->
</section>

<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="container">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?php the_field('lien_home' . $version, 'option'); ?>"><?php the_field('libelle_home' . $version, 'option'); ?></a></li>
		<li class="breadcrumb-item active" aria-current="page">
			<?php _e( 'Resultat de recherche pour :  ', 'twentynineteen' ); ?> <span class="page-description"> <?php echo get_search_query(); ?></span>
		</li>
	</ol>
</nav>
<?php if (have_posts()) : ?>
<section id="nouveaux" class="container" style="margin-top: 3rem;">
	<div class="row">
		<div class="col-sm-12">
			
		</div>
		<div class="col-sm-12">
			<div class="wrapper">
				<div class="header">
					<i class="[ icon  icon--grid ]  [ fa  fa-th ]  [ icon ]  active"></i>
					<i class="[ icon  icon--list ]  [ fa  fa-list ]  [ icon ]"></i>
				</div>
				<div class="products grid group">
					<?php while (have_posts()) : the_post(); ?>
						<div class="product">
							<div class="content-product-imagin"></div>
							<div class="content-product-list"></div>
							<div class="product__inner">
                                                            <?php
                                                                    $declinaison = get_field('declinaison');
                                                                    $linkdecl = "";
                                                                    $decl_default = "";
                                                                    $iter = 0;
                                                                    if(!empty($declinaison)): 
                                                                        foreach( $declinaison['value_repetiteur'] as $valueRepetiteur ):
                                                                            if($valueRepetiteur["reference"] == $_GET["s"]): 
                                                                                $linkdecl = "?decl=" . $_GET["s"];
                                                                                $decl_default = $_GET["s"];
                                                                                if ($iter == "" || $iter == null) {
                                                                                    $iter = 0;
                                                                                } else {
                                                                                    $iter = $valueRepetiteur["numero"];
                                                                                }
                                                                                
                                                                            endif;
                                                                        endforeach;
                                                                ?>
                                                                <?php endif;?>
								<a href="<?php the_permalink(); ?>" class="link">
									<div class="product__image <?php echo $iter; ?> e">
										<?php
										$images = get_field('galerie_produit');                 
										$image  = $images[$iter];
										if( $image ) : ?>
											<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-fluid "/>
										<?php endif; ?>
									</div>
								</a>
								<div class="product__details">
									<div class="product__name"><span class="product__name_span"><?php the_title(); ?></span></div>
									<div class="ref"><?php if( get_field('marques') ): ?><strong>Marque:</strong> <?php the_field('marques'); ?> - <?php endif; ?>  
                                                                            
                                                                            <?php if( $decl_default != NULL ): ?>
                                                                                    <strong> ref:</strong> 
                                                                                    <span class="reference-declinaison"> <?php echo $decl_default; ?></span>

                                                                                <?php elseif( get_field('references') ): ?>
                                                                                    <strong> ref:</strong> 
                                                                                    <span class="reference-declinaison"> <?php the_field('references'); ?></span>
                                                                                <?php endif; ?>
                                                                        </div>
									<div class="content-product">
										<div class="product__short-description">
											<?php //the_field("extrait_description"); ?>
											<?php echo wp_trim_words( get_field("extrait_description"), 23, '...' ); ?>
										</div>
<!--                                                                                search by decl reference-->
                                                                                

										<a href="<?php the_permalink(); ?><?php echo $linkdecl; ?>" class="btns">En savoir plus</a>
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
					<?php endwhile; ?>
				</div>
			</div>
		</div>
		<div class="col-sm-12 text-center">
			<?php wp_pagenavi();?>
		</div>
	</div>
</section>
	<?php
		else : ?>
		<section id="nouveaux" class="container" style="margin: 7% auto;">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h3>0 resultat pour : <?php echo get_search_query(); ?></h3>
				</div>
			</div>
		</section>
	<?php
		endif;
	?>
<?php
get_footer();
