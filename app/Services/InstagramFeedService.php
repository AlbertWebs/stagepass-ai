<?php

namespace App\Services;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class InstagramFeedService
{
    private const CACHE_KEY = 'instagram.feed.posts.v2';

    private const STALE_CACHE_KEY = 'instagram.feed.posts.stale.v2';

    /**
     * @return array<int, array{id: string, caption: string, media_type: string, media_url: string, preview_url: string, permalink: string}>
     */
    public function posts(): array
    {
        $cache = Cache::store('file');
        $userId = config('services.instagram.user_id');
        $accessToken = config('services.instagram.access_token');
        $stalePosts = $cache->get(self::STALE_CACHE_KEY, $cache->get('instagram.feed.posts.stale', []));

        if (! is_string($userId) || $userId === '' || ! is_string($accessToken) || $accessToken === '') {
            return $stalePosts;
        }

        $apiVersion = config('services.instagram.api_version', 'v25.0');
        $apiVersion = is_string($apiVersion) && preg_match('/^v\d+\.\d+$/', $apiVersion) === 1 ? $apiVersion : 'v25.0';

        try {
            return $cache->remember(self::CACHE_KEY, now()->addMinutes(15), function () use ($userId, $accessToken, $apiVersion, $cache): array {
                $response = Http::withToken($accessToken)
                    ->acceptJson()
                    ->connectTimeout(3)
                    ->timeout(8)
                    ->get("https://graph.facebook.com/{$apiVersion}/{$userId}/media", [
                        'fields' => 'id,caption,media_type,media_url,permalink,thumbnail_url,timestamp,children{media_type,media_url,thumbnail_url}',
                        'limit' => 50,
                    ])
                    ->throw();

                $mediaItems = $response->json('data', []);
                $posts = [];

                if (is_array($mediaItems)) {
                    foreach ($mediaItems as $mediaItem) {
                        if (! is_array($mediaItem)) {
                            continue;
                        }

                        $mediaType = $mediaItem['media_type'] ?? '';
                        $selectedMedia = $mediaType === 'CAROUSEL_ALBUM'
                            ? ($mediaItem['children']['data'][0] ?? [])
                            : $mediaItem;
                        $selectedType = $selectedMedia['media_type'] ?? $mediaType;
                        $mediaUrl = $selectedMedia['media_url'] ?? '';
                        $previewUrl = $selectedType === 'VIDEO'
                            ? ($selectedMedia['thumbnail_url'] ?? '')
                            : $mediaUrl;
                        $permalink = $mediaItem['permalink'] ?? '';

                        if (! is_string($mediaUrl) || ! str_starts_with($mediaUrl, 'https://') || ! is_string($previewUrl) || ! str_starts_with($previewUrl, 'https://') || ! is_string($permalink) || ! str_starts_with($permalink, 'https://')) {
                            continue;
                        }

                        $posts[] = [
                            'id' => (string) ($mediaItem['id'] ?? ''),
                            'caption' => is_string($mediaItem['caption'] ?? null) ? $mediaItem['caption'] : 'View this Stagepass Instagram post',
                            'media_type' => is_string($selectedType) ? $selectedType : 'IMAGE',
                            'media_url' => $mediaUrl,
                            'preview_url' => $previewUrl,
                            'permalink' => $permalink,
                        ];
                    }
                }

                $cache->put(self::STALE_CACHE_KEY, $posts, now()->addDays(7));

                return $posts;
            });
        } catch (ConnectionException|RequestException) {
            return $stalePosts;
        }
    }
}
