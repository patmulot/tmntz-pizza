<?php

namespace tmntzpizza\Controllers;

use WP_Query;

class PageController extends CoreController
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
            'views/card/list',
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
            'views/card/typeList',
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

        $this->show(
            'views/card/showOne',
            [
                'postId' => $postId,
                'router' => $router,
            ]
        );
    }

    // public function getProfile($user)
    // {
        // $userRole = $user->roles[0];
        // echo "<h1>hello " . $userRole . "</h1>";
        // // definition des options de recherche
        // $options = [];
        // if($userRole === "developer") {
        //     $options = [
        //         // pour récupérer le profil d'un utlisateur, nous cherchons le "post" dont l'auteur est l'utilisateur passé en paramètre
        //         'author' => $user->ID,
        //         'post_type' => 'developer-profile'
        //     ];
        // } else if($userRole === "customer") {
        //     $options = [
        //         // pour récupérer le profil d'un utlisateur, nous cherchons le "post" dont l'auteur est l'utilisateur passé en paramètre
        //         'author' => $user->ID,
        //         'post_type' => 'customer-profile'
        //     ];
        // } else if($userRole === "administrator") {
        //     $options = [
        //         // pour récupérer le profil d'un utlisateur, nous cherchons le "post" dont l'auteur est l'utilisateur passé en paramètre
        //         'author' => $user->ID,
        //         'post_type' => 'administrator-profile'
        //     ];}
        // // On interoge la BDD WP
        // $query = new WP_Query($options);
        
        // $query->have_post();

        // if(count($query->posts) === 0) {
        //     echo "Le compte utilisateur est corrompu";
        //     exit();
        // } else {
        //     return $query->posts[0];
        // }
    // }

    // public function hello()
    // {
    //     $this->show('views/user/hello');
    // }

    // public function delete()
    // {
    //    // les outils dont on va avoir besoin :
    //    // Pour récupérer l'utilisateur connecté :
    //    // wp_get_current_user
    //    // Pour etre sur d'etre connecté :
    //    // $this->mustBeConnected()
    //    // Pour savoir si je suis admin :
    //    // isAdmin()
    //    if(!$this->mustBeConnected()){
    //     // var_dump('Je suis dans la condition');exit();
    //        return;
    //    }
    //    if($this->isAdmin()){
    //        echo 'Mais ca va pas ou quoi ??? Tu vas supprimer ton compte admin mazette !!';
    //        exit();
    //    }
    //    // récupération de l'utilisateur
    //    $user = wp_get_current_user();
    //    // Pour les fonctions de gestion utilisateur il faut faut faire un include manuel
    //    require_once(ABSPATH.'wp-admin/includes/user.php');
    //    wp_delete_user($user->ID);
    //    wp_redirect(
    //        get_home_url()
    //    );
    // }
}
