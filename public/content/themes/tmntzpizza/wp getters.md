
// -----------------------------------------
  <?php get_header(); ?>
    <?php wp_head(); ?>

  <?php get_footer(); ?>
    <?php wp_footer(); ?>

// -----------------------------------------
  // boucle wp :
  <?php if (have_posts()) :
    while (have_posts()) : ?>
      <?php the_post(); ?>
      <?= get_the_title(); ?>
      <?= the_content(); ?>
  <?php endwhile; endif; ?>

  <?php if (have_posts()) :
      while (have_posts()) : ?>
        <?php the_post(); ?>
        <?= get_the_title(); ?>
        <?php the_content(); ?>
  <?php endwhile; endif; ?>


  <?php // je récup toutes les catégories :
    $allCategories = get_the_category();
      foreach($allCategories as $category) : ?>
      <a href="<?= get_category_link($category); ?>" class="post__category post__category--color-<?= $category->slug; ?>"><?= $category->name; ?></a>
  <?php endforeach; ?>

// -----------------------------------------
  // url de la racine du projet :
  <?=get_theme_file_uri();?>
  // lien d'un article single :
  <?php the_permalink(); ?>
  <?php the_shortlink(); ?>

  // titre du "blog" h1 :
  <?php bloginfo('description'); ?>

// pour un post :
  <?= get_the_title(); ?>
  <?php the_title(); ?>
  <?= get_the_excerpt(); ?>
  <?php the_excerpt(); ?>
  <?php the_ID(); ?>
  <?php the_meta(); ?>
  <?php the_author(); ?>
  <?php the_tags(); ?>
  <?php the_time(); ?>
  <?php echo get_the_date('Y-m-d'); ?>
  <?php echo get_the_date(); ?>
  <?php the_content(); ?>
  <?php single_cat_title(); ?>
  <?php the_category(); ?>
  <?php get_the_category(); ?>
  <?= get_category_link($variableDeLaBoucle); ?>

  featured image cpt :
  <?= get_the_post_thumbnail_url(); ?>


customizers :
<?= get_theme_mod('nom_fonction_customizer'); ?>