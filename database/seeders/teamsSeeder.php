<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class teamsSeeder extends Seeder
{
    public function run()
    {
        DB::table('teams')->insert([
            'id' => 1,
            'user_id' => 1,
            'name' => 'grasbaku@gmail.com\'s Team',
            'personal_team' => 1,
            'created_at' => '2024-09-30 03:06:56',
            'updated_at' => '2024-09-30 03:06:56',
        ]);
        DB::table('teams')->insert([
            'id' => 2,
            'user_id' => 1,
            'name' => 'Schroeder-Gutmann',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 3,
            'user_id' => 2,
            'name' => 'Klocko-Schmidt',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 4,
            'user_id' => 3,
            'name' => 'Robel Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 5,
            'user_id' => 4,
            'name' => 'Torphy Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 6,
            'user_id' => 5,
            'name' => 'Lemke, McCullough and Tromp',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 7,
            'user_id' => 6,
            'name' => 'DuBuque, Hills and Dietrich',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 8,
            'user_id' => 7,
            'name' => 'Kutch, Pouros and Hills',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 9,
            'user_id' => 8,
            'name' => 'Herzog LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 10,
            'user_id' => 9,
            'name' => 'Spencer Group',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 11,
            'user_id' => 10,
            'name' => 'Wilderman-Feil',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 12,
            'user_id' => 11,
            'name' => 'Dicki, Denesik and O\'Kon',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 13,
            'user_id' => 12,
            'name' => 'Hilpert-Simonis',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 14,
            'user_id' => 13,
            'name' => 'Morar-Watsica',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 15,
            'user_id' => 14,
            'name' => 'Padberg Group',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 16,
            'user_id' => 15,
            'name' => 'Bartoletti, Fahey and Block',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 17,
            'user_id' => 16,
            'name' => 'Zulauf LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 18,
            'user_id' => 17,
            'name' => 'O\'Reilly, Dickens and King',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 19,
            'user_id' => 18,
            'name' => 'Murazik Group',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 20,
            'user_id' => 19,
            'name' => 'Tromp-Upton',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 21,
            'user_id' => 20,
            'name' => 'Deckow, Sanford and Vandervort',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 22,
            'user_id' => 21,
            'name' => 'Hamill-Schuster',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 23,
            'user_id' => 22,
            'name' => 'Howe, Klocko and Marvin',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 24,
            'user_id' => 23,
            'name' => 'Fay-Jerde',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 25,
            'user_id' => 24,
            'name' => 'Toy, Berge and Langworth',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 26,
            'user_id' => 25,
            'name' => 'Harber, Schiller and Hauck',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 27,
            'user_id' => 26,
            'name' => 'Ryan-Moore',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 28,
            'user_id' => 27,
            'name' => 'Jacobs, Ledner and Wisozk',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 29,
            'user_id' => 28,
            'name' => 'Williamson-Kohler',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 30,
            'user_id' => 29,
            'name' => 'Dare-Jacobi',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 31,
            'user_id' => 30,
            'name' => 'Lemke Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 32,
            'user_id' => 31,
            'name' => 'Green LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 33,
            'user_id' => 32,
            'name' => 'Farrell-Mueller',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 34,
            'user_id' => 33,
            'name' => 'Koelpin LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 35,
            'user_id' => 34,
            'name' => 'Ullrich LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 36,
            'user_id' => 35,
            'name' => 'Harris-Lindgren',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 37,
            'user_id' => 36,
            'name' => 'Kessler-Kuhn',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 38,
            'user_id' => 37,
            'name' => 'Padberg-Streich',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 39,
            'user_id' => 38,
            'name' => 'Cormier, Brown and Schoen',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 40,
            'user_id' => 39,
            'name' => 'Brown-Russel',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 41,
            'user_id' => 40,
            'name' => 'Conroy, Hilpert and Hudson',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 42,
            'user_id' => 41,
            'name' => 'Luettgen Group',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 43,
            'user_id' => 42,
            'name' => 'Cormier Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 44,
            'user_id' => 43,
            'name' => 'Hayes-Rempel',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 45,
            'user_id' => 44,
            'name' => 'Keeling-Kautzer',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 46,
            'user_id' => 45,
            'name' => 'Rolfson-Cronin',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 47,
            'user_id' => 46,
            'name' => 'Schinner PLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 48,
            'user_id' => 47,
            'name' => 'Rippin, Bartell and D\'Amore',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 49,
            'user_id' => 48,
            'name' => 'Torphy, Mills and Bednar',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 50,
            'user_id' => 49,
            'name' => 'Satterfield and Sons',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 51,
            'user_id' => 50,
            'name' => 'Gerhold, Nolan and Hudson',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 52,
            'user_id' => 51,
            'name' => 'Boehm, Schmidt and Brekke',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 53,
            'user_id' => 52,
            'name' => 'Dare-Hermann',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 54,
            'user_id' => 53,
            'name' => 'Abbott Group',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 55,
            'user_id' => 54,
            'name' => 'Balistreri, Cronin and Price',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 56,
            'user_id' => 55,
            'name' => 'Steuber Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 57,
            'user_id' => 56,
            'name' => 'Kessler-Marvin',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 58,
            'user_id' => 57,
            'name' => 'Bins PLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 59,
            'user_id' => 58,
            'name' => 'Homenick PLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 60,
            'user_id' => 59,
            'name' => 'Waelchi-Kihn',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 61,
            'user_id' => 60,
            'name' => 'Miller-Kunde',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 62,
            'user_id' => 61,
            'name' => 'Beatty, Leffler and Barton',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 63,
            'user_id' => 62,
            'name' => 'Simonis LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 64,
            'user_id' => 63,
            'name' => 'Pouros PLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 65,
            'user_id' => 64,
            'name' => 'Spinka Group',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 66,
            'user_id' => 65,
            'name' => 'Hickle-Kulas',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 67,
            'user_id' => 66,
            'name' => 'Haag-Tromp',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 68,
            'user_id' => 67,
            'name' => 'Conroy-Nikolaus',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 69,
            'user_id' => 68,
            'name' => 'Wolf-McGlynn',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 70,
            'user_id' => 69,
            'name' => 'Gorczany, Little and Prosacco',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 71,
            'user_id' => 70,
            'name' => 'Wintheiser PLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 72,
            'user_id' => 71,
            'name' => 'Russel and Sons',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 73,
            'user_id' => 72,
            'name' => 'Bradtke, Murray and Hill',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 74,
            'user_id' => 73,
            'name' => 'Ortiz Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 75,
            'user_id' => 74,
            'name' => 'McDermott-Schmeler',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 76,
            'user_id' => 75,
            'name' => 'Spencer-Larkin',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 77,
            'user_id' => 76,
            'name' => 'Schowalter-Johns',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 78,
            'user_id' => 77,
            'name' => 'Hahn-Schoen',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 79,
            'user_id' => 78,
            'name' => 'Schuster, Moore and Littel',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 80,
            'user_id' => 79,
            'name' => 'Blanda, Stehr and Glover',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 81,
            'user_id' => 80,
            'name' => 'Schneider-Gerhold',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 82,
            'user_id' => 81,
            'name' => 'Torp, Schiller and Stark',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 83,
            'user_id' => 82,
            'name' => 'Lang, Kunde and Keeling',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 84,
            'user_id' => 83,
            'name' => 'Boyer-Schumm',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 85,
            'user_id' => 84,
            'name' => 'Marquardt-Keebler',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 86,
            'user_id' => 85,
            'name' => 'Marvin-Shields',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 87,
            'user_id' => 86,
            'name' => 'Block Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 88,
            'user_id' => 87,
            'name' => 'Dibbert PLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 89,
            'user_id' => 88,
            'name' => 'Lesch Group',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 90,
            'user_id' => 89,
            'name' => 'O\'Keefe-Fritsch',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 91,
            'user_id' => 90,
            'name' => 'Considine PLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 92,
            'user_id' => 91,
            'name' => 'Leffler, Runte and Bruen',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 93,
            'user_id' => 92,
            'name' => 'Kub, Grant and Marquardt',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 94,
            'user_id' => 93,
            'name' => 'Olson-Upton',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 95,
            'user_id' => 94,
            'name' => 'Herman PLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 96,
            'user_id' => 95,
            'name' => 'Simonis-Funk',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 97,
            'user_id' => 96,
            'name' => 'Ryan, Johns and Crooks',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 98,
            'user_id' => 97,
            'name' => 'Lindgren-Krajcik',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 99,
            'user_id' => 98,
            'name' => 'Leuschke Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 100,
            'user_id' => 99,
            'name' => 'Weber Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 101,
            'user_id' => 100,
            'name' => 'Funk-Abernathy',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 102,
            'user_id' => 101,
            'name' => 'Hilpert, Willms and Wiza',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 103,
            'user_id' => 102,
            'name' => 'Ankunding, Raynor and Nolan',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 104,
            'user_id' => 103,
            'name' => 'Mayer-Hamill',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 105,
            'user_id' => 104,
            'name' => 'Schneider-Parisian',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 106,
            'user_id' => 105,
            'name' => 'McDermott, Goodwin and Schuster',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 107,
            'user_id' => 106,
            'name' => 'Lakin Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 108,
            'user_id' => 107,
            'name' => 'Halvorson, Abernathy and Breitenberg',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 109,
            'user_id' => 108,
            'name' => 'Walsh-Stroman',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 110,
            'user_id' => 109,
            'name' => 'Greenfelder, Bashirian and Pollich',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 111,
            'user_id' => 110,
            'name' => 'Quigley LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 112,
            'user_id' => 111,
            'name' => 'Corwin Group',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 113,
            'user_id' => 112,
            'name' => 'Rowe, Larkin and Klocko',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 114,
            'user_id' => 113,
            'name' => 'Mayert Group',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 115,
            'user_id' => 114,
            'name' => 'Beier-Hermiston',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 116,
            'user_id' => 115,
            'name' => 'Bradtke, Spencer and Heathcote',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 117,
            'user_id' => 116,
            'name' => 'Beer-Graham',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 118,
            'user_id' => 117,
            'name' => 'Cruickshank PLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 119,
            'user_id' => 118,
            'name' => 'Heidenreich Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 120,
            'user_id' => 119,
            'name' => 'Collins, Stanton and Waters',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 121,
            'user_id' => 120,
            'name' => 'Corwin-Weber',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 122,
            'user_id' => 121,
            'name' => 'Kreiger LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 123,
            'user_id' => 122,
            'name' => 'Schmeler LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 124,
            'user_id' => 123,
            'name' => 'Jacobs-Larson',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 125,
            'user_id' => 124,
            'name' => 'Jakubowski, Goodwin and Leffler',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 126,
            'user_id' => 125,
            'name' => 'Dietrich-Emard',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 127,
            'user_id' => 126,
            'name' => 'Leuschke-Pollich',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 128,
            'user_id' => 127,
            'name' => 'Swaniawski, Kulas and Hilpert',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 129,
            'user_id' => 128,
            'name' => 'Wiza-Lind',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 130,
            'user_id' => 129,
            'name' => 'Bailey-Jacobson',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 131,
            'user_id' => 130,
            'name' => 'Jones Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 132,
            'user_id' => 131,
            'name' => 'Runolfsdottir-Dickinson',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 133,
            'user_id' => 132,
            'name' => 'Fritsch PLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 134,
            'user_id' => 133,
            'name' => 'Gutmann Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 135,
            'user_id' => 134,
            'name' => 'Gibson-Kub',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 136,
            'user_id' => 135,
            'name' => 'Tromp, Langosh and Ledner',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 137,
            'user_id' => 136,
            'name' => 'Jerde-Schowalter',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 138,
            'user_id' => 137,
            'name' => 'Hills, McDermott and McGlynn',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 139,
            'user_id' => 138,
            'name' => 'Kuvalis Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 140,
            'user_id' => 139,
            'name' => 'Lueilwitz-Maggio',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 141,
            'user_id' => 140,
            'name' => 'Rowe Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 142,
            'user_id' => 141,
            'name' => 'Koss, Parker and Lubowitz',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 143,
            'user_id' => 142,
            'name' => 'Nikolaus, Johnston and Harris',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 144,
            'user_id' => 143,
            'name' => 'Wilderman LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 145,
            'user_id' => 144,
            'name' => 'Green, Jenkins and Parisian',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 146,
            'user_id' => 145,
            'name' => 'Bednar, Kuphal and Rodriguez',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 147,
            'user_id' => 146,
            'name' => 'Marquardt, Klein and Prosacco',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 148,
            'user_id' => 147,
            'name' => 'Morissette-Maggio',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 149,
            'user_id' => 148,
            'name' => 'Morissette, Corkery and Davis',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 150,
            'user_id' => 149,
            'name' => 'Bergstrom, Gulgowski and Harris',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 151,
            'user_id' => 150,
            'name' => 'Farrell Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 152,
            'user_id' => 151,
            'name' => 'Luettgen and Sons',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 153,
            'user_id' => 152,
            'name' => 'Stokes, Williamson and Beer',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 154,
            'user_id' => 153,
            'name' => 'Nienow and Sons',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 155,
            'user_id' => 154,
            'name' => 'Lueilwitz-Willms',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 156,
            'user_id' => 155,
            'name' => 'Witting-Parker',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 157,
            'user_id' => 156,
            'name' => 'Bruen-Nicolas',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 158,
            'user_id' => 157,
            'name' => 'Price Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 159,
            'user_id' => 158,
            'name' => 'Casper, Erdman and Morar',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 160,
            'user_id' => 159,
            'name' => 'Klein, Gerlach and Hintz',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 161,
            'user_id' => 160,
            'name' => 'Stiedemann-Douglas',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 162,
            'user_id' => 161,
            'name' => 'Kassulke Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 163,
            'user_id' => 162,
            'name' => 'Schmeler Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 164,
            'user_id' => 163,
            'name' => 'Jaskolski Group',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 165,
            'user_id' => 164,
            'name' => 'Carroll, Greenholt and Bode',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 166,
            'user_id' => 165,
            'name' => 'Sipes and Sons',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 167,
            'user_id' => 166,
            'name' => 'Haley LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 168,
            'user_id' => 167,
            'name' => 'Kuvalis-Rodriguez',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 169,
            'user_id' => 168,
            'name' => 'Wolf-Sipes',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 170,
            'user_id' => 169,
            'name' => 'Prohaska PLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 171,
            'user_id' => 170,
            'name' => 'Wilderman, Langosh and O\'Reilly',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 172,
            'user_id' => 171,
            'name' => 'Mohr LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 173,
            'user_id' => 172,
            'name' => 'Ledner Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 174,
            'user_id' => 173,
            'name' => 'Walker, Koss and Jenkins',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 175,
            'user_id' => 174,
            'name' => 'Sanford, Brown and Turner',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 176,
            'user_id' => 175,
            'name' => 'Langworth-Wolf',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 177,
            'user_id' => 176,
            'name' => 'Witting-Kilback',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 178,
            'user_id' => 177,
            'name' => 'Wiza, Balistreri and Morissette',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 179,
            'user_id' => 178,
            'name' => 'Kris Group',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 180,
            'user_id' => 179,
            'name' => 'Crona Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 181,
            'user_id' => 180,
            'name' => 'Blanda-Gutmann',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 182,
            'user_id' => 181,
            'name' => 'Considine, Hermiston and Schneider',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 183,
            'user_id' => 182,
            'name' => 'Kessler-Roob',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 184,
            'user_id' => 183,
            'name' => 'Huels Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 185,
            'user_id' => 184,
            'name' => 'Feest, Raynor and Abernathy',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 186,
            'user_id' => 185,
            'name' => 'Schoen-Moore',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 187,
            'user_id' => 186,
            'name' => 'Lynch-Feest',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 188,
            'user_id' => 187,
            'name' => 'Ebert PLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 189,
            'user_id' => 188,
            'name' => 'Hegmann PLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 190,
            'user_id' => 189,
            'name' => 'Treutel, Murazik and Schoen',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 191,
            'user_id' => 190,
            'name' => 'Mosciski Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 192,
            'user_id' => 191,
            'name' => 'Keebler LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 193,
            'user_id' => 192,
            'name' => 'Smith-D\'Amore',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 194,
            'user_id' => 193,
            'name' => 'Carter-Runte',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 195,
            'user_id' => 194,
            'name' => 'Doyle PLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 196,
            'user_id' => 195,
            'name' => 'Schowalter, Schinner and Denesik',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 197,
            'user_id' => 196,
            'name' => 'Kassulke PLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 198,
            'user_id' => 197,
            'name' => 'Halvorson and Sons',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 199,
            'user_id' => 198,
            'name' => 'Wehner Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 200,
            'user_id' => 199,
            'name' => 'Streich PLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 201,
            'user_id' => 200,
            'name' => 'Weimann, Kovacek and Legros',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 202,
            'user_id' => 201,
            'name' => 'Durgan, Barton and Reynolds',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 203,
            'user_id' => 202,
            'name' => 'O\'Hara, McGlynn and Metz',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 204,
            'user_id' => 203,
            'name' => 'Rogahn, Sanford and Heaney',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 205,
            'user_id' => 204,
            'name' => 'Pouros-Hartmann',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 206,
            'user_id' => 205,
            'name' => 'Parker, Ankunding and Nader',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 207,
            'user_id' => 206,
            'name' => 'Hill-Kovacek',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 208,
            'user_id' => 207,
            'name' => 'Veum, Quitzon and Wehner',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 209,
            'user_id' => 208,
            'name' => 'Hodkiewicz-O\'Hara',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 210,
            'user_id' => 209,
            'name' => 'Hermann Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 211,
            'user_id' => 210,
            'name' => 'Kirlin-Little',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 212,
            'user_id' => 211,
            'name' => 'Collier-Nienow',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 213,
            'user_id' => 212,
            'name' => 'McDermott-Denesik',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 214,
            'user_id' => 213,
            'name' => 'Pagac and Sons',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 215,
            'user_id' => 214,
            'name' => 'Bailey and Sons',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 216,
            'user_id' => 215,
            'name' => 'Hodkiewicz-Emmerich',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 217,
            'user_id' => 216,
            'name' => 'Kunze Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 218,
            'user_id' => 217,
            'name' => 'Spinka-Greenholt',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 219,
            'user_id' => 218,
            'name' => 'Runolfsdottir and Sons',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 220,
            'user_id' => 219,
            'name' => 'Dickens-Watsica',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 221,
            'user_id' => 220,
            'name' => 'Padberg, Bauch and Reichert',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 222,
            'user_id' => 221,
            'name' => 'Mueller-Nicolas',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 223,
            'user_id' => 222,
            'name' => 'Nitzsche-Maggio',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 224,
            'user_id' => 223,
            'name' => 'Deckow LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 225,
            'user_id' => 224,
            'name' => 'Bins Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 226,
            'user_id' => 225,
            'name' => 'Crona, Osinski and Rau',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 227,
            'user_id' => 226,
            'name' => 'Ritchie, Walker and Kutch',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 228,
            'user_id' => 227,
            'name' => 'Feil Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 229,
            'user_id' => 228,
            'name' => 'Lesch-Koelpin',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 230,
            'user_id' => 229,
            'name' => 'Wuckert LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 231,
            'user_id' => 230,
            'name' => 'Schaefer-Morissette',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 232,
            'user_id' => 231,
            'name' => 'Sipes-Connelly',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 233,
            'user_id' => 232,
            'name' => 'Konopelski PLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 234,
            'user_id' => 233,
            'name' => 'Pouros, Schuster and Prosacco',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 235,
            'user_id' => 234,
            'name' => 'Barrows, Beer and Larkin',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 236,
            'user_id' => 235,
            'name' => 'Bashirian-White',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 237,
            'user_id' => 236,
            'name' => 'Schamberger Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 238,
            'user_id' => 237,
            'name' => 'Kerluke Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 239,
            'user_id' => 238,
            'name' => 'Marquardt-Rogahn',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 240,
            'user_id' => 239,
            'name' => 'Turner, Hermann and O\'Connell',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 241,
            'user_id' => 240,
            'name' => 'Spinka-Homenick',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 242,
            'user_id' => 241,
            'name' => 'Gleichner Group',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 243,
            'user_id' => 242,
            'name' => 'Abernathy PLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 244,
            'user_id' => 243,
            'name' => 'Gutkowski, Kohler and Gaylord',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 245,
            'user_id' => 244,
            'name' => 'Homenick-Reichel',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 246,
            'user_id' => 245,
            'name' => 'Prohaska, Gusikowski and Schamberger',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 247,
            'user_id' => 246,
            'name' => 'Murphy-Brakus',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 248,
            'user_id' => 247,
            'name' => 'Beahan-Pacocha',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 249,
            'user_id' => 248,
            'name' => 'Schaefer-Weber',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 250,
            'user_id' => 249,
            'name' => 'Mills Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 251,
            'user_id' => 250,
            'name' => 'Leannon Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 252,
            'user_id' => 251,
            'name' => 'Schuster-Predovic',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 253,
            'user_id' => 252,
            'name' => 'Stamm-Feeney',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 254,
            'user_id' => 253,
            'name' => 'Klocko PLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 255,
            'user_id' => 254,
            'name' => 'Paucek, Bernhard and Buckridge',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 256,
            'user_id' => 255,
            'name' => 'Terry LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 257,
            'user_id' => 256,
            'name' => 'Lehner, Ritchie and Klocko',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 258,
            'user_id' => 257,
            'name' => 'Schroeder, Osinski and Kunze',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 259,
            'user_id' => 258,
            'name' => 'Bartell, Dickens and Lind',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 260,
            'user_id' => 259,
            'name' => 'Kozey-Greenfelder',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 261,
            'user_id' => 260,
            'name' => 'Schneider-Robel',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 262,
            'user_id' => 261,
            'name' => 'Wilkinson, VonRueden and Marvin',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 263,
            'user_id' => 262,
            'name' => 'Cassin-Rowe',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 264,
            'user_id' => 263,
            'name' => 'Koepp, Kautzer and Bartoletti',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 265,
            'user_id' => 264,
            'name' => 'Hayes and Sons',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 266,
            'user_id' => 265,
            'name' => 'Pollich-Denesik',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 267,
            'user_id' => 266,
            'name' => 'Goyette LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 268,
            'user_id' => 267,
            'name' => 'Hill-Green',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 269,
            'user_id' => 268,
            'name' => 'Wilkinson PLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 270,
            'user_id' => 269,
            'name' => 'Okuneva-Conroy',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 271,
            'user_id' => 270,
            'name' => 'Vandervort, Carroll and Cummerata',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 272,
            'user_id' => 271,
            'name' => 'Heathcote LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 273,
            'user_id' => 272,
            'name' => 'Terry, Lueilwitz and Friesen',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 274,
            'user_id' => 273,
            'name' => 'Stracke, McKenzie and Klein',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 275,
            'user_id' => 274,
            'name' => 'Dibbert Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 276,
            'user_id' => 275,
            'name' => 'Waelchi and Sons',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 277,
            'user_id' => 276,
            'name' => 'Crona, Lang and Klocko',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 278,
            'user_id' => 277,
            'name' => 'Marks, Hoppe and Spinka',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 279,
            'user_id' => 278,
            'name' => 'Cruickshank-Witting',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 280,
            'user_id' => 279,
            'name' => 'Gerlach Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 281,
            'user_id' => 280,
            'name' => 'Ledner, Dibbert and Quigley',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 282,
            'user_id' => 281,
            'name' => 'O\'Kon and Sons',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 283,
            'user_id' => 282,
            'name' => 'Schiller-Heidenreich',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 284,
            'user_id' => 283,
            'name' => 'Kling Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 285,
            'user_id' => 284,
            'name' => 'Krajcik-Ebert',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 286,
            'user_id' => 285,
            'name' => 'Jacobson PLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 287,
            'user_id' => 286,
            'name' => 'Corkery-Koch',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 288,
            'user_id' => 287,
            'name' => 'Hegmann LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 289,
            'user_id' => 288,
            'name' => 'Hammes, Doyle and Trantow',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 290,
            'user_id' => 289,
            'name' => 'Paucek Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 291,
            'user_id' => 290,
            'name' => 'Reynolds-Kris',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 292,
            'user_id' => 291,
            'name' => 'Botsford-Franecki',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 293,
            'user_id' => 292,
            'name' => 'Klocko, Kertzmann and Bartoletti',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 294,
            'user_id' => 293,
            'name' => 'Lowe-Effertz',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 295,
            'user_id' => 294,
            'name' => 'Koch-Cassin',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 296,
            'user_id' => 295,
            'name' => 'Wyman, Walsh and Mann',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 297,
            'user_id' => 296,
            'name' => 'Adams Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 298,
            'user_id' => 297,
            'name' => 'Goldner-Ziemann',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 299,
            'user_id' => 298,
            'name' => 'Ziemann-Paucek',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 300,
            'user_id' => 299,
            'name' => 'Stark, Conroy and Runolfsdottir',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 301,
            'user_id' => 300,
            'name' => 'McKenzie-Towne',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 302,
            'user_id' => 301,
            'name' => 'Upton-O\'Keefe',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 303,
            'user_id' => 302,
            'name' => 'Block and Sons',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 304,
            'user_id' => 303,
            'name' => 'Halvorson-Breitenberg',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 305,
            'user_id' => 304,
            'name' => 'Friesen LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 306,
            'user_id' => 305,
            'name' => 'Schuppe Group',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 307,
            'user_id' => 306,
            'name' => 'Vandervort, Fay and Feeney',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 308,
            'user_id' => 307,
            'name' => 'Tromp and Sons',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 309,
            'user_id' => 308,
            'name' => 'Cronin-Macejkovic',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 310,
            'user_id' => 309,
            'name' => 'Goldner, Pouros and McCullough',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 311,
            'user_id' => 310,
            'name' => 'Rosenbaum-Hudson',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 312,
            'user_id' => 311,
            'name' => 'Romaguera, Kihn and Wintheiser',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 313,
            'user_id' => 312,
            'name' => 'Kuhn, Lindgren and Wolff',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 314,
            'user_id' => 313,
            'name' => 'Green Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 315,
            'user_id' => 314,
            'name' => 'O\'Connell-Stroman',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 316,
            'user_id' => 315,
            'name' => 'Haley Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 317,
            'user_id' => 316,
            'name' => 'Mosciski-Hilpert',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 318,
            'user_id' => 317,
            'name' => 'Pacocha-Durgan',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 319,
            'user_id' => 318,
            'name' => 'Smitham-Keeling',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 320,
            'user_id' => 319,
            'name' => 'Mann-Reilly',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 321,
            'user_id' => 320,
            'name' => 'Wolf-Cremin',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 322,
            'user_id' => 321,
            'name' => 'Watsica-Glover',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 323,
            'user_id' => 322,
            'name' => 'Block Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 324,
            'user_id' => 323,
            'name' => 'Bayer, Nitzsche and Gleichner',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 325,
            'user_id' => 324,
            'name' => 'Conroy, Predovic and Parisian',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 326,
            'user_id' => 325,
            'name' => 'Hoeger Group',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 327,
            'user_id' => 326,
            'name' => 'Weimann-Kuhic',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 328,
            'user_id' => 327,
            'name' => 'Rippin-Lang',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 329,
            'user_id' => 328,
            'name' => 'Simonis-Miller',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 330,
            'user_id' => 329,
            'name' => 'Wisozk LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 331,
            'user_id' => 330,
            'name' => 'Feeney, Mayer and Lehner',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 332,
            'user_id' => 331,
            'name' => 'Rolfson, Kohler and Thompson',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 333,
            'user_id' => 332,
            'name' => 'Reichert, Keebler and Murphy',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 334,
            'user_id' => 333,
            'name' => 'Koelpin, Mayer and Willms',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 335,
            'user_id' => 334,
            'name' => 'Yost-Beahan',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 336,
            'user_id' => 335,
            'name' => 'Wehner Group',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 337,
            'user_id' => 336,
            'name' => 'Roob-Littel',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 338,
            'user_id' => 337,
            'name' => 'Bednar and Sons',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 339,
            'user_id' => 338,
            'name' => 'Green, Strosin and Zboncak',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 340,
            'user_id' => 339,
            'name' => 'Turner and Sons',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 341,
            'user_id' => 340,
            'name' => 'Kunze, Yundt and Sanford',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 342,
            'user_id' => 341,
            'name' => 'Strosin, Torphy and Runte',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 343,
            'user_id' => 342,
            'name' => 'Spencer Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 344,
            'user_id' => 343,
            'name' => 'Bahringer, Kshlerin and Rohan',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 345,
            'user_id' => 344,
            'name' => 'Vandervort, Murray and Schimmel',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:30',
            'updated_at' => '2024-11-19 08:32:30',
        ]);
        DB::table('teams')->insert([
            'id' => 346,
            'user_id' => 345,
            'name' => 'Gusikowski Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 347,
            'user_id' => 346,
            'name' => 'Hegmann, Rowe and Schaden',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 348,
            'user_id' => 347,
            'name' => 'Jakubowski, Towne and McLaughlin',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 349,
            'user_id' => 348,
            'name' => 'Schaefer-Kulas',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 350,
            'user_id' => 349,
            'name' => 'Moore Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 351,
            'user_id' => 350,
            'name' => 'Larkin PLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 352,
            'user_id' => 351,
            'name' => 'Beier Group',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 353,
            'user_id' => 352,
            'name' => 'Lindgren Group',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 354,
            'user_id' => 353,
            'name' => 'Schiller, Schiller and Nolan',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 355,
            'user_id' => 354,
            'name' => 'Stark-Pacocha',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 356,
            'user_id' => 355,
            'name' => 'Kutch-Wisoky',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 357,
            'user_id' => 356,
            'name' => 'Okuneva Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 358,
            'user_id' => 357,
            'name' => 'Stamm Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 359,
            'user_id' => 358,
            'name' => 'Boyle-Waters',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 360,
            'user_id' => 359,
            'name' => 'Stehr LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 361,
            'user_id' => 360,
            'name' => 'Hand PLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 362,
            'user_id' => 361,
            'name' => 'Schiller, Konopelski and Kshlerin',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 363,
            'user_id' => 362,
            'name' => 'Pouros Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 364,
            'user_id' => 363,
            'name' => 'Ritchie, Mueller and Cremin',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 365,
            'user_id' => 364,
            'name' => 'Fahey and Sons',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 366,
            'user_id' => 365,
            'name' => 'Dare, Murazik and Jerde',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 367,
            'user_id' => 366,
            'name' => 'Casper-Nienow',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 368,
            'user_id' => 367,
            'name' => 'Gaylord PLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 369,
            'user_id' => 368,
            'name' => 'Sporer Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 370,
            'user_id' => 369,
            'name' => 'Shanahan PLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 371,
            'user_id' => 370,
            'name' => 'Vandervort-Daugherty',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 372,
            'user_id' => 371,
            'name' => 'Eichmann-Conn',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 373,
            'user_id' => 372,
            'name' => 'Cummings, Ryan and Larson',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 374,
            'user_id' => 373,
            'name' => 'Auer-Bins',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 375,
            'user_id' => 374,
            'name' => 'Von-Feeney',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 376,
            'user_id' => 375,
            'name' => 'Schinner, Bradtke and Rosenbaum',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 377,
            'user_id' => 376,
            'name' => 'Roberts LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 378,
            'user_id' => 377,
            'name' => 'Gulgowski Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 379,
            'user_id' => 378,
            'name' => 'Treutel, Macejkovic and Roob',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 380,
            'user_id' => 379,
            'name' => 'Hoppe and Sons',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 381,
            'user_id' => 380,
            'name' => 'Conn, Miller and Collins',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 382,
            'user_id' => 381,
            'name' => 'Jast-Crona',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 383,
            'user_id' => 382,
            'name' => 'Ziemann-Orn',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 384,
            'user_id' => 383,
            'name' => 'Littel-O\'Keefe',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 385,
            'user_id' => 384,
            'name' => 'Hoppe LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 386,
            'user_id' => 385,
            'name' => 'Brekke, Collins and Greenfelder',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 387,
            'user_id' => 386,
            'name' => 'Block-Rempel',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 388,
            'user_id' => 387,
            'name' => 'Lynch-Osinski',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 389,
            'user_id' => 388,
            'name' => 'Jacobs-Simonis',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 390,
            'user_id' => 389,
            'name' => 'West-Armstrong',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 391,
            'user_id' => 390,
            'name' => 'Bergnaum, Bayer and King',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 392,
            'user_id' => 391,
            'name' => 'Bauch, Kihn and Hansen',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 393,
            'user_id' => 392,
            'name' => 'Rowe and Sons',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 394,
            'user_id' => 393,
            'name' => 'Gutmann, Funk and Braun',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 395,
            'user_id' => 394,
            'name' => 'Gerlach Group',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 396,
            'user_id' => 395,
            'name' => 'Funk Group',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 397,
            'user_id' => 396,
            'name' => 'Fahey Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 398,
            'user_id' => 397,
            'name' => 'Spencer-Hand',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 399,
            'user_id' => 398,
            'name' => 'Howe and Sons',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 400,
            'user_id' => 399,
            'name' => 'Howell-Fahey',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 401,
            'user_id' => 400,
            'name' => 'Rohan, Schuster and Leuschke',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 402,
            'user_id' => 401,
            'name' => 'Pacocha, Schroeder and Gusikowski',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 403,
            'user_id' => 402,
            'name' => 'Simonis Group',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 404,
            'user_id' => 403,
            'name' => 'Hammes-Aufderhar',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 405,
            'user_id' => 404,
            'name' => 'DuBuque Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 406,
            'user_id' => 405,
            'name' => 'McKenzie Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 407,
            'user_id' => 406,
            'name' => 'Will-Thiel',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 408,
            'user_id' => 407,
            'name' => 'Gaylord, Botsford and Bashirian',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 409,
            'user_id' => 408,
            'name' => 'Zemlak Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 410,
            'user_id' => 409,
            'name' => 'Willms Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 411,
            'user_id' => 410,
            'name' => 'Keebler, Padberg and Kunde',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 412,
            'user_id' => 411,
            'name' => 'Baumbach, Dibbert and Wisozk',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 413,
            'user_id' => 412,
            'name' => 'Kertzmann, Schimmel and Anderson',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 414,
            'user_id' => 413,
            'name' => 'Renner, Collier and Metz',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 415,
            'user_id' => 414,
            'name' => 'Grimes-Mohr',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 416,
            'user_id' => 415,
            'name' => 'Jerde, Goodwin and Volkman',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 417,
            'user_id' => 416,
            'name' => 'Dooley, Lesch and Hermiston',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 418,
            'user_id' => 417,
            'name' => 'Dicki LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 419,
            'user_id' => 418,
            'name' => 'Prosacco LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 420,
            'user_id' => 419,
            'name' => 'Dietrich-Kuhn',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 421,
            'user_id' => 420,
            'name' => 'Torp-Conroy',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 422,
            'user_id' => 421,
            'name' => 'Stracke, Ferry and Gerlach',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 423,
            'user_id' => 422,
            'name' => 'Hermann PLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 424,
            'user_id' => 423,
            'name' => 'Kutch-Lueilwitz',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 425,
            'user_id' => 424,
            'name' => 'Connelly, Orn and Erdman',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 426,
            'user_id' => 425,
            'name' => 'Runolfsdottir, Swaniawski and Swift',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 427,
            'user_id' => 426,
            'name' => 'Lebsack Group',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 428,
            'user_id' => 427,
            'name' => 'Veum-Herman',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 429,
            'user_id' => 428,
            'name' => 'Roob LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 430,
            'user_id' => 429,
            'name' => 'Bode, Pfannerstill and Mertz',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 431,
            'user_id' => 430,
            'name' => 'Fisher and Sons',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 432,
            'user_id' => 431,
            'name' => 'Hagenes, Batz and Murazik',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 433,
            'user_id' => 432,
            'name' => 'Cronin, Morissette and Mayert',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 434,
            'user_id' => 433,
            'name' => 'Bahringer, Graham and Considine',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 435,
            'user_id' => 434,
            'name' => 'Koch, Kemmer and Wolf',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 436,
            'user_id' => 435,
            'name' => 'Crist, Trantow and Nikolaus',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 437,
            'user_id' => 436,
            'name' => 'Huel Group',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 438,
            'user_id' => 437,
            'name' => 'Beahan LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 439,
            'user_id' => 438,
            'name' => 'Bruen-Torphy',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 440,
            'user_id' => 439,
            'name' => 'Johnson, Wunsch and Gutmann',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 441,
            'user_id' => 440,
            'name' => 'Effertz, Kling and Abbott',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 442,
            'user_id' => 441,
            'name' => 'Price, Lesch and Hayes',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 443,
            'user_id' => 442,
            'name' => 'Christiansen-Pfannerstill',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 444,
            'user_id' => 443,
            'name' => 'Kshlerin-Sanford',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 445,
            'user_id' => 444,
            'name' => 'Ledner and Sons',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 446,
            'user_id' => 445,
            'name' => 'Dicki, Price and Kunde',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 447,
            'user_id' => 446,
            'name' => 'Cormier-Beatty',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 448,
            'user_id' => 447,
            'name' => 'Jaskolski-Murphy',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 449,
            'user_id' => 448,
            'name' => 'Cole, Schinner and O\'Connell',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 450,
            'user_id' => 449,
            'name' => 'Quitzon Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 451,
            'user_id' => 450,
            'name' => 'Runte, Wolff and Emard',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 452,
            'user_id' => 451,
            'name' => 'Schmeler, Fahey and Fadel',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 453,
            'user_id' => 452,
            'name' => 'Hermann, Pfeffer and Raynor',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 454,
            'user_id' => 453,
            'name' => 'Hammes Group',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 455,
            'user_id' => 454,
            'name' => 'McDermott Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 456,
            'user_id' => 455,
            'name' => 'Hamill, McLaughlin and Corwin',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 457,
            'user_id' => 456,
            'name' => 'Stracke-Weissnat',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 458,
            'user_id' => 457,
            'name' => 'Harvey, Langosh and Gutkowski',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 459,
            'user_id' => 458,
            'name' => 'Friesen, O\'Reilly and Mayert',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 460,
            'user_id' => 459,
            'name' => 'Parker, Mohr and Stehr',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 461,
            'user_id' => 460,
            'name' => 'Feil-Conn',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 462,
            'user_id' => 461,
            'name' => 'Quitzon Group',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 463,
            'user_id' => 462,
            'name' => 'Halvorson-Emmerich',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 464,
            'user_id' => 463,
            'name' => 'Stiedemann-Lebsack',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 465,
            'user_id' => 464,
            'name' => 'McGlynn-Barton',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 466,
            'user_id' => 465,
            'name' => 'Kautzer, Gleichner and Schneider',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 467,
            'user_id' => 466,
            'name' => 'Moen LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 468,
            'user_id' => 467,
            'name' => 'Lubowitz-D\'Amore',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 469,
            'user_id' => 468,
            'name' => 'McGlynn Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 470,
            'user_id' => 469,
            'name' => 'Yundt-Heaney',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 471,
            'user_id' => 470,
            'name' => 'Rolfson, Russel and Hyatt',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 472,
            'user_id' => 471,
            'name' => 'Rogahn, Kub and Roberts',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 473,
            'user_id' => 472,
            'name' => 'Hansen-Hills',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 474,
            'user_id' => 473,
            'name' => 'Aufderhar Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 475,
            'user_id' => 474,
            'name' => 'Kunze PLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 476,
            'user_id' => 475,
            'name' => 'Yost, Champlin and Schaefer',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 477,
            'user_id' => 476,
            'name' => 'Bogan-Streich',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 478,
            'user_id' => 477,
            'name' => 'Funk-Feil',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 479,
            'user_id' => 478,
            'name' => 'Bayer, Dietrich and O\'Conner',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 480,
            'user_id' => 479,
            'name' => 'Kassulke, Abshire and Jakubowski',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 481,
            'user_id' => 480,
            'name' => 'King, McClure and Veum',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 482,
            'user_id' => 481,
            'name' => 'Pfannerstill, Waters and Rempel',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 483,
            'user_id' => 482,
            'name' => 'Kuhn-Moen',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 484,
            'user_id' => 483,
            'name' => 'Daugherty, Kemmer and Fadel',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 485,
            'user_id' => 484,
            'name' => 'Hyatt LLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 486,
            'user_id' => 485,
            'name' => 'Ankunding, Doyle and Borer',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 487,
            'user_id' => 486,
            'name' => 'Welch, Batz and Franecki',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 488,
            'user_id' => 487,
            'name' => 'Dickinson, Bogisich and Mann',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 489,
            'user_id' => 488,
            'name' => 'Padberg, Schuppe and Schumm',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 490,
            'user_id' => 489,
            'name' => 'Dicki, Parisian and Lindgren',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 491,
            'user_id' => 490,
            'name' => 'Monahan, Mayer and Fritsch',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 492,
            'user_id' => 491,
            'name' => 'Roberts-Stark',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 493,
            'user_id' => 492,
            'name' => 'Renner, Johns and Quitzon',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 494,
            'user_id' => 493,
            'name' => 'Schimmel PLC',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 495,
            'user_id' => 494,
            'name' => 'Leuschke-Kuphal',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 496,
            'user_id' => 495,
            'name' => 'Conroy-Gusikowski',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 497,
            'user_id' => 496,
            'name' => 'Bernier, Littel and Ortiz',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 498,
            'user_id' => 497,
            'name' => 'Becker Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 499,
            'user_id' => 498,
            'name' => 'Grady Inc',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 500,
            'user_id' => 499,
            'name' => 'West Ltd',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 501,
            'user_id' => 500,
            'name' => 'Stanton-Ernser',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('teams')->insert([
            'id' => 502,
            'user_id' => 501,
            'name' => 'Dicki-Johnson',
            'personal_team' => 1,
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
    }
}
