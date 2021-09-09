<?php
get_header();
// var_dump(the_post());
// var_dump($args["postId"]);
// var_dump(get_post($args["postId"]));
$currentPost = get_post($args["postId"]);
$foodThumbnailsTab = $args["foodThumbnailsTab"];
// var_dump($foodThumbnailsTab);
$currentPageType = intval($args["router"]->match()["params"]["id"]);
?>

<section class="page-card-menu-header-shop fixed">
    <nav class="page-card-menu-shop">
        <ul>
            <li>
                <a href="<?= home_url();?>"><img src="<?= get_theme_file_uri();?>/assets/images/tmnt_logo.png" alt="" id="header__logo-shop"></a>
            </li>
            <?php
                foreach ($foodThumbnailsTab as $oneThumbnail) :
                if ($oneThumbnail["foodType"]->parent === 0) :
            ?>
            <?php
            ?>
            <li><a href="<?= home_url(); ?>/card/type/<?= $oneThumbnail["foodType"]->term_id; ?>"><?= $oneThumbnail["foodType"]->name; ?></a></li>
            <?php
                endif;
                endforeach;
            ?>
        </ul>
    </nav>
</section>
<section class="page-card-menu-header-shop"></section>
<!-- ------------------------------------------------------- -->
<main class="main_container">
    <section class="oneline-order-back" style="background-color: silver;">
        <a href="<?= home_url();?>/shop/card/type/6/" style="color: black;">< LA CARTE</a>
    </section>
    <div class="main-wrapper">
        <section class="pizza-home shop-food">
            <div class="pizza-home-container">
                <article class="pizza-home__single cart_add">
                    <div class="shop-food-thumbnail__container pizza-home-thumbnail__container">
                        <img src="<?= get_the_post_thumbnail_url($args["postId"]); ?>" alt="" class="img_style">
                        <h2 class="shop-food-thumbnail__title pizza-home-title"><span><?= get_the_title($args["postId"]); ?></span></h2>
                        <p><span class="shop-food-price_select"><?= get_the_terms($args["postId"], "food-price")[0]->name; ?></span> €</p>
                        <p><?= get_the_content($args["postId"]); ?></p>
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
            </div>
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
                                    <span class="food_cost"> 6.99€</span>
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
                        <span class="total_cost">1 €</span>
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
<?php
get_footer();
?>
