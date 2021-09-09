<?php

namespace tmntzpizza\Controllers;

use tmntzpizza\Models\DeveloperTechnologyModel;
use tmntzpizza\Models\DeveloperSkillModel;
use tmntzpizza\Models\TechnologyModel;
use WP_Query;

class UserController extends CoreController {


    public function home()
    {
        // vérification : est ce que le visiteur est connecté
        // s'il n'est pas connecté, nous le redirigeons vers la page de login
        $this->mustBeConnected();

        $user = wp_get_current_user();
        //var_dump($user);exit();
        // $profile = $this->getProfile($user);

        // $developerTechnologyModel = new DeveloperTechnologyModel();
        // $technologies = $developerTechnologyModel->getTechnologiesByUserId($user->ID);
        
        // $developerSkillModel = new DeveloperSkillModel();
        // $skills = $developerSkillModel->getSkillsByUserId($user->ID);

        $this->show(
            'views/user/home', 
            [
                'currentUser' => $user,
                // 'profile' => $profile,
                // 'technologies' => $technologies,
                // 'skills' => $skills
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