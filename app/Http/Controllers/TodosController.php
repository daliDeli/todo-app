<?php

namespace App\Http\Controllers;

use App\Services\TodoService;
use App\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTodoRequest;

class TodosController extends Controller
{
    private $todoService;

    function __construct(TodoService $todo)
    {//not sure about this dependency injection
        $this->todoService = $todo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->todoService->getTodos();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTodoRequest $request)
    {
        return $this->todoService->createTodo($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return $this->todoService->getTodoByID($request->id);
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
        //http status from Response
        $data = $request->all();

        $todo = $this->todoService->updateTodo($data, $id);

        return response($todo, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $todoId
     * @return \Illuminate\Http\Response
     */
    public function destroy($todoId)
    {
        return $this->todoService->deleteTodo($todoId);
    }
}
