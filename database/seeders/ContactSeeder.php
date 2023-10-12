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
            'phone' => '+90 (562)-562-5555',
            'title' => 'Blog Sitesi',
            'content' => 'Bir blog sitesi yaptırmak istiyorum.',
            'status' => 'active',
        ]);

        Contact::create([
            'name' => 'Ali Muhammet Fidan',
            'email' => 'test2@gmail.com',
            'phone' => '+90 (560)-560-0000',
            'title' => 'ETicaret Sitesi',
            'content' => 'Bir eticaret sitesi yaptırmak istiyorum.',
            'status' => 'waiting',
        ]);

        Contact::create([
            'name' => 'Fidan Muhammet Ali',
            'email' => 'test3@gmail.com',
            'phone' => '+90 (362)-362-3333',
            'title' => 'Turizm Sitesi',
            'content' => 'Bir turizm sitesi yaptırmak istiyorum.',
            'status' => 'inactive',
        ]);
    }
}
