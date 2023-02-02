<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    protected array $data = [
        [
            'name' => 'default',
            'token' => 'xyz123',
        ],
        [
            'name' => 'admin',
        ]
    ];

    public function run(): void
    {
        foreach($this->data as $data) {
            if (!isset($data['token'])) {
                $data['token'] = Str::random(40);
            }

            Admin::query()->create($data);
        }
    }
}
