<!--Publicité -->
<?php $version = $args['version']; 
$boutonText = 'En savoir plus';

if ($version == "_en") {
    $boutonText = "More";
}

?>
<section id="pub">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="listing-pub">
                    <?php if( have_rows('publicite', 'option') ): $i = 0;?>
                        <?php while( have_rows('publicite', 'option') ): the_row(); 
                        $i++;
                        if ($args['full'] == false) {
                            if($i > 2) {
                                break;
                            }
                        }
                        
                        ?>
                            <li>
                                <img src="<?php the_sub_field('fond'); ?>" class="img-fluid" alt="image batpro">
                                <div class="caption">
                                    <div class="titre">
                                        <?php if (get_sub_field('prix')) :?>
                                         <span class="promo"><?php echo number_format(get_sub_field('prix'), 0, '', '.'); ?> Ar</span>
                                         <?php endif; ?>
                                         <?php if (get_sub_field('prix_barre')) :?>
                                         <span class="promo barre"><?php echo number_format(get_sub_field('prix_barre'), 0, '', '.'); ?> Ar</span> 
                                         <?php endif; ?>
                                        <div>
                                            <strong><?php the_sub_field('titre'); ?></strong>
                                        </div>
                                    </div>

                                    <!-- en ---------------------------------------------- -->
                                    <a href="<?php the_sub_field('lien'); ?>" class="btn-custom2"><?php echo $boutonText; ?></a>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</section>