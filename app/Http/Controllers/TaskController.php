<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {


        if (request('q') != null) { //si on un query dans notre requete
            $tasks['data'] = Task::where('name', 'like', '%' . request('q') . '%')->get(); //% avant ou apres
            //[data] clé da fait reference a la pagination
            return response()->json($tasks);
        } else {
            return $this->refresh();
        }

/*

        $tasks = Task::orderBy('created_at', 'DESC')->paginate(3); //On appelle notre model task/on recupere toute nos taches dans la base de donnée

        return response()->json($tasks); //renvoi sous format json
*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $task = Task::create($request->all()); //on creer une nouvelle donnée//On recupere la derniere task

        if ($task) {

            return $this->refresh();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        return response()->json($task); //en renvoi notre task /response pour pouvoir lexpoiolter en vue js
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $task = Task::find($id); //ON RECUPERE LA TACHE
        $task->name = request('name'); //ON LUI ATRIBUT LE NOUVEAU NOM DE LA REQUETE
        $task->save(); //je perscisyee n a base de donnée

        if ($task) {

            return $this->refresh();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        if ($task->delete()) { //si la tache est supprilmé
            return $this->refresh();
        } else {
            return response()->json(['error' => 'Destroy method has failed.'], 425);
        }
    }

    private function refresh()
    {
        $tasks = Task::orderBy('created_at', 'DESC')->paginate(4); //On appelle notre model task/on recupere toute nos taches dans la base de donnée

        return response()->json($tasks); //renvoi sous format json la liste des taches

    }
}
