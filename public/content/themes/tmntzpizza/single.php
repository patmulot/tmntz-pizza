<?php
get_header();
// var_dump(get_post_field( 'post_name', get_post() ));
?>

<?php get_template_part('partials/delivery-header');; ?>
<section class="delivery-menu-container"></section>

<main class="main_container">
    <section class="section">
        <article class="article">
            <h2><?= get_the_title(); ?></h2>
            <p><?php the_content(); ?></p>
        <?php if (get_post_field('post_name', get_post()) === "sans-contact") {
        get_template_part('partials/sans-contact');
        }; ?>
        </article>
    </section>
    

</main>

<?php
get_footer();
?>
