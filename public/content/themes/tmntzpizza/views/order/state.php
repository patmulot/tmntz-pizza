<?php
get_header();
// $foodThumbnailsTab = $args["foodThumbnailsTab"];
?>
<?php get_template_part('partials/main-header'); ?>
 <header></header>
<main class="main_container order_state_section">
    <section class="under-header__nav order_home">
        <h2 class="order_home_subtitle">Où en est ma commande ?</h2>
        <div class="order_state-container">
            <div class="order_state order_state-1">
                <div class="order_state-content">
                    <div class="step_number">
                        1
                    </div>
                    <div class="step_name">
                        <h3>COMMANDE ENREGISTREE</h3>
                    </div>
                </div>
                <div class="order_state-triangle">
                    <img src="<?= get_theme_file_uri(); ?>/assets/images/arrow_icon.png" alt="">
                </div>
            </div>

            <div class="order_state order_state-2">
                <div class="order_state-content">
                    <div class="step_number">
                        2
                    </div>
                    <div class="step_name">
                        <h3>PREPARATION</h3>
                    </div>
                </div>
                <div class="order_state-triangle">
                    <img src="<?= get_theme_file_uri(); ?>/assets/images/arrow_icon.png" alt="">
                </div>
            </div>

            <div class="order_state order_state-3">
                <div class="order_state-content">
                    <div class="step_number">
                        3
                    </div>
                    <div class="step_name">
                        <h3>CUISSON</h3>
                    </div>
                </div>
                <div class="order_state-triangle">
                    <img src="<?= get_theme_file_uri(); ?>/assets/images/arrow_icon.png" alt="">
                </div>
            </div>

            <div class="order_state order_state-4">
                <div class="order_state-content">
                    <div class="step_number">
                        4
                    </div>
                    <div class="step_name">
                        <h3>PRETE</h3>
                    </div>
                </div>
                <div class="order_state-triangle">
                    <img src="<?= get_theme_file_uri(); ?>/assets/images/arrow_icon.png" alt="">
                </div>
            </div>
        </div>
    </section>
</main>
    <?php get_footer();?>