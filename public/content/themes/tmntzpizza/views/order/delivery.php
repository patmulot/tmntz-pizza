<?php
get_header();
// $foodThumbnailsTab = $args["foodThumbnailsTab"];
?>
<?php get_template_part('partials/delivery-header'); ?>
<section class="delivery-menu-container"></section>
<main>
    <section class="pizza-home">
        <h3 class="delivery-title">QUAND SOUHAITEZ-VOUS COMMANDER ?</h3>
        <div class="orderTimeButton">
            <input class="ordertime-radio"t type="radio" checked wfd-invisible="true" name="ordertime-input">
            <label class="ordertimenow orderTimeButton-label pickup_style" for="now">Maintenant</label>
            <input class="ordertime-radio" type="radio" wfd-invisible="true" name="ordertime-input">
            <label class="ordertimelater orderTimeButton-label" for="later">Plus tard</label>
        </div>
        <article class="delivery-form-container">
            <form class="delivery-form">
                <div class="delivery-form__field">
                    <h3 for="city">VOTRE VILLE OU VOTRE CODE POSTAL</h3>
                    <input name="city" type="text">
                </div>
                <div class="delivery-form__field">
                    <h3 for="street-nbr">NUMÉRO DE RUE</h3>
                    <input name="street-nbr" type="text">
                </div>
                <div class="delivery-form__field">
                    <h3 for="street-name">RUE</h3>
                    <input name="street" type="text">
                </div>
                <p>Les instructions de livraison (étage, digicode, etc.) pourront être ajoutées lors de la validation de votre commande</p>
                <div class="remember">
                    <input type="checkbox">
                    <span>SE SOUVENIR DE MES INFORMATIONS</span>
                </div><?php // var_dump($_POST); ?>
                <div class="delivery-buttons-container">
                    <a href="<?= wp_get_referer(); ?>" class="delivery-buttons button-previous delivery_style">
                        <img src="<?= get_theme_file_uri(); ?>/assets/images/arrow_icon.png" alt="" class="smaller_arrow reverse">
                        PRECEDDENT
                    </a>
                    <a href="<?= home_url(); ?>/shop/card/type/6/" class="delivery-buttons button-next pickup_style">
                        SUIVANT
                        <img src="<?= get_theme_file_uri(); ?>/assets/images/arrow_icon.png" alt="" class="smaller_arrow">
                    </a>
                </div>
            </form>
        </article>
    </section>
</main>
<?php wp_footer(); ?>