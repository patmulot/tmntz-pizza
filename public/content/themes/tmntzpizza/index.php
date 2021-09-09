<?php
get_header();
$categories = get_terms('thumbnail-category', array(
    'hide_empty' => false,
));
// loop to display posts from taxonomies :
foreach($categories as $category) :
    $categoryName[] = $category->name;
// getting the CPT for each custom taxonomy
$args = array(
'post_type' => 'pizza-thumbnail',
'posts_per_page' => 3,
'tax_query' => array(
    array(
    'taxonomy' => 'thumbnail-category',
    'field' => 'term_id',
    'terms' => $category->term_id,
     )
  )
);
$homeThumbnailsTab[] = new WP_Query($args);
// var_dump($homeThumbnailsTab[0]);
?>
<?php endforeach; ?>
<?php get_template_part('partials/main-header'); ?>
 <header></header>
<main class="main_container">
<?php get_template_part('partials/header-nav-banner'); ?>
<!-- ---------------- TOP SECTION ---------------- -->
    <section class="main-section__header">
        <a href="">
            <img src="<?= get_theme_file_uri(); ?>/assets/images/tmnt_banner.png" alt="" class="img_style">
        </a>
    </section>
<!-- ---------------- FIRST ARTICLES SECTION ---------------- -->
    <section class="pizza-home">
        <h2><?= $categoryName[1]; ?></h2>
        <div class="pizza-home-container">
            <?php
                while ($homeThumbnailsTab[1]->have_posts()) :
                    $homeThumbnailsTab[1]->the_post();
            ?>
            <article class="pizza-home-thumbnail">
                <div class="pizza-home-thumbnail__container">
                    <a href="<?= get_post_permalink(); ?>" class="pizza-home-thumbnail__img">
                        <img class="thumbnail_img" src="<?= get_the_post_thumbnail_url(); ?>" alt="">
                    </a>
                    <h3 class="pizza-home-thumbnail__title"><?= the_title(); ?></h3>

                    <?php 
                    if (get_the_title() === "FIDELITE") : ?>
                        <a class="pizza-home-thumbnail__link" href="<?= home_url(); ?>/order/home/">VOIR PLUS
                            <img src="<?= get_theme_file_uri(); ?>/assets/images/arrow_icon.png" alt="" class="smaller_arrow">
                        </a>
                    <?php elseif (get_the_title() === "NOTRE CARTE") : ?>
                        <a class="pizza-home-thumbnail__link" href="<?= home_url(); ?>/card/">VOIR PLUS
                            <img src="<?= get_theme_file_uri(); ?>/assets/images/arrow_icon.png" alt="" class="smaller_arrow">
                        </a>
                    <?php else : ?>
                        <a class="pizza-home-thumbnail__link" href="<?= get_permalink(); ?>">VOIR PLUS
                            <img src="<?= get_theme_file_uri(); ?>/assets/images/arrow_icon.png" alt="" class="smaller_arrow">
                        </a>
                    <?php endif; ?>
                </div>
            </article>
            <?php endwhile; ?>
        </div>
    </section>
<!-- ---------------- SECOND ARTICLES SECTION ---------------- -->
    <section class="pizza-home">
        <h2><?= $categoryName[0]; ?></h2>
        <div class="pizza-home-container">
            <?php
                while ($homeThumbnailsTab[0]->have_posts()) :
                    $homeThumbnailsTab[0]->the_post();
            ?>
            <article class="pizza-home-thumbnail">
                <div class="pizza-home-thumbnail__container">
                    <a href="<?= get_permalink(); ?>" class="pizza-home-thumbnail__img">
                        <img src="<?= get_the_post_thumbnail_url(); ?>" alt="">
                    </a>
                    <h3 class="pizza-home-thumbnail__title"><?= the_title(); ?></h3>
                    <?php 
                    if (get_the_title() === "DIGITAL SUMMER") : ?>
                        <a class="pizza-home-thumbnail__link" href="<?= home_url(); ?>/card/type/6/#nouveautes-et-les-best-sellers">
                    <?php elseif (get_the_title() === "SAMOURAÏ ET BŒUF-POIVRE") : ?>
                        <a class="pizza-home-thumbnail__link" href="<?= home_url(); ?>/card/47/">
                    <?php elseif (get_the_title() === "SECOUEZ VOS PAPILLES") : ?>
                        <a class="pizza-home-thumbnail__link" href="<?= home_url(); ?>/card/45/">
                    <?php else : 
                    ?>;
                    <a class="pizza-home-thumbnail__link" href="<?= get_permalink(); ?>">
                    <?php endif; ?>
                    <span>
                        DECOUVRIR <img src="<?= get_theme_file_uri(); ?>/assets/images/arrow_icon.png" alt="" class="smaller_arrow">
                    </span>
                    </a>
                    <p><?= the_content(); ?></p>
                </div>
            </article>
            <?php endwhile; ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>