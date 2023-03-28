<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name'=>'Andrea',
            'email'=>'Andrea@gmail.com',
            'password'=> Hash::make('12345678'),
            'is_admin'=> true,
            'is_revisor'=> true,
            'is_writer'=> true,
        ]);



        $categories = ['Storia Romana','Storia Vichinga','Storia Medievale','Curiosità Generali','Personaggi dell\'epoca'];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name'=>$category,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ]);
        }
    }
}
