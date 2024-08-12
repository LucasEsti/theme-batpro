<?php

/**
 * Template Name: Liste All products published
 */

get_header(); ?>
    
<div class="container mt-5 mb-5">e</div>
<div class="container mt-5 mb-5">e</div>
    <!-- Contenu Page -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                <!-- Nouveautes -->
                <section id="">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="">
                                <div class="products grid group">
                                    <table id="myTable" class="table table-bordered table-striped">

                                        <tbody>
                                            <tr>
                                                <th scope="row">Nom</th>
                                                <th scope="row">Marque</th>
                                                <th scope="row">Référence</th>
                                                <th>Déclinaison</td>
                                                <th scope="row">Catégorie</th>
                                                <th scope="row">Sous-catégorie</th>
                                                <th>files</th>
                                             </tr>
                                             
                                            
                                            <?php 
                                                $args = array(
                                                    'post_type' => 'produits',
                                                    'posts_per_page' => '50', 
                                                    'paged' => $paged,
                                                    
                                                  );
                                                $marque = "";
                                                if (empty($_GET)) {
                                                } elseif (isset($_GET['marque'])) {
                                                    if ($_GET['marque'] != '') {
                                                        $marque = strtolower($_GET['marque']);
                                                        $args['meta_query'] = array(
                                                            array( "key" => "marques", 
                                                                    'value'   => [$marque],
                                                                        'compare' => 'IN',
                                                                    )
                                                              );
                                                    } 
                                                    else {
                                                        $args['meta_query'] = array(
                                                            array( "key" => "marques", 
                                                                    'value'   => '',
                                                                    )
                                                              );
                                                    }
                                                }
                                                $paged = 1;
                                                if ( get_query_var('paged') ) $paged = get_query_var('paged');
                                                if ( get_query_var('page') ) $paged = get_query_var('page');
                                                $wp_query = new WP_Query();
                                                $ref = new WP_Query($args); 
                                                if( $ref->have_posts() ) : while( $ref->have_posts() ) : $ref->the_post();
                                                $declinaison = get_field('declinaison');
                                                $terms = get_the_terms( get_the_ID() , 'nos-produits');
                                                if( !empty($terms) || $terms != false && $terms[0]->parent != 0 ) {
                                                    $terms = array_reverse($terms, false);
                                                }
                                                ?>
                                             
                                            <tr>
                                                <td scope="row" ><a href="<?php the_permalink(); ?>" class="link"><?php the_title();?></a></td>
                                                <td><?php echo get_field('marques'); ?></td>
                                                <td><?php if(empty($declinaison) || $declinaison["value_repetiteur"] == false): the_field('references'); endif;?></td>
                                                <td>
                                                    <table border="1">
                                                        
                                                        <?php if(empty($declinaison) || $declinaison["value_repetiteur"] == false): ?>
                                                        <?php else: ?>
                                                        <tr class="t-embed">
                                                            <td scope="row">Type</td>
                                                            <td>Valeur</td>
                                                            <td>Référence</td>
                                                         </tr>
                                                            <?php 
                                                            $i = 0;
                                                            foreach( $declinaison['value_repetiteur'] as $value_repetiteur ):?>
                                                         <tr class="t-embed">
                                                                    <?php if($i==0): ?>
                                                                    <td rowspan="<?php if(empty($declinaison) || $declinaison["value_repetiteur"] == false): else: echo count($declinaison['value_repetiteur']); endif; ?>"><?php echo $declinaison['type_declinaison']; ?></td>
                                                                    <?php endif; ?>
                                                                    
                                                                    <td><?php echo $value_repetiteur['value'];?></td>
                                                                    <td><?php echo $value_repetiteur['reference']; ?></td>
                                                                </tr>
                                                            <?php $i++; endforeach;
                                                        endif;?>
                                                    </table>
                                                </td>
                                                
                                                <?php 
                                                    if( !empty($terms) || $terms != false && $terms[0]->parent != 0 ) {
                                                        foreach ( $terms as $term ) { ?>
                                                        <td><?php echo $term->name;?></td>
                                                        
                                                <?php 
                                                        } 
                                                        if (count($terms) == 1 ) { echo '<td></td>'; }
                                                   } else { ?>
                                                        <td></td> <td></td>
                                                   <?php }
                                                 ?>
                                               <td><?php 
                                                     if (get_field('fiche_produit') != false) {
                                                            $id_fiche = attachment_url_to_postid( get_field('fiche_produit'));
                                                            $attachment_meta = wp_prepare_attachment_for_js($id_fiche);
                                                            if (isset($attachment_meta['filesizeHumanReadable'])) {
                                                                echo $attachment_meta['filesizeHumanReadable'];
                                                            }
                                                            
                                                     }
                                               
                                               ?></td>
                                          </tr>
                                          
                                                <?php 
                                            endwhile; 
                                             wp_pagenavi( array( 'query' => $ref ) );
                                            wp_reset_postdata();  
                                           
                                            endif; 
                                             ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
