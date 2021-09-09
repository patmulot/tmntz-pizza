<?php
get_header();
$foodThumbnailsTab = $args["foodThumbnailsTab"];
?>
<!-- ---------------- TOP SECTION ---------------- -->

<?php get_template_part('partials/main-header'); ?>
<header></header>
<main class="main_container">
<section class="page-card-menu-header fixed">
    <nav class="page-card-menu">
        <ul>
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
<section class="page-card-menu-header"></section>
<section class="find-shop-section__header">
    <form class="find-shop" action="<?= home_url(); ?>/shop/card/type/6">
        <label for="customer-suburb">Choisissez votre TMNTzPizza pour accéder aux tarifs</label>
        <input name="Customer.Suburb" class="adress-input" type="text" placeholder="Saisir votre code postal ou ville">
    </form>
</section>
<!-- ---------------- FIRST ARTICLES SECTION ---------------- -->
    <section class="pizza-home">

    <?php
        foreach ($foodThumbnailsTab as $oneThumbnail) :
        if ($oneThumbnail["foodType"]->parent !== 0) :
            // var_dump($oneThumbnail); die();
    ?>
        <h2 class="pizza-home-title"><span class="pre-title">LES </span><?= $oneThumbnail["foodType"]->name; ?></h2>
        <div class="pizza-list-container">
            <?php
            foreach ($oneThumbnail["foodPosts"]->posts as $oneFoodPost) :
            ?>
            <article class="pizza-list-thumbnail" id="<?= $oneThumbnail["foodType"]->slug; ?>">
                <div class="pizza-home-thumbnail__container">
                    <a href="<?= home_url();?>/card/<?= $oneFoodPost->ID; ?>" class="pizza-home-thumbnail__img">
                        <img src="<?= get_the_post_thumbnail_url($oneFoodPost->ID); ?>" alt="">
                    </a>
                    <h3 class="pizza-home-thumbnail__title"><?= get_the_title($oneFoodPost->ID); ?></h3>
                    <p><?= get_the_excerpt($oneFoodPost->ID); ?></p>
                    <a class="pizza-home-thumbnail__link" href="<?= home_url();?>/card/<?= $oneFoodPost->ID; ?>">
                        COMMANDER 
                        <img src="<?= get_theme_file_uri(); ?>/assets/images/arrow_icon.png" alt="" class="smaller_arrow">
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
        <?php
            endif;
            endforeach;
        ?>
    </section>
</main>

<?php get_footer();?>