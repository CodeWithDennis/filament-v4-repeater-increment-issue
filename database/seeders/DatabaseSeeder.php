<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Item;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Item::factory(5)
            ->hasOrders(2)
            ->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@filament.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
