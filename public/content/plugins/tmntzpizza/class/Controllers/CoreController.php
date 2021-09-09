<?php

namespace tmntzpizza\Controllers;

class CoreController
{
    /**
     * @var AltoRouter
     */
    protected $router;
    protected $commonVars;
    public function __construct()
    {
        global $router;
        $this->router = $router;
    }

    protected function show($viewName, $viewVars = []) {
        $viewVars['router'] = $this->router;
        get_template_part(
            $viewName,
            null,
            $viewVars,
        );
    }

    protected function mustBeConnected()
    {
        if(!is_user_logged_in()){
            wp_redirect(
                wp_login_url()
            );
            return false;
        } 
        return true;
    }

    protected function isAdmin(){
        $user = wp_get_current_user();
        $roles = $user->roles;
        if(in_array('administrator', $roles)){
            return true;
        } 
        else {
            return false;
        } 
    }

}