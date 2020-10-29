<?php

use Illuminate\Database\Seeder;

class RealHotelListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('hotels')->delete();

        \DB::table('hotels')->insert(array (
            0 =>
            array (
                'id' => 17,
                'hotel_name' => 'Ellswerth Cuttings',
                'hotel_email' => 'ecuttings0@cafepress.com',
              // 'phone' => '927-157-8145',
                'hotel_location' => '105 Kropf Avenue',
                'hotel_image' => 'https://images.pexels.com/photos/338504/pexels-photo-338504.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260',
                // 'longitude' => 74.4084733,
                // 'latitude' => 31.5689437,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'id' => 18,
                'hotel_name' => 'Wilton Bacchus',
                'hotel_email' => 'wbacchus1@ameblo.jp',
                // 'phone' => '822-299-5316',
                'hotel_location' => '5120 Schiller Crossing',
                'hotel_image' => 'https://images.pexels.com/photos/1458457/pexels-photo-1458457.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500',
                // 'longitude' => 74.3975118,
                // 'latitude' => 31.5565128,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'id' => 19,
                'hotel_name' => 'Moreen Autrie',
                'hotel_email' => 'mautrie2@businessinsider.com',
                // 'phone' => '233-261-4295',
                'hotel_location' => '360 Lakewood Circle',
                'hotel_image' => 'https://images.pexels.com/photos/1386168/pexels-photo-1386168.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
                // 'longitude' => 74.3993637,
                // 'latitude' => 31.5573682,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 =>
            array (
                'id' => 20,
                'hotel_name' => 'Joane Clerke',
                'hotel_email' => 'jclerke3@about.me',
                // 'phone' => '854-315-8252',
                'hotel_location' => '84 Vahlen Pass',
                'hotel_image' => 'https://images.pexels.com/photos/2394446/pexels-photo-2394446.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500',
                // 'longitude' => 74.4017972,
                // 'latitude' => 31.5597671,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 =>
            array (
                'id' => 21,
                'hotel_name' => 'Denice Mease',
                'hotel_email' => 'dmease4@elegantthemes.com',
                // 'phone' => '419-336-9413',
                'hotel_location' => '9293 Elgar Junction',
                'hotel_image' => 'https://images.pexels.com/photos/2540653/pexels-photo-2540653.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
                // 'longitude' => 74.3945268,
                // 'latitude' => 31.5649515,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 =>
            array (
                'id' => 22,
                'hotel_name' => 'Maximo Macieiczyk',
                'hotel_email' => 'mmacieiczyk5@stanford.edu',
                // 'phone' => '988-774-0374',
                'hotel_location' => '8122 Loeprich Lane',
                'hotel_image' => 'https://images.pexels.com/photos/3285716/pexels-photo-3285716.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500',
                // 'longitude' => 74.4040478,
                // 'latitude' => 31.5666545,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 =>
            array (
                'id' => 23,
                'hotel_name' => 'Rhoda Spittal',
                'hotel_email' => 'rspittal6@live.com',
                // 'phone' => '525-639-9885',
                'hotel_location' => '450 Farmco Crossing',
                'hotel_image' => 'https://images.pexels.com/photos/3075763/pexels-photo-3075763.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
                // 'longitude' => 74.4031113,
                // 'latitude' => 31.5670675,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 =>
            array (
                'id' => 24,
                'hotel_name' => 'Jerad Angliss',
                'hotel_email' => 'jangliss7@cocolog-nifty.com',
                // 'phone' => '180-109-8288',
                'hotel_location' => '1470 Barnett Road',
                'hotel_image' => 'https://images.pexels.com/photos/2867903/pexels-photo-2867903.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500',
                // 'longitude' => 74.3923061,
                // 'latitude' => 31.5684959,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 =>
            array (
                'id' => 25,
                'hotel_name' => 'Polly Emblin',
                'hotel_email' => 'pemblin8@omniture.com',
                // 'phone' => '273-767-5415',
                'hotel_location' => '5053 Jenna Trail',
                'hotel_image' => 'https://images.pexels.com/photos/1135380/pexels-photo-1135380.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
                // 'longitude' => 74.398497,
                // 'latitude' => 31.5698297,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 =>
            array (
                'id' => 26,
                'hotel_name' => 'Avis Metzig',
                'hotel_email' => 'ametzig9@webs.com',
                // 'phone' => '928-979-1982',
                'hotel_location' => '5609 Merchant Drive',
                'hotel_image' => 'https://images.pexels.com/photos/164595/pexels-photo-164595.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
                // 'longitude' => 74.4065071,
                // 'latitude' => 31.5674701,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 =>
            array (
                'id' => 27,
                'hotel_name' => 'Reed Sawdon',
                'hotel_email' => 'rsawdona@vinaora.com',
                // 'phone' => '595-196-9096',
                'hotel_location' => '33 Quincy Court',
                'hotel_image' => 'http://dummyimage.com/381x302.jpg/ff4444/ffffff',
                // 'longitude' => 74.408151,
                // 'latitude' => 31.5641786,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 =>
            array (
                'id' => 28,
                'hotel_name' => 'Imogen Drinnan',
                'hotel_email' => 'idrinnanb@who.int',
                // 'phone' => '964-942-4423',
                'hotel_location' => '185 Drewry Circle',
                'hotel_image' => 'http://dummyimage.com/354x400.jpg/dddddd/000000',
                // 'longitude' => 74.4025463,
                // 'latitude' => 31.473741,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 =>
            array (
                'id' => 29,
                'hotel_name' => 'Larisa Elmar',
                'hotel_email' => 'lelmarc@free.fr',
                // 'phone' => '421-960-2362',
                'hotel_location' => '5981 4th Place',
                'hotel_image' => 'http://dummyimage.com/323x369.jpg/5fa2dd/ffffff',
                // 'longitude' => 74.4021603,
                // 'latitude' => 31.4738106,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 =>
            array (
                'id' => 30,
                'hotel_name' => 'Filberte Blaydon',
                'hotel_email' => 'fblaydond@pagesperso-orange.fr',
                // 'phone' => '137-105-9645',
                'hotel_location' => '0 Lukken Drive',
                'hotel_image' => 'http://dummyimage.com/349x360.jpg/cc0000/ffffff',
                // 'longitude' => 74.4016828,
                // 'latitude' => 31.4735766,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 =>
            array (
                'id' => 31,
                'hotel_name' => 'Felisha Siggins',
                'hotel_email' => 'fsigginse@hatena.ne.jp',
                // 'phone' => '734-141-5835',
                'hotel_location' => '7887 Ludington Alley',
                'hotel_image' => 'http://dummyimage.com/305x368.jpg/cc0000/ffffff',
                // 'longitude' => 74.4012708,
                // 'latitude' => 31.4743586,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));


    }
}
