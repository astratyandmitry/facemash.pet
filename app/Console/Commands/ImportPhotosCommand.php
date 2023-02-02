<?php

namespace App\Console\Commands;

use App\Models\Photo;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ImportPhotosCommand extends Command
{
    protected $signature = 'fakemash:photos-import';

    protected $description = 'Import photos from picsum to DB';

    public function handle(): int
    {
        $page = 1;

        while ($data = $this->fetch($page)) {
            $photos = collect($data)->map(function ($photo) {
                return ['external_id' => $photo['id']];
            })->toArray();

            Photo::query()->insert($photos);

            $page++;
        }

        return 0;
    }

    private function fetch(int $page): array|false
    {
        $json = Http::withoutVerifying()->asJson()
            ->get("https://picsum.photos/v2/list?page={$page}")
            ->json();

        if (! count($json)) {
            return false;
        }

        return $json;
    }
}
