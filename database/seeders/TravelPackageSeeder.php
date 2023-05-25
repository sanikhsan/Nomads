<?php

namespace Database\Seeders;

use App\Models\TravelPackage;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TravelPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bratan = 'Danau Bratan (Bali: ᬤᬦᬸᬩ᭄ᬭᬢᬦ᭄) adalah sebuah danau yang terletak di kawasan Bedugul, Desa Candikuning, Kecamatan Baturiti, Kabupaten Tabanan, Bali. Danau yang terletak paling timur di antara dua danau lainnya yaitu Danau Tamblingan dan Danau Buyan, yang merupakan gugusan danau kembar di dalam sebuah kaldera besar, Danau Bratan terbilang cukup istimewa.
                Berada di jalur jalan provinsi yang menghubungkan Denpasar-Singaraja serta letaknya yang dekat dengan Kebun Raya Eka Karya menjadikan tempat ini menjadi salah satu andalan wisata pulau Bali. Disamping mudah dijangkau Danau Bratan juga menyediakan beragam pesona dan akomodasi yang memadai. 
                Di tengah danau terdapat sebuah pura yaitu Pura Ulun Danu, yang merupakan tempat pemujaan kepada Sang Hyang Dewi Danu sebagai pemberi kesuburan.';

        $bromo = 'Gunung Bromo atau dalam bahasa Tengger dieja "Brama", juga disebut Kaldera Tengger, adalah sebuah gunung berapi aktif di Jawa Timur, Indonesia.
        Gunung ini memiliki ketinggian 2.329 meter di atas permukaan laut dan berada dalam empat wilayah kabupaten, yakni Kabupaten Probolinggo, Kabupaten Pasuruan, Kabupaten Lumajang, dan Kabupaten Malang.
        Gunung Bromo terkenal sebagai objek wisata utama di Jawa Timur. Sebagai sebuah objek wisata, Bromo menjadi menarik karena statusnya sebagai gunung berapi yang masih aktif. Gunung Bromo termasuk dalam kawasan Taman Nasional Bromo Tengger Semeru.';

        $nusa = 'Nusa Penida adalah sebuah pulau (=nusa) bagian dari negara Republik Indonesia yang terletak di sebelah tenggara Bali yang dipisahkan oleh Selat Badung.
        Di dekat pulau ini terdapat juga pulau-pulau kecil lainnya yaitu Nusa Ceningan dan Nusa Lembongan. Perairan pulau Nusa Penida terkenal dengan kawasan selamnya di antaranya terdapat di Crystal Bay, Manta Point, Batu Meling, Batu Lumbung, Batu Abah, Toyapakeh dan Malibu Point.';

        $dubai = 'Dubai (/duːˈbaɪ/ doo-by; bahasa Arab: دبي, translit. Dubayy [dʊˈbajj]) adalah kota terpadat di negara Uni Emirat Arab dan merupakan ibukota Emirat Dubai.
        Kota ini terletak di sepanjang pantai tenggara Jazirah Arab dan di selatan teluk Persia, Kotamadya Dubai disebut Kota Dubai untuk membedakannya dari Emirat Dubai. Dubai adalah salah satu tujuan pariwisata paling populer di dunia.[5]
        Kota ini memiliki hotel bintang lima terbanyak kedua di dunia[6] dan juga bangunan tertinggi di dunia, Burj Khalifa.[7]';

        $departuredDate = Carbon::today()->addDays(30);

        $datas = [
            [
                'title' => 'Trip To Bratan',
                'slug' => 'trip-to-bratan',
                'location' => 'Bali, Indonesia',
                'about' => $bratan,
                'featured_event' => 'Tidur di Bratan',
                'language' => 'Bahasa Bali',
                'foods' => 'Beratan Kuduk',
                'departured_date' => $departuredDate,
                'duration' => '7 Days, 6 Night',
                'type' => 'Open Trip',
                'price' => '100',
                'additional_visa' => '25'
            ],
            [
                'title' => 'Trip To Nusa',
                'slug' => 'trip-to-nusa',
                'location' => 'Bali, Indonesia',
                'about' => $nusa,
                'featured_event' => 'Tidur di Nusa Peninda',
                'language' => 'Bahasa Indonesia',
                'foods' => 'Bebek Bengil',
                'departured_date' => $departuredDate,
                'duration' => '7 Days, 6 Night',
                'type' => 'Open Trip',
                'price' => '110',
                'additional_visa' => '25'
            ],
            [
                'title' => 'Trip To Dubai',
                'slug' => 'trip-to-dubai',
                'location' => 'Dubai, Uni Emirat Arab',
                'about' => $dubai,
                'featured_event' => 'Tidur di Dubai',
                'language' => 'Bahasa Indonesia',
                'foods' => 'Sate Lilit',
                'departured_date' => $departuredDate,
                'duration' => '7 Days, 6 Night',
                'type' => 'Open Trip',
                'price' => '150',
                'additional_visa' => '100'
            ],
            [
                'title' => 'Trip To Bromo',
                'slug' => 'trip-to-bromo',
                'location' => 'Malang, Indonesia',
                'about' => $bromo,
                'featured_event' => 'Tidur di Bromo',
                'language' => 'Bahasa Jawa',
                'foods' => 'Nasi Jinggo',
                'departured_date' => $departuredDate,
                'duration' => '7 Days, 6 Night',
                'type' => 'Open Trip',
                'price' => '130',
                'additional_visa' => '20'
            ]
        ];

        foreach ($datas as $data) {
            TravelPackage::create($data);
        }
    }
}
