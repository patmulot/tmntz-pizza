<?php

namespace tmntzpizza\Controllers;

use WP_Query;

class OrderController extends CoreController
{
    public function delivery()
    {
        if (empty($_GET)) {
            $router = $this->router;
            $this->show(
                'views/order/delivery',
                [
                    'router' => $router,
                ]
            );
        }
    }
    public function pickup()
    {
        $router = $this->router;
        $message = null;
        $allShop = get_terms('city-shop', array(
            'hide_empty' => false,
        ));
        $cityId = null;
        foreach ($allShop as $shop) {
            if (
                $_GET["address-input"] == strtolower($shop->name) ||
                $_GET["address-input"] == $shop->name
            ) {
                $cityId = $shop->term_id;
            } else {
                $message = "aucun magasin trouvé";
            }
        };
        $postType = array(
                'post_type' => 'shop',
                'tax_query' => array(
                    array(
                    'taxonomy' => 'city-shop',
                    'field' => 'term_id',
                    'terms' => $cityId,
                    )
                )
            );
        if (!empty($postType)) {
            $cityShop = new WP_Query($postType);
        }
        $this->show(
            'views/order/pickup',
            [
                'router' => $router,
                'cityShop' => $cityShop,
                'message' => $message,
            ]
        );
    }
    public function home()
    {
        if (empty($_GET)) {
            $router = $this->router;
            $this->show(
                'views/order/home',
                [
                    'router' => $router,
                ]
            );
        }
    }
    public function paiment()
    {
        $router = $this->router;
        $allFoodTypes = get_terms('food-thumbnail-category', array(
            'hide_empty' => false,
        ));
        // loop to display posts from taxonomies :
        foreach ($allFoodTypes as $foodType) {
            $foodThumbnailsTab[] = [
                    "foodType" => $foodType
                ];
        };
        $user = wp_get_current_user()->data;
        $this->show(
            'views/order/paiment',
            [
                'router' => $router,
                'user' => $user,
                'foodThumbnailsTab' => $foodThumbnailsTab,
            ]
        );
    }
    public function state()
    {
        $router = $this->router;
        $this->show(
            'views/order/state',
            [
                'router' => $router,
            ]
        );
    }
    public function ready()
    {
        $router = $this->router;
        $this->show(
            'views/order/ready',
            [
                'router' => $router,
            ]
        );
    }
}
