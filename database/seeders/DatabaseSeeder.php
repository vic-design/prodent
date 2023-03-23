<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Specialization;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if(Status::all()->count() <= 0) {
            Status::factory(5)->create();
        }

        if(User::all()->count() <= 0) {
            User::factory(10)->create();
        }

        if(Specialization::all()->count() <= 0) {
            Specialization::factory(10)->create();
            Specialization::factory(10)->create();
            Specialization::factory(10)->create();
        }

        foreach (Specialization::all() as $item) {
            User::query()->inRandomOrder()->first()
                ->specializations()->attach($item->id);
        }

    }
}
