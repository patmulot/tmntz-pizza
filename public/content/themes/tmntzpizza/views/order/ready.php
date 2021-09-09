<?php
get_header();
// $foodThumbnailsTab = $args["foodThumbnailsTab"];
?>
<?php get_template_part('partials/main-header'); ?>
 <header></header>
<main class="main_container">
    <section class="under-header__nav order_home ready_section">
        <article>
            <h2 class="order_home_subtitle">Votre commande est prête !</h2>
            <p>
                Vous pouvez venir la retirer dès maintenant, merci pour votre confiance.
            </p>
            <a href="<?= home_url(); ?>" class="pizza-home-thumbnail__link"> Retourner à l'accueil ?</a>
            <a href="<?= home_url(); ?>/card/type/6/" class="pizza-home-thumbnail__link">passer une nouvelle commande ?</a>
        </article>
    </section>
</main>
<?php get_footer();?>