<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class Todo extends Eloquent
{

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('created_at', 'updated_at');
    protected $visible = array('id', 'title', 'completed');

    protected $fillable = array('title', 'completed');

    public static function getAll()
    {

        $todos = Todo::All();
        return array("todos" => $todos);

    }

    public static function storeTodo($title)
    {

        $todo = new Todo;

        $todo->title = $title;
        $todo->completed = false;

        $result = $todo->save();

        if ($result) {
            $data = array(
                'id' => $todo->id,
                'title' => $todo->title,
                'completed' => $todo->completed
            );
            $message = 'Todo saved';
            return self::buildSuccessResponse($message, $data);

        }

        return self::badRequest();

    }


    public static function editTodo($id, $title, $completed)
    {
        $todo = Todo::find($id);

        $todo->title = $title;
        $todo->completed = $completed;

        $result = $todo->save();

        if ($result) {
            $message = 'Todo updated';
            return self::buildSuccessResponse($message);
        }

        return self::badRequest();

    }


    public static function destroyEntry($id)
    {
        $deleted = Todo::destroy($id);

        if ($deleted == 1) {
            $message = 'Todo deleted';
            return self::buildSuccessResponse($message);

        }

        return self::badRequest();
    }


    private static function buildSuccessResponse ($message, $data = NULL ) {
        $response = array(
            'meta' => array(
                'success' => true,
                'message' => $message
            )
        );
        if($data){
            $response['todo'] = $data;
        }
        return $response;
    }


    private static function badRequest()
    {
        return Response::json(array(
            'code'      =>  400,
            'message'   =>  'invalid data'
        ), 400);
    }



}
