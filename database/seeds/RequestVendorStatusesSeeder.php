<?php

use Illuminate\Database\Seeder;

class RequestVendorStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('request_vendor_statuses')->insert([
        [
            'code' => 'accept',
            'name' => 'Accepted',
            'description' => 'Request is accepted.',
        ],
        [
            'code' => 'reject',
            'name' => 'Rejected',
            'description' => 'Request is regjected.',
        ],
        [
            'code' => 'onhold',
            'name' => 'On Hold',
            'description' => 'Request is on hold.',
        ],
        [
            'code' => 'pending',
            'name' => 'Pending',
            'description' => 'Is pending implementation.',
        ],
        [
            'code' => 'implement',
            'name' => 'Implemented',
            'description' => 'Has been implemented.',
        ]
      ]);

    }
}
