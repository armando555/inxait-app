<?php

namespace Database\Seeders;

use App\Models\UserInxait;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new UserInxait();
        $user->setName('Armando5');
        $user->setLastName('Rios Gallego');
        $user->setCedula(11111111);
        $user->setState('Antioquia');
        $user->setCity('Medellin');
        $user->setPhone(33333333);
        $user->setEmail('armando5@gmail.com');
        $user->setHabeasData(true);
        $user->save();

        $user = new UserInxait();
        $user->setName('Armando1');
        $user->setLastName('Rios1 Gallego1');
        $user->setCedula(111111112);
        $user->setState('Antioquia');
        $user->setCity('Sonson');
        $user->setPhone(333333332);
        $user->setEmail('armando1@gmail.com');
        $user->setHabeasData(true);
        $user->save();

        $user = new UserInxait();
        $user->setName('Armando12');
        $user->setLastName('Rios12 Gallego12');
        $user->setCedula(1111111121);
        $user->setState('Antioquia');
        $user->setCity('Ebejico');
        $user->setPhone(3333333323);
        $user->setEmail('armando12@gmail.com');
        $user->setHabeasData(true);
        $user->save();


        $user = new UserInxait();
        $user->setName('Armando123');
        $user->setLastName('Rios123 Gallego123');
        $user->setCedula(11111111213);
        $user->setState('Antioquia');
        $user->setCity('Abejorral');
        $user->setPhone(33333333233);
        $user->setEmail('armando123@gmail.com');
        $user->setHabeasData(true);
        $user->save();

    }
}
