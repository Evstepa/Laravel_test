<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            [
                'name' => 'NEW',
                'display_name' => 'Новый'
            ],
            [
                'name' => 'IN_WORK',
                'display_name' => 'В работе'
            ],
            [
                'name' => 'FINISHED',
                'display_name' => 'Завершён'
            ],
        ]);
    }
}
