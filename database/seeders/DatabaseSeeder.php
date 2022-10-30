<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\TourPlace;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin',]);
        Role::create(['name' => 'pengunjung',]);
        Role::create(['name' => 'pengelola',]);

        User::factory()->create([
            'name' => 'Administrator',
            'username' => Str::slug('Administrator'),
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => 1,
        ]);

        User::factory()->create([
            'name' => 'Ilmi Faizan',
            'username' => Str::slug('icang1112'),
            'email' => 'ilmifaizan1112@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);

        User::factory(38)->create();

        // DATA DUMMY PENGELOLA
        User::factory()->create([
            'name' => 'User 1',
            'username' => Str::slug('User 1'),
            'email' => 'user1@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => 3,
            'tour_place_id' => 41,
        ]);
        User::factory()->create([
            'name' => 'User 2',
            'username' => Str::slug('User 2'),
            'email' => 'user2@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => 3,
            'tour_place_id' => 42,
        ]);
        User::factory()->create([
            'name' => 'User 3',
            'username' => Str::slug('User 3'),
            'email' => 'user3@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => 3,
            'tour_place_id' => 43,
        ]);
        User::factory()->create([
            'name' => 'User 4',
            'username' => Str::slug('User 4'),
            'email' => 'user4@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => 3,
            'tour_place_id' => 44,
        ]);
        User::factory()->create([
            'name' => 'User 5',
            'username' => Str::slug('User 5'),
            'email' => 'user5@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => 3,
            'tour_place_id' => 45,
        ]);
        User::factory()->create([
            'name' => 'User 6',
            'username' => Str::slug('User 6'),
            'email' => 'user6@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => 3,
            'tour_place_id' => 46,
        ]);
        User::factory()->create([
            'name' => 'User 7',
            'username' => Str::slug('User 7'),
            'email' => 'user7@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => 3,
            'tour_place_id' => 47,
        ]);
        User::factory()->create([
            'name' => 'User 8',
            'username' => Str::slug('User 8'),
            'email' => 'user8@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => 3,
            'tour_place_id' => 48,
        ]);
        User::factory()->create([
            'name' => 'Yayat',
            'username' => Str::slug('yayat'),
            'email' => 'auliyarahman1904@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => 2,
        ]);

        // DATA DUMMY WISATA
        TourPlace::create([   // 1
            'id' => 41,
            'name' => 'Tamborasi',
            'city' => 'Kolaka',
            'address' => 'Kec. Wolo, Kabupaten Kolaka, Sulawesi Tenggara',
            'description' => fake()->text(),
            'ticket_stock' => rand(0, 100),
            'price' => 15000,
            'telp' => fake()->phoneNumber(),
            'image' => 'tamborasi.jpg',
            'maps' => 'https://goo.gl/maps/NVV5tisoqHmWowuB9',
            'rental' => rand(0, 1),
        ]);
        TourPlace::create([   // 2
            'id' => 42,
            'name' => 'Danau Biru',
            'city' => 'Kolaka',
            'address' => 'Walasiho, Kec. Wawo, Kabupaten Kolaka Utara, Sulawesi Tenggara',
            'description' => fake()->text(),
            'ticket_stock' => rand(0, 100),
            'price' => 15000,
            'telp' => fake()->phoneNumber(),
            'image' => 'danau-biru.jpg',
            'maps' => 'https://goo.gl/maps/QmdbSDEwg79rN2uS7',
            'rental' => rand(0, 1),
        ]);
        TourPlace::create([   // 3
            'id' => 43,
            'name' => 'Pulau Bokori',
            'city' => 'Konawe',
            'address' => 'Soropia, Kabupaten Konawe, Sulawesi Tenggara',
            'description' => fake()->text(),
            'ticket_stock' => rand(0, 100),
            'price' => 15000,
            'telp' => fake()->phoneNumber(),
            'image' => 'pulau-bokori.jpg',
            'maps' => 'https://goo.gl/maps/N1nGsGDR8SCHrmFn8',
            'rental' => rand(0, 1),
        ]);
        TourPlace::create([   // 4
            'id' => 44,
            'name' => 'Pantai Nambo',
            'city' => 'Kendari',
            'address' => 'Kelurahan Nambo, Kecamatan Nambo, Sulawesi Tenggara',
            'description' => fake()->text(),
            'ticket_stock' => rand(0, 100),
            'price' => 15000,
            'telp' => fake()->phoneNumber(),
            'image' => 'pantai-nambo.jpg',
            'maps' => 'https://goo.gl/maps/LKgKe9k2UeUuT6LNA',
            'rental' => rand(0, 1),
        ]);
        TourPlace::create([   // 5
            'id' => 45,
            'name' => 'Pantai Nirwana',
            'city' => 'Bau-bau',
            'address' => 'Kelurahan Sula, Kec. Betoambari, Kota Bau-bau, Sulawesi Tenggara',
            'description' => fake()->text(),
            'ticket_stock' => rand(0, 100),
            'price' => 5000,
            'telp' => fake()->phoneNumber(),
            'image' => 'pantai-nirwana.jpg',
            'maps' => 'https://goo.gl/maps/ZCNXpHJE3Pr8oyWW6',
            'rental' => rand(0, 1),
        ]);
        TourPlace::create([   // 6
            'id' => 46,
            'name' => 'Taman Bawah Laut',
            'city' => 'Wakatobi',
            'address' => 'Kabupaten Wakatobi, Sulawesi Tenggara',
            'description' => fake()->text(),
            'ticket_stock' => rand(0, 100),
            'price' => 15000,
            'telp' => fake()->phoneNumber(),
            'image' => 'taman-laut-wakatobi.jpg',
            'maps' => 'https://goo.gl/maps/G38kLQNvd3BsTQsv7',
            'rental' => rand(0, 1),
        ]);
        TourPlace::create([   // 7
            'id' => 47,
            'name' => 'Goa Moko',
            'city' => 'Bau-Bau',
            'address' => 'Sula, Kec. Betoambari, Kota Bau-Bau, Sulawesi Tenggara 93721',
            'description' => fake()->text(),
            'ticket_stock' => rand(0, 100),
            'price' => 15000,
            'telp' => fake()->phoneNumber(),
            'image' => 'goa-moko.jpg',
            'maps' => 'https://goo.gl/maps/MVBz8LpTvvP9KGmK6',
            'rental' => rand(0, 1),
        ]);
        TourPlace::create([   // 8
            'id' => 48,
            'name' => 'Labengki',
            'city' => 'Konawe Selatan',
            'address' => 'Pulau, Labengke Besar, Kabupaten Konawe Utara, Sulawesi Tenggara 93352',
            'description' => fake()->text(),
            'ticket_stock' => rand(0, 100),
            'price' => 15000,
            'telp' => fake()->phoneNumber(),
            'image' => 'labengki.jpeg',
            'maps' => 'https://goo.gl/maps/XRrSXMa27hhgcgZe7',
            'rental' => rand(0, 1),
        ]);
    }
}
