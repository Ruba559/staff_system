<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    
    public function index()
    {
        $task = Task::select('title' , 'specified_time')->paginate(3);
        
        return response()->json($task);
    }

    
    public function create()
    {
        //
    }


    public function getTaskById($id)
    {
        $task = Task::find($id);

        if (!$task)
        {

        return $this->returnError('002', 'not found');

        }
        
        return response()->json($task);
    }

    public function getTasksByUserId($id)
    {
        $task = Task::where('user_id' , $id)->select('title' , 'specified_time')->get();
        
        if (!$task)
        {

        return $this->returnError('002', 'not found');

        }

        return response()->json($task);
    }

   
    public function store(Request $request)
    {

        $validated = $request->validate([
            'title'=> 'required|max:191',
            'specified_time'=> 'nullable',
            'project_id'=> 'required',
            'user_id'=> 'required'
        ]);
        

        $task = Task::create([
            'title' => $request->title,
            'specified_time' => $request->specified_time,
            'project_id' => $request->project_id,
            'user_id' => $request->user_id,
           
        ]);
       
        $task->save();

        return $this -> returnSuccessMessage('Successful');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
       //

    }

  
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'title'=> 'required|max:191',
            'specified_time'=> 'nullable',
            'project_id'=> 'required',
            'user_id'=> 'required',
         ]);

        $task = Task::find($id);

        if (!$task)
        {

        return $this->returnError('002', 'not found');

        }

            $task->update($request->all());

        return $this -> returnSuccessMessage('Successful');
        
    }

   
    public function destroy($id)
    {

        $task = Task::where( 'id' , $id)->first();

        if (!$task)
         {
 
         return $this->returnError('002', 'لا يوجد بيانات');

         }else{

         $task->delete();
 
         return $this -> returnSuccessMessage('Successful' , '200');
         }
       
    }


    public function returnSuccessMessage($msg = "", $errNum = "S000")
    {
        return [
            'status' => true,
            'errNum' => $errNum,
            'msg' => $msg
        ];
    }

    public function returnError($errNum, $msg)
    {
        return response()->json([
            'status' => false,
            'errNum' => $errNum,
            'msg' => $msg
        ]);
    }
}
