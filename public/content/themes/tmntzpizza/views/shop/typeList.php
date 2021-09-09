<?php
get_header();
$foodThumbnailsTab = $args["foodThumbnailsTab"];
$currentPageType = intval($args["router"]->match()["params"]["id"]);
// var_dump($currentPageType); die();
?>
<!-- ---------------- TOP SECTION ---------------- -->
<main class="main_container">
    <section class="page-card-menu-header fixed">
        <nav class="page-card-menu">
            <ul>
                <li>
                    <a href="<?= home_url();?>"><img src="<?= get_theme_file_uri();?>/assets/images/tmnt_logo.png" alt="" id="header__logo-shop"></a>
                </li>
                <?php
                    foreach ($args["allFoodTypes"] as $oneFoodType) :
                    if ($oneFoodType->parent === 0) :
                        if ($oneFoodType->term_id === $currentPageType) {
                            $classActif = ' link_actif';
                        } else {$classActif = "";}
                ?>
                <li><a class="header_link <?= $classActif; ?>" href="<?= home_url(); ?>/shop/card/type/<?= $oneFoodType->term_id; ?>"><?= $oneFoodType->name; ?></a></li>
                <?php
                    endif;
                    endforeach;
                ?>
                <li class="pay-link_header"><a class="header_link <?= $classActif; ?>" href="<?= home_url(); ?>/order/paiment/">PAIEMENT</a></li>
            </ul>
        </nav>
    </section>
    <section class="page-card-menu-header"></section>
    <section class="page-card-under-menu-header fixed">
        <nav class="page-card-under-menu">
            <ul>
                <?php
                    foreach ($foodThumbnailsTab as $oneThumbnail) :
                    if ($oneThumbnail["foodType"]->parent !== 0) :
                ?>
                <li><a class="header_link" href="#<?= $oneThumbnail["foodType"]->slug; ?>"><?= $oneThumbnail["foodType"]->name; ?></a></li>
                <?php
                    endif;
                    endforeach; 
                    ?>
            </ul>
        </nav>
    </section>
    <section class="page-card-under-menu-header"></section>
    <?php get_template_part('partials/shop-promo-banner'); ?>
    <!-- ------------------------------------------------------- -->
    <div class="main-wrapper">
        <section class="shop-food">
        <?php
            foreach ($foodThumbnailsTab as $oneThumbnail) :
            if ($oneThumbnail["foodType"]->parent !== 0) :
        ?>
            <h2 class="shop-food-title"><span class="pre-title">LES </span><?= $oneThumbnail["foodType"]->name; ?></h2>
            <div class="shop-food-list-container">
                <?php
                foreach ($oneThumbnail["foodPosts"]->posts as $oneFoodPost) :
                ?>
                <article class="shop-food-list-thumbnail cart_add" id="<?= $oneThumbnail["foodType"]->slug; ?>" data-food-id="<?= $oneFoodPost->ID; ?>">
                    <div class="shop-food-thumbnail__container">
                        <a href="<?= home_url();?>/shop/card/<?= $oneFoodPost->ID; ?>" class="shop-food-thumbnail__img">
                            <img src="<?= get_the_post_thumbnail_url($oneFoodPost->ID); ?>" alt="">
                        </a>
                        <h3 class="shop-food-thumbnail__title"><?= get_the_title($oneFoodPost->ID); ?></h3>
                        <p><span class="shop-food-price_select"><?= get_the_terms($oneFoodPost->ID, "food-price")[0]->name; ?></span><span> €</span></p>
                        <div class="shop-food-form">
                            <div class="shop-food-options_container">
                                <select name="size_select" class="shop-food-size_select shop-food_select">
                                    <option value="0">Medium</option>
                                    <option value="1">Large</option>
                                    <option value="2">XLarge</option>
                                </select>
                                <select name="pastry" class="shop-food-pastry_select shop-food_select">
                                    <option value="0">Classique</option>
                                    <option value="1">Mozza Crust +2.90€</option>
                                    <option value="2">Pan +1.50€</option>
                                    <option value="3">Pâte fine</option>
                                </select>
                                <select name="base" class="shop-food-base_select shop-food_select">
                                    <option value="0">Base Crême</option>
                                    <option value="1">Base Sauce Tomate</option>
                                    <option value="2">Base Sauce BBQ</option>
                                </select>
                            </div>
                            <div class="shop-food-add_container">
                                <input type="number" placeholder="1" value="1" class="shop-food-amount_select">
                                <button class="shop-food-thumbnail__link add-food_button" href="<?= home_url();?>/card/<?= $oneFoodPost->ID; ?>">AJOUTER</button>
                            </div>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
            <?php
                endif;
                endforeach;
            ?>
        </section>
<!-- ---------------------------- CART SECTION --------------------------- -->
        <section class="shopping-wrap">
            <div class="shopping-container">
                <div class="promotion-code-container">
                    <label for="promotion-code">AVEZ-VOUS UN CODE DE REDUCTION ?</label>
                    <div class="promotion-container">
                        <input type="text" class="promotion-code_input" placeholder="Code de réduction">
                        <button  class="shop-food-thumbnail__link promotion-code_Button" type="submit">VALIDER</button>
                    </div>
                </div>
                <div class="shopping-cart_container">
                    <h2>MA COMMANDE</h2>
                    <p class="empty_cart">Votre panier est vide</p>
                    <div class="template_container">
                    </div>
                    <template class="food-cart_template">
                    <div class="shopping-cart_content">
                        <div class="food-cart_container">
                            <div class="food-cart_detail">
                                <div class="food-cart_head">
                                    <span class="food_nb">1</span>
                                    x 
                                    <span class="food_title"> VEGAN MARGHERITA</span>
                                </div>
                                <div class="food-cart_cost">
                                    <span><span class="food_cost"> 6.99€</span> €</span>
                                </div>
                            </div>
                            <p>
                                Taille <span class="food_size">Medium </span>
                                Pâte <span class="food_pastry">Fine </span>
                                <span class="food_base">Crême</span>
                            </p>
                            <div class="food-cart_buttons">
                                <button class="remove-food shop-food-thumbnail__link food-cart_button">SUPPRIMER</button>
                                <!-- <button class="modify-food shop-food-thumbnail__link food-cart_button">MODIFIER</button> -->
                            </div>
                        </div>
                    </div>
                    </template>
                    <div class="cost">
                        <h2>TOTAL</h2>
                        <span><span class="total_cost">0</span> €</span>
                    </div>
                </div>
                <div class="next-step">
                    <a href="<?= home_url();?>/order/paiment/" class="shop-food-thumbnail__link shopping-cart_next">SUIVANT</a>
                </div>
                <div class="current-shop_info">
                    <h3>A VENIR CHERCHER :</h3>
                    <span>Nancy Centre</span><br>
                    <span>03 83 50 14 14</span><br>
                    <span>6 place des Vosges</span><br>
                    <span>NANCY, FR</span>
                </div>
            </div>
        </section>
    </div>
</main>

<?php get_footer();?>