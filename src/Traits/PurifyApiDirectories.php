<?php

namespace Wasyl144\Breeze\Traits;

use Illuminate\Filesystem\Filesystem;

trait PurifyApiDirectories
{
    /**
     * Remove any application scaffolding that isn't needed for APIs.
     *
     * @return void
     */
    protected function removeScaffoldingUnnecessaryForApis()
    {
        $files = new Filesystem;

        // Remove frontend related files...
        $files->delete(base_path('package.json'));
        $files->delete(base_path('vite.config.js'));

        // Remove Laravel "welcome" view...
        $files->delete(resource_path('views/welcome.blade.php'));
        $files->put(resource_path('views/.gitkeep'), PHP_EOL);

        // Remove CSS and JavaScript directories...
        $files->deleteDirectory(resource_path('css'));
        $files->deleteDirectory(resource_path('js'));
    }
}
