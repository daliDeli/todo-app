<?php

namespace App\Http\Controllers;

use App\Services\CheckUser;
use App\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTodoRequest;

class TodosController extends Controller
{
    private $CheckUser;

    function __construct()
    {
        $this->CheckUser = new CheckUser();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Todo::where('user', $userId)->get();
        return $this->CheckUser->getTodo();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTodoRequest $request)
    {
        $todo = $this->CheckUser->createTodo($request->all());

        return response($todo, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $this->validate($request, [
            'id' => 'number|required'
        ]);

        return $this->CheckUser->getTodoByID($request->id);

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTodoRequest $request, $id)
    {

        $data = $request->all();
        $data['id'] = $id;

        $todo = $this->CheckUser->updateTodo($data);

        return response($todo, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $todoId
     * @return \Illuminate\Http\Response
     */
    public function destroy($todoId)
    {// use findOrFail()


        $todo = $this->CheckUser->deleteTodo($todoId);
        if($todo){
            $todo->delete();
            return response($todo, 200);
        }

        return response($todo, 404);



        // Todo::findOrFail($todo->$id)->delete();


    }
}
