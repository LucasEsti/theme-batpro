<!-- Newsletters -->
<?php 
    $version = "";
    if (get_field('version_page') == "en") {
        $version = "_en";
    }
    ?>
<section id="newsletter">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="news">
                    <?php if( get_field('fond_newsletter', 'option') ): ?>
                        <img src="<?php the_field('fond_newsletter', 'option'); ?>" class="img-fluid" alt="newsletter">
                    <?php endif; ?>
                    <div class="content">
                        <?php if( get_field('titre_newsletter' . $version, 'option') ): ?>
                            <div class="titre">

                                <!-- en  ---------------------------------------------- -->
                                <i class="fas fa-paper-plane"></i> <?php the_field('titre_newsletter' . $version, 'option'); ?>
                            </div>
                        <?php endif; ?>
                        <ul class="input">

                            <!-- en  ---------------------------------------------- -->
                            <?php if( get_field('description_newsletter' . $version, 'option') ): ?>
                                <li><?php the_field('description_newsletter' . $version, 'option'); ?></li>
                            <?php endif; ?>
                            <li>
                                <!-- Begin Mailchimp Signup Form -->
                                <form action="https://batpro-madagscar.us18.list-manage.com/subscribe/post?u=4b73f06c0dc5f5e68295c3f35&amp;id=bd990ba08d" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate newsletter__form" target="_blank" novalidate>

                                    <!-- en  ---------------------------------------------- -->
                                    <input type="email" value="" name="EMAIL" class="required email newsletter__form-input" id="mce-EMAIL" placeholder="<?php the_field('saisissez' . $version, 'option'); ?>">
                                    <div id="mce-responses" class="clear">
                                        <div class="response" id="mce-error-response" style="display:none"></div>
                                        <div class="response" id="mce-success-response" style="display:none"></div>
                                    </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_4b73f06c0dc5f5e68295c3f35_bd990ba08d" tabindex="-1" value=""></div>

                                    <!-- en  ---------------------------------------------- -->
                                    <button class="newsletter__form-submit" name="subscribe" id="mc-embedded-subscribe"><?php the_field('subscribe' . $version, 'option'); ?> <i class="fas fa-envelope"></i></button>
                                </form>
                                <!--End mc_embed_signup-->
                            </li>
                        </ul>
                        <!-- en lien ---------------------------------------------- -->
                        <?php if( get_field('footer_texte_newsletter' . $version, 'option') ): ?>
                            <?php the_field('footer_texte_newsletter' . $version, 'option'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>