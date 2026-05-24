<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

#[Signature('generate:sitemap')]
#[Description('Generate sitemap.xml')]
class GenerateSitemap extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Sitemap::create()

        //     ->add(
        //         Url::create('/')
        //             ->setPriority(1.0)
        //     )

        //     ->add(
        //         Url::create('/tentang')
        //             ->setPriority(0.8)
        //     )

        //     ->writeToFile(public_path('sitemap.xml'));

        // $this->info('Sitemap berhasil dibuat!');

        SitemapGenerator::create(config('app.url'))
            ->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap berhasil dibuat!');
    }
}
