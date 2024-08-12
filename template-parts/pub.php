<!--Publicité -->
<?php $version = $args['version']; ?>
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
                                        <!-- <span class="promo">-35%</span> -->
                                        <div>
                                            <strong><?php the_sub_field('titre'); ?></strong>
                                        </div>
                                    </div>

                                    <!-- en ---------------------------------------------- -->
                                    <a href="<?php the_sub_field('lien'); ?>" class="btn-custom2"><?php the_sub_field('bouton' . $version); ?></a>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</section>