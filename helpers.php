<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/

if (!function_exists('tallTheme')) {

    function tallTheme(){
        return app(\Tall\Theme\Tailwind::class);
    }
}

if (!function_exists('tableView')) {

    function tableView(){
        return "theme::datatable";
    }
}
if (!function_exists('formView')) {

    function formView(){
        return "theme::form";
    }
}

if (!function_exists('theme_layout')) {

    function theme_layout($layout=null){
        
        if(!is_null($layout)){
            if($layoutConfig = config('theme.layouts.admin')){
                return $layoutConfig;
            }
            return "theme::layouts.{$layout}";
        }
        if($layoutConfig = config('theme.layouts.app')){
            return $layoutConfig;
        }
        return config('livewire.layout');
    }
}

if (!function_exists('theme_form_view')) {
    
    function theme_form_view($path){
        return sprintf("theme::%s", $path);
    }
}

if(!function_exists("theme_include_table")){

    function theme_include_table($view)
    {
        return "theme::includes.{$view}";
    }
}


if (!function_exists('theme_lv_includes')) {
    
    function theme_lv_includes($component){
        return sprintf("theme::includes.%s-component", $component);
    }
}