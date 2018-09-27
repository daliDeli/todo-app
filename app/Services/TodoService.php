<?php

namespace App\Services;

class TodoService
{
    public function getTodos()
    {
        return Todo::where('user', auth()->user()->id)
            ->paginate(10);
    }

    public function createTodo($data)
    {
        return  Todo::create($data);
    }

    public function getTodoByID($id){
        return Todo::findOrFail($id);
    }

    public function updateTodo($data, $id){
        $todo = Todo::findOrFail($id);
        $todo->update($data);
        return $todo;
    }

    public function deleteTodo($todoId){
        $todo = Todo::where('user', auth()->user()->id)
            ->where('id', $todoId)
            ->firstOrFail();
        $todo->delete();
        return $todo;
    }

}