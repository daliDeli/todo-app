<?php

namespace App\Services;

class CheckUser
{
    public function getTodo(){

        return Todo::where('user', auth()->user()->id)->paginate(10);
    }

    public function createTodo($data){
        return  Todo::create($data);
    }

    public function getTodoByID($id){
        return Todo::findOrFail($id);
    }

    public function updateTodo($data){
        $todo = Todo::findOrFail($data['id']);
        $todo->update($data);
        return $todo;
    }

    public function deleteTodo($toDoID){
        $todo = Todo::where('user', auth()->user()->id)
            ->where('id', $toDoID)
            ->firstOrFail();
        return $todo->delete();


    }

}