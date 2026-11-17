<?php

use Illuminate\Foundation\Inspiring;
use App\Services\InstagramFeedService;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('instagram:refresh-feed', function (InstagramFeedService $instagramFeed) {
    $posts = $instagramFeed->refresh();

    if ($posts === null) {
        $this->error('Instagram feed refresh failed; cached posts were left available.');

        return 1;
    }

    $this->info('Instagram feed refreshed successfully: '.count($posts).' posts.');

    return 0;
})->purpose('Refresh the cached Stagepass Instagram feed from the Graph API');
