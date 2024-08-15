<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Todo::create([
            "todo" => "Compelete technical documentation for Vtech",
            "is_completed" => false
        ]);

        Todo::create([
            "todo" => "Develop and Debug the Vtech-todolist",
            "is_completed" => false
        ]);

        Todo::create([
            "todo" => "Deploy vtech-todolist to GCP",
            "is_completed" => false
        ]);
    }
}
