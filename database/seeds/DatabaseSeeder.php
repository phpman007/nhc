<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CandidateTypesTableSeeder::class);
        $this->call(ElectionsTableSeeder::class);
        $this->call(GendersTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(NgoGroupsTableSeeder::class);
        $this->call(NgoSectionsTableSeeder::class);
        $this->call(OrganizationGroupsTableSeeder::class);
        $this->call(ProvinceTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(SeniorGroupsTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(PointsTableSeeder::class);
    }
}
