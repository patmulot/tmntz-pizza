<?php

namespace tmntzpizza\Controllers;

use WP_Query;

class ShopController extends CoreController
{
    public function list()
    {
        $router = $this->router;
        $allFoodTypes = get_terms('food-thumbnail-category', array(
            'hide_empty' => false,
        ));
        // loop to display posts from taxonomies :
        foreach ($allFoodTypes as $foodType) {
            $postType = array(
                'post_type' => 'food-thumbnail',
                'posts_per_page' => '4',
                'tax_query' => array(
                    array(
                    'taxonomy' => 'food-thumbnail-category',
                    'field' => 'term_id',
                    'terms' => $foodType->term_id,
                    )
                )
            );
            if (!empty($postType)) {
                $foodThumbnailsTab[] = [
                    "foodPosts" => new WP_Query($postType),
                    "foodType" => $foodType,
                ];
            }
        }
        $this->show(
            'views/shop/list',
            [
                'foodThumbnailsTab' => $foodThumbnailsTab,
                'allFoodTypes' => $allFoodTypes,
                'router' => $router,
            ]
        );
    }
    public function typeList()
    {
        $router = $this->router;
        // getting the food type id :
        $foodTypeId = intval($router->match()["params"]["id"]);
        $allFoodTypes = get_terms('food-thumbnail-category', array(
            'hide_empty' => false,
        ));
        // $allFoodPrices = get_terms('food-price', array(
        //     'hide_empty' => false,
        // ));
        // var_dump($allFoodPrices); die();
        // loop to display posts from taxonomies :
        foreach ($allFoodTypes as $foodType) {
            if ($foodType->parent === $foodTypeId) {
            // getting the CPT for each custom taxonomy
            $postType = array(
                'post_type' => 'food-thumbnail',
                'tax_query' => array(
                    array(
                    'taxonomy' => 'food-thumbnail-category',
                    'field' => 'term_id',
                    'terms' => $foodType->term_id,
                    )
                )
            );
            // var_dump($postType); die();
                if (!empty($postType)) {
                    $foodThumbnailsTab[] = [
                        "foodPosts" => new WP_Query($postType),
                        "foodType" => $foodType,
                    ];
                }
            }
        }
        $this->show(
            'views/shop/typeList',
            [
                'foodThumbnailsTab' => $foodThumbnailsTab,
                'allFoodTypes' => $allFoodTypes,
                'router' => $router,
            ]
        );
    }
    public function showOne()
    {
        $router = $this->router;
        // getting the element to show id :
        $postId = intval($router->match()["params"]["id"]);

        // getting the food type id :
        // $foodTypeId = intval($router->match()["params"]["id"]);
        $allFoodTypes = get_terms('food-thumbnail-category', array(
            'hide_empty' => false,
        ));
        // loop to display posts from taxonomies :
        foreach ($allFoodTypes as $foodType) {
            // if ($foodType->parent === $foodTypeId) {
            //     // getting the CPT for each custom taxonomy
            //     $postType = array(
            //     'post_type' => 'food-thumbnail',
            //     'tax_query' => array(
            //         'taxonomy' => 'food-thumbnail-category',
            //         'field' => 'term_id',
            //         'terms' => $foodType->term_id,
            //         )
            //     );
            // };
            $foodThumbnailsTab[] = [
                "foodType" => $foodType,
            ];
        }

        $this->show(
            'views/shop/showOne',
            [
                'foodThumbnailsTab' => $foodThumbnailsTab,
                'postId' => $postId,
                'router' => $router,
            ]
        );
    }
}
