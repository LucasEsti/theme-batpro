<?php

/**
 * Template Name: Liste All categorie
 */

get_header(); ?>
    
<div class="container mt-5 mb-5">e</div>
<div class="container mt-5 mb-5">e</div>
    <!-- Contenu Page -->
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-sm-12">
                <!-- Nouveautes -->
                <section id="">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="">
                                <div class="products grid group">
                                    <table class="table table-bordered table-striped">

                                        <tbody>
                                            <tr>
                                                <th scope="row">Catégorie</th>
                                                <td scope="row">Sous-catégorie</td>
                                             </tr>
                                             
                                             <?php $categories = get_categories(['taxonomy' => 'nos-produits', 'parent'  => 0]);
                                                    foreach($categories as $category) {
                                                        ?>
                                                    <tr>
                                                        <td><?php echo $category->name; ?></td>
                                                        <td>
                                                            <table border="1">
                                                                <?php $categories_child = get_categories(['taxonomy' => 'nos-produits', 'parent'  => $category->term_id]);
                                                                    foreach($categories_child as $category_child) { 
                                                                        ?>
                                                                <tr>
                                                                    <td><?php echo $category_child->name; ?></td>
                                                                </tr>
                                                            <?php 
                                                                }
                                                            ?>
                                                            </table>
                                                            
                                                        </td>
                                                    </tr>
                                                <?php 
                                                    }
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
