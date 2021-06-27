<?php

namespace Database\Seeders;

use App\Models\AssetAssignment;
use Illuminate\Database\Seeder;

class AssetAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        AssetAssignment::factory(10)->create();
    }
}
