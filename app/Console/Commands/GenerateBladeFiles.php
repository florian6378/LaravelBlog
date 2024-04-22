<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateBladeFiles extends Command
{
    protected $signature = 'generate:blades {name : The name of the blade file}';

    protected $description = 'Generate blade files for blog project';

    public function handle()
    {
        $name = $this->argument('name');
        $this->generateBladeFile($name);
    }

    protected function generateBladeFile($name)
    {
        $filePath = resource_path("views/{$name}.blade.php");
        if (File::exists($filePath)) {
            $this->error('File already exists!');
            return;
        }
        File::put($filePath, '<!-- Blade file generated -->');
        $this->info("Blade file created successfully: {$name}.blade.php");
    }
}
