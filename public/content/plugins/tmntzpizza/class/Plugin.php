<?php
namespace tmntzpizza;

class Plugin
{
    /**
     * @var Router
     */
    protected $router;
    public function __construct()
    {
        $registration = new Registration();
        $this->router = new Router();
        add_action(
            'init',
            [$this, 'createPizzaThumbnailCustomPostType']
        );
        add_action(
            'init',
            [$this, 'createThumbnailCategorylCustomTaxonoy']
        );
        add_action(
            'init',
            [$this, 'createFoodThumbnailCustomPostType']
        );
        add_action(
            'init',
            [$this, 'createThumbnailFoodTypeCustomTaxonoy']
        );

        // add_action('add_meta_boxes', 'add_events_metaboxes');
        add_action(
            'init',
            [$this, 'createFoodPriceCustomTaxonoy']
        );
        add_action(
            'init',
            [$this, 'createShopCustomPostType']
        );
        add_action(
            'init',
            [$this, 'createCityCustomTaxonomy']
        );
    }
    public function activate()
    {
        // $this->registerCustomerRole();
    }
    public function deactivate()
    {
    }

    public function createPizzaThumbnailCustomPostType()
    {
        register_post_type(
            'pizza-thumbnail', //!
            [
                'label' => 'Pizza Thumbnail', //!
                'public' => true,
                'hierarchical' => false,
                'menu_icon' => 'dashicons-hammer', //!
                'supports' => [
                    'title',
                    'thumbnail', //! add_theme_support( 'post-thumbnails' ); dans themes/includes/theme-config.php
                    'editor',
                    'excerpt',
                ],
            ]
        );
    }
    public function createThumbnailCategorylCustomTaxonoy()
    {
        register_taxonomy(
            'thumbnail-category',
            ['pizza-thumbnail'],
            [
                'label' => 'Thumbnail Category',
                'hierarchical' => true,
                'public' => true
            ]
        );
    }
    // food thumbnails : -----------------------------------------
    public function createFoodThumbnailCustomPostType()
    {
        register_post_type(
            'food-thumbnail', //!
            [
                'label' => 'Food Thumbnail', //!
                'public' => true,
                'hierarchical' => false,
                'menu_icon' => 'dashicons-smiley', //!
                'supports' => [
                    'title',
                    'thumbnail', //! add_theme_support( 'post-thumbnails' ); dans themes/includes/theme-config.php
                    'editor',
                    'excerpt',
                    'page-attributes',
                ],
            ]
        );
    }
    public function createFoodPriceCustomTaxonoy()
    {
        register_taxonomy(
            'food-price',
            ['food-thumbnail'],
            [
                'label' => 'Food Price',
                'hierarchical' => true,
                'public' => true
            ],
        );
    }
    public function createThumbnailFoodTypeCustomTaxonoy()
    {
        register_taxonomy(
            'food-thumbnail-category',
            ['food-thumbnail'],
            [
                'label' => 'Food Category',
                'hierarchical' => true,
                'public' => true
            ]
        );
    }
    public function createShopCustomPostType()
    {
        register_post_type(
            'shop', //!
            [
                'label' => 'Shop', //!
                'public' => true,
                'hierarchical' => false,
                'menu_icon' => 'dashicons-smiley', //!
                'supports' => [
                    'title',
                    'editor',
                    'excerpt',
                ],
            ]
        );
    }
    public function createCityCustomTaxonomy()
    {
        register_taxonomy(
            'city-shop',
            ['shop'],
            [
                'label' => 'City shop',
                'hierarchical' => true,
                'public' => true
            ]
        );
    }
}
