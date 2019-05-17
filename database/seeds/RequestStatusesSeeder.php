<?php

use Illuminate\Database\Seeder;

class RequestStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('request_statuses')->insert([
        [
            'code' => 'new',
            'name' => 'New',
            'description' => 'Recently entered request.',
        ],
        [
            'code' => 'votable',
            'name' => 'Votable',
            'description' => 'Included in active vote.',
        ],
        [
            'code' => 'notvotable',
            'name' => 'Not Votable',
            'description' => 'Cannot be voted on.',
        ],
        [
            'code' => 'sentvendor',
            'name' => 'Sent to',
            'description' => 'Sent to vendor.',
        ],
        [
            'code' => 'avo',
            'name' => 'Already Voted On',
            'description' => 'Has been previously voted on.',
        ],
        [
            'code' => 'withdrawn',
            'name' => 'Withdrawn',
            'description' => 'Withdrawn for consideration.',
        ],
        [
            'code' => 'archived',
            'name' => 'Archived',
            'description' => 'Hidden in the archive.',
        ],
        [
            'code' => 'sentorg',
            'name' => 'Sent to Another',
            'description' => 'Sent to another organization.',
        ]
    ]);    
    }
}
