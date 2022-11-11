<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/

if (!function_exists('load_icones')) {
    function load_icones($search="")
    {
        

        if(is_dir(resource_path('views/vendor/tall/theme/components/icons')))
        {
            $path=resource_path('views/vendor/tall/theme/components/icons');
        }
        else{
            $path= __DIR__ . '/resources/views/components/icons';
        }
        if (cache()->has($path)) {
            return cache()->get($path);
        }


        $files =collect([]);
        $styles =collect([]);
        foreach(['solid','outline'] as $style){
            $files =collect([]);
            foreach ((new \Symfony\Component\Finder\Finder)->in(sprintf("%s/%s", $path, $style))->files()->name(sprintf('%s*.blade.php', $search)) as $component) {   
                $file = \Illuminate\Support\Str::beforeLast( $component->getFilename(), ".blade");
                $files[$file] = $file;
            }    
             $styles[$style] =  $files->sortKeys()->toarray();
        }
        
        cache()->put($path, $styles);

        return $styles;
    }
}



if (!function_exists('load_icones_tom')) {
    function load_icones_tom($search="")
    {
        if(is_dir(resource_path('views/vendor/tall/theme/components/icons')))
        {
            $path=resource_path('views/vendor/tall/theme/components/icons');
        }
        else{
            $path= __DIR__ . '/resources/views/components/icons';
        }
        if (cache()->has('load_icones_toms')) {
            return cache()->get('load_icones_toms');
        }
        $files =collect([]);
        foreach(['solid','outline'] as $style){
            foreach ((new \Symfony\Component\Finder\Finder)->in(sprintf("%s/%s", $path, $style))->files()->name(sprintf('%s*.blade.php', $search)) as $component) {   
                $file = \Illuminate\Support\Str::beforeLast( $component->getFilename(), ".blade");
                $files[$file] = [
                    'id'=> $file,
                    'style'=> $style,
                    'name'=> $file,
                    'src'=> view('tall::icon', compact('file', 'style'))->render(),
                ];
            }    
        }
        
        cache()->put('load_icones_toms', $files->sortKeys()->toarray());
        
        return $files->sortKeys()->toarray();
    }
}

