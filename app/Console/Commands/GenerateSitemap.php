<?php

namespace App\Console\Commands;

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Portfolio;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically Generate an XML Sitemap';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sitemap = Sitemap::create();

        $sitemap->add(
            Url::create("/")
                ->setPriority(0.5)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
        );

        Blog::get()->each(function (Blog $blog) use ($sitemap) {
            $sitemap->add(
                Url::create("/blog/{$blog->category->slug}/{$blog->slug}")
                    ->setPriority(0.5)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            );
        });

        Portfolio::get()->each(function (Portfolio $portfolio) use ($sitemap) {
            $sitemap->add(
                Url::create("/calismalarim/{$portfolio->category->slug}/{$portfolio->slug}")
                    ->setPriority(0.5)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            );
        });

        $sitemap->add(
            Url::create("/iletisim")
                ->setPriority(0.5)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
        );

        $sitemap->add(
            Url::create("/hakkimda")
                ->setPriority(0.5)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
        );

        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
