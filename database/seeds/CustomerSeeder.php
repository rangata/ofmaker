<?php

use Illuminate\Database\Seeder;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();

       for ($i =0; $i < 420; $i++ ) {
           $cust = new \App\Customers([
                'firstname' => $faker->name,
                'middlename' => $faker->lastName,
                'lastname' => $faker->lastName,
                'mobile' => $faker->phoneNumber,
                'email' => $faker->email,
                'city' => $faker->city,
           ]);
           $cust->save();
       }
    }
}
