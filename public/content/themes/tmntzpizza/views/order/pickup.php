<?php
get_header();
$allShops = $args["cityShop"]->posts;
// var_dump($args["message"]);
?>
<?php get_template_part('partials/delivery-header'); ?>
<section class="delivery-menu-container"></section>
<main>
    <section class="pizza-home">
        <h3 class="delivery-title">QUAND SOUHAITEZ-VOUS COMMANDER ?</h3>
        <div class="orderTimeButton">
            <input class="ordertime-radio"t type="radio" checked wfd-invisible="true" name="ordertime-input">
            <label class="ordertimenow orderTimeButton-label" for="now">Maintenant</label>
            <input class="ordertime-radio" type="radio" wfd-invisible="true" name="ordertime-input">
            <label class="ordertimelater orderTimeButton-label" for="later">Plus tard</label>
        </div>
        <article class="delivery-form-container">
            <form class="delivery-form" name="findCity">
                <div class="delivery-form__field">
                    <h3 for="city">VOTRE VILLE OU VOTRE CODE POSTAL</h3>
                    <input id="address-input" name="address-input" type="text" placeholder="NANCY" autocomplete="on" value="NANCY">
                </div>
                <div class="delivery-form__field">
                    <h3 for="street-nbr">SELECTIONNER VOTRE TMNTz</h3>
                    <?php foreach($allShops as $shop) : ?>
                    <div class="shop_buttons">
                        <a href="<?= home_url();?>/shop/card/type/6/">
                            <h4><?= $shop->post_title; ?></h4>
                            <span><?= $shop->post_content; ?></span>
                        </a>
                    </div>
                    <?php endforeach;
                    if ($args["message"] !== null) :  ?>
                        <p class="city-form_message"><?= $args["message"]; ?></p>
                    <?php endif; ?>
                </div>
                <div class="delivery-buttons-container">
                    <a href="<?= wp_get_referer(); ?>" class="delivery-buttons button-previous delivery_style">
                        <img src="<?= get_theme_file_uri(); ?>/assets/images/arrow_icon.png" alt="" class="smaller_arrow reverse">
                        PRECEDDENT
                    </a>
                </div>
            </form>
        </article>
    </section>
</main>
<?php wp_footer(); ?>