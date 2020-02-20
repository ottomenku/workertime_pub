<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App\User::find(1) == null) {

            $users = [[1, 'Szuperadmin', 'root@dolgozo.com', null, '$2y$10$moXCPJnMVa//hlRNslZ5vuVTTXssTsbexEtgfoEAXl1STfqXlj8dK', null, null, null, null],
                [2, 'admin', 'admin@dolgozo.com', null, '$2y$10$jjvGKRlaxsu.dYfYA2u92u95IF1/FRY7U1jyNISLshkrcbh3BcbbG', null, null, null, null],
                [12, 'owner1', 'owner1@dolgozo.com', null, '$2y$10$rh//0rqHowxHZqDSMYUZNuK6hOnfQNz7Fsp4DRYkEHc17Lxiq6k/S', null, '2019-12-14 17:21:14', '2019-12-14 17:21:14', null],
                [13, 'owner2', 'owner2@dolgozo.com', null, '$2y$10$FJ0EXxMvvhVcSlMGitn92.7DEZBv4iRIejhzOONWX1kZh7Xhsj7tS', null, '2019-12-14 17:27:29', '2019-12-14 17:27:29', null],
                [14, 'owner3', 'owner3@dolgozo.com', null, '$2y$10$TF9L0Qly7Yla5HL4Xk8u/.s1ocl5zxKqBuCD40daa5YfwkjI18M1a', null, '2019-12-14 18:23:06', '2019-12-14 18:23:06', null],
                [20, 'ceg1worker1', 'ceg1worker1@dolgozo.com', null, '$2y$10$uSsBaKSHZKz6xrLOFUe7tOfwoI0z3bzZMT2I2LFiwkNxj.T/OYObK', null, '2019-12-15 20:27:07', '2019-12-15 20:38:07', null],
                [23, 'ceg1worker2', 'ceg1worker2@dolgozo.com', null, '$2y$10$cTZ1PNu66HGFMPdkQ.xn7OJ7bAcTAVpsciKDOojNF4afhiwb0K95.', null, '2020-01-13 02:23:46', '2020-01-13 02:23:46', null]];

            foreach ($users as $user) {
                DB::table('users')->insert([
                    'id' => $user[0],
                    'name' => $user[1],
                    'email' => $user[2],
                    'password' => bcrypt('aaaaaa'),
                ]);
            }; 
               
            $baseceg = ['id' => 1, 'user_id' => 1, 'cegnev' => 'base ceg'];
            $ceg1 = ['id' => 4, 'user_id' => 12, 'cegnev' => 'cég1'];
            App\Ceg::create($baseceg);
            App\Ceg::create($ceg1);
            $workers1 = ['id' => 4, 'user_id' => 20, 'ceg_id' => 4, 'fullname' => 'ceg1worker1', 'workername' => 'Worker1', 'birth' => '1975-11-11', 'start' => '2019-12-07'];
            App\Worker::create($workers1);

            $workers2 = ['id' => 5, 'user_id' => 23, 'ceg_id' => 4, 'fullname' => 'ceg1worker2', 'workername' => 'Worker2', 'birth' => '1975-11-11', 'start' => '2019-12-07'];
            App\Worker::create($workers2);

        } else {return true;}

    }
}
