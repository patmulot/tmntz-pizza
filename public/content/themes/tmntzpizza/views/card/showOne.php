<?php
get_header();
// var_dump(the_post());
// var_dump($args["postId"]);
// var_dump(get_post($args["postId"]));
$currentPost = get_post($args["postId"]);
?>

<?php get_template_part('partials/oneline-order-header'); ?>
<section class="oneline-order-menu-container"></section>
<main class="main_container">
    <section class="oneline-order-back">
        <a href="<?= wp_get_referer(); ?>" class="">< LA CARTE</a>
    </section>
    <section class="pizza-home">
            <div class="pizza-home-container">
                <article class="pizza-home__single cart_add">
                    <img src="<?= get_the_post_thumbnail_url($args["postId"]); ?>" alt="" class="img_style">
                    <div class="pizza-home-thumbnail__container">
                        <a href="<?= get_permalink(); ?>" class="pizza-home-thumbnail__img">
                        </a>
                        <h2 class="pizza-home-title"><span class="pre-title">LES <?= get_the_title($args["postId"]); ?></span></h2>
                        <p><?= get_the_content($args["postId"]); ?></p>
                        <a class="pizza-home-thumbnail__link" href="<?= home_url(); ?>/order/home/">
                            COMMANDER 
                            <img src="<?= get_theme_file_uri(); ?>/assets/images/arrow_icon.png" alt="" class="smaller_arrow">
                        </a>
                    </div>
            </article>
        </div>
    </section>
</main>



<?php
get_footer();
?>
