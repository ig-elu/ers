<?php

use Illuminate\Database\Seeder;

class RequestTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('request_types')->insert([
        [
            'code' => 'software',
            'name' => 'Software',
            'description' => 'Requests for software changes.',
        ],
        [
            'code' => 'content',
            'name' => 'Content',
            'description' => 'Requests for content changes.',
        ]
      ]);     

    }
}
