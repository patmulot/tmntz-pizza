<?php

namespace tmntzpizza;

class Router
{
    public function __construct()
    {
        add_action(
            'init',
            [$this, 'registerRoutes']
        );
    }

    public function registerRoutes()
    {
        add_rewrite_rule(
            'user/?.*',
            'index.php?cEstNousQuOnVaGererNousMemeLaRoute=true',
            'top'
        );
        add_rewrite_rule(
            'card/?.*',
            'index.php?cEstNousQuOnVaGererNousMemeLaRoute=true',
            'top'
        );
        add_rewrite_rule(
            'order/?.*',
            'index.php?cEstNousQuOnVaGererNousMemeLaRoute=true',
            'top'
        );
        add_rewrite_rule(
            'shop/?.*',
            'index.php?cEstNousQuOnVaGererNousMemeLaRoute=true',
            'top'
        );
        flush_rewrite_rules();
        add_filter('query_vars', function($query_vars){
            $query_vars[] = 'cEstNousQuOnVaGererNousMemeLaRoute';
            return $query_vars;

        });
        add_filter('template_include', function($template){
            $cEstNousQuOnVaGererNousMemeLaRoute = get_query_var('cEstNousQuOnVaGererNousMemeLaRoute');
            if($cEstNousQuOnVaGererNousMemeLaRoute){
                return __DIR__ . '/../custom-routes.php';        
            }
            return $template;
        });
    }
}