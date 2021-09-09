<?php
get_header();
$user = $args["user"];
$foodThumbnailsTab = $args["foodThumbnailsTab"];
?>
<!-- ------------ TOP SECTION ----------------------- -->
<main class="main_container">
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
            <li><a href="<?= home_url(); ?>/shop/card/type/<?= $oneThumbnail["foodType"]->term_id; ?>"><?= $oneThumbnail["foodType"]->name; ?></a></li>
            <?php
                endif;
                endforeach;
            ?>
        </ul>
    </nav>
</section>
<section class="page-card-menu-header-shop"></section>
<!-- ------------ MAIN CONTENT SECTION ----------------------- -->
    <div class="main-wrapper order_details">
        <section class="order_details-section">
            <div class="order_details-section_container">
                <article class="shop_details-container">
                    <h3>DETAILS :</h3>
                    <p>Magasin : <span class="shop_details-name">Nancy Centre</span></p>
                    <p>Retrait : <span class="shop_details-pickup_status">Dès que possible</span></p>
                    <p>Total : <span class="shop_details-total">100.00</span> €</p>
                </article>
                <article class="user_details-container">
                    <div class="user_detail-content">
                        <h3>NOM</h3>
                        <input type="text" value="<?= $user->display_name; ?>">
                    </div>
                    <div class="user_detail-content">
                        <h3>PRENOM</h3>
                        <input type="text" value="<?= $user->user_nicename; ?>">
                    </div>
                    <div class="user_detail-content">
                        <h3>EMAIL</h3>
                        <input type="text" value="<?= $user->user_email; ?>">
                    </div>
                    <div class="next-step">
                        <a href="<?= home_url();?>/order/state/" class="shop-food-thumbnail__link user_detail-content">SUIVANT</a>
                    </div>
                    <button class="shop-food-thumbnail__link add-food_button" href="<?= home_url();?>/card/<?= $oneFoodPost->ID; ?>" style="visibility: hidden"></button>
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
<?php wp_footer(); ?>