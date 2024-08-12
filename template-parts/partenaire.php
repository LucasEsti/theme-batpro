<!-- Partenaires -->
<?php 
    $version = "";
    if (get_field('version_page') == "en") {
        $version = "_en";
    }
    ?>
<section id="partenaire">
    <div class="row">
        <div class="col-sm-12 text-center">
            <!-- en  ---------------------------------------------- -->
            <?php if( get_field('titre_nos_partenaire', 'option') ): ?>
                <p><?php the_field('titre_nos_partenaire' . $version, 'option'); ?></p>
            <?php endif; ?>

            <ul class="liste-partenaires">
                <?php if( have_rows('liste_partenaires', 'option') ): ?>
                    <?php while( have_rows('liste_partenaires', 'option') ): the_row(); ?>
                        <li>
                            <a href="<?php the_sub_field('lien'); ?>" target="_blank">
                                <img src="<?php the_sub_field('logo'); ?>" class="img-fluid" alt="schneider">
                            </a>
                        </li>
                    <?php endwhile; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</section>