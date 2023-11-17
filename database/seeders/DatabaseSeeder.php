<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         Contact::factory(10)->create();

         Contact::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
         ]);
    }
}
