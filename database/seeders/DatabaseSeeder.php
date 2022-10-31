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
            'name' => 'User 9',
            'username' => Str::slug('User9'),
            'email' => 'user9@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => 3,
            'tour_place_id' => 49,
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
            'description' => 'Sungai Tamborasi adalah sebuah sungai yang terletak di Kabupaten Kolaka, Provinsi Sulawesi Tenggara, Indonesia. Sungai ini memiliki panjang 20 meter dan lebar 15 meter. Sungai tersebut diklaim sebagai sungai terpendek di Indonesia dan dunia. Sungai Tamborasi Halaman Pembicaraan Baca Sunting Sunting sumber Lihat riwayat Dari Wikipedia bahasa Indonesia, ensiklopedia bebas Program PLN Peduli terhadap pengembangan Objek Wisata Sungai Tamborasi.[1] Mata air Sungai Tamborasi berasal dari gua bawah tanah dan langsung mengalir ke laut. Aliran sungai sulit terlihat saat air laut pasang yang tampak pada saat foto ini diambil. Sungai Tamborasi adalah sebuah sungai yang terletak di Kabupaten Kolaka, Provinsi Sulawesi Tenggara, Indonesia. Sungai ini memiliki panjang 20 meter dan lebar 15 meter. Sungai tersebut diklaim sebagai sungai terpendek di Indonesia dan dunia.[2] Lokasi Sungai Tamborasi terletak di Desa Tamborasi, Kecamatan Wolo, Kabupaten Kolaka, Provinsi Sulawesi Tenggara. Sungai Tamborasi dapat terlihat langsung di sisi sebelah kiri jalan Trans Sulawesi saat menuju Kabupaten Kolaka Utara Akses Ada beberapa pilihan akses apabila akan ke tempat wisata Tamborasi ini. Yang pertama bisa melalui udara dengan rute perjalanan dari Bandara Sultan Hasanuddin Maros menuju Bandar Udara Sangia Nibandera Kabupaten Kolaka dengan waktu tempuh sekitar 50 menit. Dengan akses darat bisa menggunakan rute dari Kota Kendari ke Kolaka dengan memakan waktu 3-4 jam perjalanan. Dari pusat Kabupaten Kolaka ke Sungai Tamborasi membutuhkan waktu 1-2 jam lagi, dengan jarak sekitar 90 kilometer ke arah utara.',
            'ticket_stock' => rand(0, 100),
            'price' => 15000,
            'telp' => fake()->phoneNumber(),
            'image' => 'https://res.cloudinary.com/dvbn5fow8/image/upload/v1667191849/wisata/mk8fzbjxwk5cp1fk9t61.jpg',
            'image_id' => 'wisata/mk8fzbjxwk5cp1fk9t61',
            'maps' => 'https://goo.gl/maps/NVV5tisoqHmWowuB9',
            'rental' => rand(0, 1),
        ]);
        TourPlace::create([   // 2
            'id' => 42,
            'name' => 'Danau Biru',
            'city' => 'Kolaka',
            'address' => 'Walasiho, Kec. Wawo, Kabupaten Kolaka Utara, Sulawesi Tenggara',
            'description' => 'Sumber mata air Danau Biru Kolaka dipercaya berasal dari bekas tempat duduk seorang putri raja yang bertapa. Danau Biru Kolaka dikelilingi dinding batu yang kokoh. Bukit dan pepohonan menjadi bagian lain yang mengambil porsi lain mempercantik Danau Biru. Salah satu cara menikmati Danau Biru yang bisa Anda lakukan adalah berenang. Air danaunya payau, tidak asin juga tidak tawar. Suhunya sedikit dingin karena berada di pegunungan dengan warna biru cerah. Kedalaman air danau sekitar tujuh meter.',
            'ticket_stock' => rand(0, 100),
            'price' => 20000,
            'telp' => fake()->phoneNumber(),
            'image' => 'https://res.cloudinary.com/dvbn5fow8/image/upload/v1667191891/wisata/aeh9u3mq7r5hjh0hrnag.jpg',
            'image_id' => 'wisata/aeh9u3mq7r5hjh0hrnag',
            'maps' => 'https://goo.gl/maps/QmdbSDEwg79rN2uS7',
            'rental' => rand(0, 1),
        ]);
        TourPlace::create([   // 3
            'id' => 43,
            'name' => 'Pulau Bokori',
            'city' => 'Konawe',
            'address' => 'Soropia, Kabupaten Konawe, Sulawesi Tenggara',
            'description' => 'Bokori berasal dari kata boko dan ri. Dalam bahasa bajo, boko artinya penyu, sedangkan ri artinya tempat. Sehingga, bokori artinya tempat bertelurnya penyu. Dahulu sebelum menjadi tempat wisata, Pulau Bokori dihuni sejumlah penduduk. Kemudian saat wilayah ini menjadi tempat wisata, penduduk setempat direlokasi untuk pertama kali pada tahun 1984. Pada tahun 1987 relokasi berikutnya, pemindahan penduduk tersebut menjadi Desa Bokori yang akhirnya mekar lagi menjadi Desa Bajo Indah, sekitar tiga tahun kemudian.',
            'ticket_stock' => rand(0, 100),
            'price' => 25000,
            'telp' => fake()->phoneNumber(),
            'image' => 'https://res.cloudinary.com/dvbn5fow8/image/upload/v1667191929/wisata/dmtpovtygeqcuingovrf.jpg',
            'image_id' => 'wisata/dmtpovtygeqcuingovrf',
            'maps' => 'https://goo.gl/maps/N1nGsGDR8SCHrmFn8',
            'rental' => rand(0, 1),
        ]);
        TourPlace::create([   // 4
            'id' => 44,
            'name' => 'Pantai Nambo',
            'city' => 'Kendari',
            'address' => 'Kelurahan Nambo, Kecamatan Nambo, Sulawesi Tenggara',
            'description' => 'Pantai Nambo merupakan objek wisata andalan di Provinsi Sulawesi Tenggara. Pantai ini terletak di Kecamatan Abeli, kurang lebih 12 kilometer dari pusat Kota Kendari. Pantai berpasir putih nan halus di sepanjang bibir pantai dengan kondisi yang landai ini menjadi salah satu objek wisata favorit di Kota Kendari yang banyak dikunjungi oleh wisatawan. Tidak hanya wisatawan lokal, seringkali wisatawan asing juga singgah dan menikmati keindahan pantai ini. Fasilitas-fasilitas yang ada di objek wisata ini sudah cukup memadai, seperti banyaknya penginapan-penginapan dengan harga yang bervariasi, warung makan, toilet umum, gazebo-gazebo yang berdiri di sepanjang pantai, toko souvenir dan tempat parkir yang cukup luas. Untuk menuju ke objek wisata ini jika dari Kota Kendari dapat dicapai dengan menggunakan kendaraan bermotor jika lewat jalur darat ataupun menggunakan perahu nelayan jika lewat jalur laut. Waktu tempuh untuk menuju ke objek wisata ini sekitar 15 menit.',
            'ticket_stock' => rand(0, 100),
            'price' => 15000,
            'telp' => fake()->phoneNumber(),
            'image' => 'https://res.cloudinary.com/dvbn5fow8/image/upload/v1667191955/wisata/lz1tovlbnlsecclfbwpz.jpg',
            'image_id' => 'wisata/lz1tovlbnlsecclfbwpz',
            'maps' => 'https://goo.gl/maps/LKgKe9k2UeUuT6LNA',
            'rental' => rand(0, 1),
        ]);
        TourPlace::create([   // 5
            'id' => 45,
            'name' => 'Pantai Nirwana',
            'city' => 'Bau-bau',
            'address' => 'Kelurahan Sula, Kec. Betoambari, Kota Bau-bau, Sulawesi Tenggara',
            'description' => 'Secara arti kata, Nirwana memiliki arti surga. Pantai ini terkenal dengan pasir putih yang menghampar dan air laut yang juga jernih kebiruan. Pantai Nirwana menjadi salah satu spot petualangan yang juga sering dikunjungi oleh para wisatawan. Ada sebagian kepercayaan dari masyarakat sekitar bahwa untuk mereka yang memiliki penyakit asma, anda bisa berendam di air laut di sana dan diyakini memiliki khasiat menyembuhkan. Dari kepercayaan inilah Pantai Nirwana Bau Bau ini terkenal karena khasiat tersebut.',
            'ticket_stock' => rand(0, 100),
            'price' => 5000,
            'telp' => fake()->phoneNumber(),
            'image' => 'https://res.cloudinary.com/dvbn5fow8/image/upload/v1667191989/wisata/bwzum4iqvtdetkfl6cfz.jpg',
            'image_id' => 'wisata/bwzum4iqvtdetkfl6cfz',
            'maps' => 'https://goo.gl/maps/ZCNXpHJE3Pr8oyWW6',
            'rental' => rand(0, 1),
        ]);
        TourPlace::create([   // 6
            'id' => 46,
            'name' => 'Taman Bawah Laut',
            'city' => 'Wakatobi',
            'address' => 'Kabupaten Wakatobi, Sulawesi Tenggara',
            'description' => 'Taman Nasional Wakatobi berada di anatar segitiga koral. Di dalam kawasannya terdapat beragam jenis koral, ikan, moluska, dan spesies tanaman laut terbesar di dunia. Empat pulau terbesar yang masuk dalam wilayahnya adalah Pulau Wangi-wangi, Pulau Kadelupia, Pulau Tomia, dan Pulau Binongko. Selain itu ada 39 pulau kecil dan beberapa pulau karang berukuran besar. Keempat pulau terbesar dikelilingi oleh terumbu karang dan pulau karang besar. Taman Nasional Wakatobi juga dikelilingi oleh selat-selat. Keberadaan selat menjadi jalan masuk bagi penyu dan paus.',
            'ticket_stock' => rand(0, 100),
            'price' => 20000,
            'telp' => fake()->phoneNumber(),
            'image' => 'https://res.cloudinary.com/dvbn5fow8/image/upload/v1667192043/wisata/mgyo9ydn6azfrfoe0tg6.jpg',
            'image_id' => 'wisata/mgyo9ydn6azfrfoe0tg6',
            'maps' => 'https://goo.gl/maps/G38kLQNvd3BsTQsv7',
            'rental' => rand(0, 1),
        ]);
        TourPlace::create([   // 7
            'id' => 47,
            'name' => 'Goa Moko',
            'city' => 'Bau-Bau',
            'address' => 'Sula, Kec. Betoambari, Kota Bau-Bau, Sulawesi Tenggara 93721',
            'description' => 'Dibalik keunikan dan keindahan Goa Moko, sejak lama goa ini menjadi sumber kehidupan yang bermanfaat bagi masyarakat sekitar.   Lokasi goa ini dahulu dikenal oleh masyarakat setempat sebagai sumber mata air. Warga mengambil air dari goa ini untuk memenuhi kebutuhan rumah tangga mereka.  Uniknya, mata air ini tidak pernah kering.  Dan untuk menjangkau lokasi ini, hanya dibutuhkan waktu tak kurang dari 10 menit dengan berjalan menelusuri pantai ke arah selatan.  Meskipun dekat, Traveler tetap harus berhati-hati karena jalanan yang dilalui penuh dengan bebatuan dan cukup terjal.',
            'ticket_stock' => rand(0, 100),
            'price' => 15000,
            'telp' => fake()->phoneNumber(),
            'image' => 'https://res.cloudinary.com/dvbn5fow8/image/upload/v1667192075/wisata/k1xrbshovhbmwjxxxwze.jpg',
            'image_id' => 'wisata/k1xrbshovhbmwjxxxwze',
            'maps' => 'https://goo.gl/maps/MVBz8LpTvvP9KGmK6',
            'rental' => rand(0, 1),
        ]);
        TourPlace::create([   // 8
            'id' => 48,
            'name' => 'Labengki',
            'city' => 'Konawe Selatan',
            'address' => 'Pulau, Labengke Besar, Kabupaten Konawe Utara, Sulawesi Tenggara 93352',
            'description' => 'Salah satu destinasi Indonesia yang sedang menarik perhatian pencinta jalan-jalan adalah Pulau Labengki. Kecantikan pulau tersembunyi milik Sulawesi Tenggara ini konon mirip Raja Ampat. Maka, banyak orang yang mulai menyebut Pulau Labengki sebagai Raja Ampatnya Sulawesi.',
            'ticket_stock' => rand(0, 100),
            'price' => 30000,
            'telp' => fake()->phoneNumber(),
            'image' => 'https://res.cloudinary.com/dvbn5fow8/image/upload/v1667200021/wisata/bacfce7ewwz4r0byr1ht.jpg',
            'image_id' => 'wisata/bacfce7ewwz4r0byr1ht',
            'maps' => 'https://goo.gl/maps/XRrSXMa27hhgcgZe7',
            'rental' => rand(0, 1),
        ]);
    }
}
