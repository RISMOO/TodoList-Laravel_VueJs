<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Task::create([
            'name' => 'Coiffeur 15h, mardi 2 mars.',

        ]);
        App\Task::create([
            'name' => 'Dentiste 18h, lundi 1er mars.',

        ]);
        App\Task::create([
            'name' => 'Toilletage OUAF OUAF 15h, Mercredi 3 mars.' ,

        ]);
        App\Task::create([
            'name' => 'Radiologie 9h, Jeudi 4 mars.',

        ]);
        App\Task::create([
            'name' => 'Creer un TODOLIST, vendredi 5 mars.',

        ]);
        App\Task::create([
            'name' => 'Mami Toute la journée, samedi 6 mars.',

        ]);
        App\Task::create([
            'name' => 'Footing 9h ,dimanche 7 mars.',

        ]);
       



    }
    }


