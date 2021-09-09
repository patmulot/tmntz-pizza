<?php

namespace tmntzpizza;

use WP_User;

class Registration
{   // formulaire à l'adresse : " wp/wp-login "
    public function __construct()
    {
        add_action(
            'register_form',
            [$this, 'customizeForm']
        );
        add_filter(
            'registration_errors',
            [$this, 'checkRegistration']
        );
        // add to db :
        add_filter(
            'user_register',
            [$this, 'customUserRegistration']
        );
    }
    public function customizeForm()
    {
        // echo __FILE__ . ":" . __LINE__ / "debug";
        $customFields = '
                <p>
                    <label for="user_password">Password</label>
                    <input type="text" name="user_password" id="user_password" class="input" value="" size="20" autocapitalize="off">
                </p>
            ';
        echo $customFields;
    }
    public function checkRegistration($errors)
    {
        // $role = filter_input(INPUT_POST, 'user_role');
        // if (!$role) {
        //     $errors->add(
        //         //identifiant
        //         'user_role_empty',
        //         //message d'erreur
        //         'Vous devez choisir un rôle.'
        //     );
        // };
        $password =  filter_input(INPUT_POST, 'user_password');
        if (!$this->checkPassword($password)) {
            $errors->add(
                //identifiant
                'user_password_invalid',
                //message d'erreur
                'Votre mot de passe est invalide'
            );
        };
        $customFields = "
                <p>
                    coucou j'écris ce que je veux
                </p>
                <style> body {background-color: black;} </style>";
        echo $customFields;
        return $errors;
    }
    public function checkPassword($password)
    {
        // un mot de passe doit faire 8 caractère de long
        // un mot de passe doit avoir des minuscules + majuscules
        // un mot de passe doit avoir un chiffre
        // un mot de passe doit avoir un caractère spécial
        if (mb_strlen($password) < 8) {
            return false;
        }
        if (!preg_match("/[a-z]+/", $password)) {
            return false;
        }
        if (!preg_match("/[A-Z]+/", $password)) {
            return false;
        }
        if (!preg_match("/[0-9]+/", $password)) {
            return false;
        }
        if (!preg_match("/\w/", $password)) {
            return false;
        }
        return true;
    }
    public function customUserRegistration($userId)
    {
        // creation new user :
        $userObject = new WP_User($userId);
        // getting password & role from form :
        $password = filter_input(INPUT_POST, 'user_password');
        // setting new password from form to db :
        wp_set_password($password, $userId);
    }
}
