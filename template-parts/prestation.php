<!--Prestation-->
<?php 
    $version = "";
    if (get_field('version_page') == "en") {
        $version = "_en";
    }
    ?>
<section id="prestation" class="mb-3">
    <div class="container">
        <div class="row">
            <div class="row col-sm-12 listing-prestation-vao">
                <?php if( have_rows('lien_condition' . $version, 'option')):
                        while( have_rows('lien_condition' . $version, 'option')): the_row(); ?>
                <div class="item d-flex justify-content-center col-4 listing-prestation-vao-element" style="background: #273583;">
                    <a href="<?php echo get_sub_field('lien'); ?>" >
                        <i class="fas fa-truck col-12 d-flex justify-content-center"></i>
                        <div class="titre col-12 d-flex justify-content-center" ><?php echo get_sub_field('titre'); ?></div>
                    </a>
                </div>
                <?php endwhile;
                        endif; ?>
                
                <?php if( have_rows('lien_sav'  . $version, 'option')):
                        while( have_rows('lien_sav'  . $version, 'option')): the_row(); ?>
                <div class="item d-flex justify-content-center col-4 listing-prestation-vao-element" style="background: #b14191;">
                    <a href="<?php echo get_sub_field('lien'); ?>" >
                        <i class="fas fa-info-circle col-12 d-flex justify-content-center"></i>
                        <div class="titre col-12 d-flex justify-content-center"><?php echo get_sub_field('titre'); ?></div>
                    </a>
                </div>
                <?php endwhile;
                        endif; ?>
                
                <?php if( have_rows('lien_devis'  . $version, 'option')):
                        while( have_rows('lien_devis'  . $version, 'option')): the_row(); ?>
                <div class="item d-flex justify-content-center col-4 listing-prestation-vao-element" style="background: #26b6b4;">
                    <a href="<?php echo get_sub_field('lien'); ?>" >
                        <i class="fas fa-clipboard-list col-12 d-flex justify-content-center"></i>
                        <div class="titre col-12 d-flex justify-content-center"><?php echo get_sub_field('titre'); ?></div>
                    </a>
                </div>
                <?php endwhile;
                        endif; ?>
            </div>
        </div>
    </div>
</section>