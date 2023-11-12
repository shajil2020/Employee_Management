<?php

// database/seeders/CompanySeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 50 dummy records
        Company::factory(50)->create();
    }
}
