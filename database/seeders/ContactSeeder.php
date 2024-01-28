<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'name' => 'Muhammet Ali Fidan',
            'email' => 'test@gmail.com',
            'phone' => '+90 (555)-555-5555',
            'title' => 'Blog Sitesi',
            'content' => 'Bir blog sitesi yaptırmak istiyorum.',
            'status' => 'Pasif'
        ]);
    }
}
