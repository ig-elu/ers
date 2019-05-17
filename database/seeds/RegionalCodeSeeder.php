<?php

use Illuminate\Database\Seeder;

class RegionalCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('request_regional_codes')->insert([
        [
            'code' => 'chinese',
            'name' => 'Chinese Language',
            'description' => '',
        ],
        [
            'code' => 'czech',
            'name' => 'Czech Language',
            'description' => '',
        ],
        [
            'code' => 'danish',
            'name' => 'Danish Language',
            'description' => '',
        ],
        [
            'code' => 'anzreg',
            'name' => 'English Language (ANZREG)',
            'description' => '',
        ],
        [
            'code' => 'canada',
            'name' => 'English Language (Canada)',
            'description' => '',
        ],
        [
            'code' => 'ireland',
            'name' => 'English Language (Ireland)',
            'description' => '',
        ],
        [
            'code' => 'uk',
            'name' => 'English Language (U.K.)',
            'description' => '',
        ],
        [
            'code' => 'usa',
            'name' => 'English Language (U.S.A.)',
            'description' => '',
        ],
        [
            'code' => 'finnish',
            'name' => 'Finnish Language',
            'description' => '',
        ],
        [
            'code' => 'french',
            'name' => 'French Language',
            'description' => '',
        ],
        [
            'code' => 'german',
            'name' => 'German Language',
            'description' => '',
        ],
        [
            'code' => 'hebrew',
            'name' => 'Hebrew Language',
            'description' => '',
        ],
        [
            'code' => 'italian',
            'name' => 'Italian Language',
            'description' => '',
        ],
        [
            'code' => 'norwegian',
            'name' => 'Norwegian Language',
            'description' => '',
        ],
        [
            'code' => 'polish',
            'name' => 'Polish Language',
            'description' => '',
        ],
        [
            'code' => 'portugese',
            'name' => 'Portugese Language',
            'description' => '',
        ],
        [
            'code' => 'spanish',
            'name' => 'Spanish Language',
            'description' => '',
        ],
        [
            'code' => 'sweedish',
            'name' => 'Sweedish Language',
            'description' => '',
        ],
        [
            'code' => 'other',
            'name' => 'Other Language',
            'description' => '',
        ]
    ]);  
    }
}
