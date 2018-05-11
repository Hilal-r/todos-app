<?php

use Illuminate\Support\Facades\Input;

class TodosController extends \BaseController
{


    public function index()
    {
        $todos = Todo::getAll();
        return $todos;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {

        $todo = Input::get('todo');
        $title = $todo['title'];
        $result = Todo::storeTodo($title);
        return $result;

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $todo = Input::get('todo');
        $title = $todo['title'];
        $completed = $todo['completed'];

        $result = Todo::editTodo($id, $title, $completed);
        return $result;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {

        $todo = Todo::destroyEntry($id);

        return $todo;
    }

}
