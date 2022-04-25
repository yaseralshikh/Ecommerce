<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class EntrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        // Create Roles
        $adminRoule = Role::create(['name' => 'admin','display_name' => 'Administration','description' => 'Administration','allowed_route' => 'admin',]);
        $supervisorRoule = Role::create(['name' => 'supervisor','display_name' => 'Supervisor','description' => 'Supervisor','allowed_route' => 'admin',]);
        $customerRoule = Role::create(['name' => 'customer','display_name' => 'Customer','description' => 'Customer','allowed_route' => null,]);

        // Create Users
        $admin = User::create(['first_name' => 'Admin','last_name' => 'System', 'username' => 'admin','email' => 'admin@ecommerce.test','email_verified_at' => now(),'mobile' => '966500000000','user_image' => 'avatar.svg','status' => '1','password' => bcrypt('123123123'),'remember_token' => Str::random(10),]);
        $admin->attachRole($adminRoule);

        $supervisor = User::create(['first_name' => 'Supervisor','last_name' => 'System', 'username' => 'supervisor','email' => 'supervisor@ecommerce.test','email_verified_at' => now(),'mobile' => '966500000001','user_image' => 'avatar.svg','status' => '1','password' => bcrypt('123123123'),'remember_token' => Str::random(10),]);
        $supervisor->attachRole($supervisorRoule);

        $customer = User::create(['first_name' => 'yaser','last_name' => 'alshikh', 'username' => 'yaser','email' => 'yaseralshikh@gmail.com','email_verified_at' => now(),'mobile' => '966500000002','user_image' => 'avatar.svg','status' => '1','password' => bcrypt('123123123'),'remember_token' => Str::random(10),]);
        $customer->attachRole($customerRoule);

        for ($i=1; $i <= 20 ; $i++) {
            $random_customer = User::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'username' => $faker->userName,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'mobile' => '96650' . $faker->numberBetween(1000000,9999999),
                'user_image' => 'avatar.svg',
                'status' => '1',
                'password' => bcrypt('123123123'),
                'remember_token' => Str::random(10),]);
            $random_customer->attachRole($customerRoule);
        }
    }
}
