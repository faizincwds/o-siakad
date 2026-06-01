<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File; // ✅ Wajib diimpor

#[Signature('ui:install')]
#[Description('Install UI Components skeleton files')]
class MakeUiComponentsCommand extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Lokasi penyimpanan komponen input
        $path = resource_path('views/components/input');

        // Pastikan folder ada (dan buat jika belum ada)
        File::ensureDirectoryExists($path);

        // Daftar nama file komponen yang akan dibuat
        $components = [
            'textarea.blade.php',
            'select.blade.php',
            'checkbox.blade.php',
            'radio.blade.php',
            'switch.blade.php',
            'search.blade.php',
            'datetime.blade.php',
            'date.blade.php',
            'image-upload.blade.php',
            'currency.blade.php',
            'phone.blade.php',
            'select-async.blade.php',
            'select-search.blade.php',
        ];

        foreach ($components as $component) {

            $filePath = "{$path}/{$component}";

            // ✅ Cek dulu, supaya tidak menimpa file yang sudah ada
            if (!File::exists($filePath)) {
                // Isi dasar komponen (bisa diperkaya nanti)
                $content = <<<BLADE
<!-- Komponen: {$component} -->
@props(['disabled' => false])

<input {{ \$disabled ? 'disabled' : '' }} {!! \$attributes->merge(['class' => '...']) !!}>
BLADE;

                File::put($filePath, $content);
                $this->info("✅ Created: components/input/{$component}");
            } else {
                $this->line("⚠️  Skipped: components/input/{$component} (already exists)");
            }
        }

        $this->newLine();
        $this->info('🎉 UI Components installed successfully!');
    }
}
