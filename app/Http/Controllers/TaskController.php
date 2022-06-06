<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;
use App\Jobs\remindJob;
use App\Models\User;
use App\Notifications\RemindNotify;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{
    
    public function sendRemind()
    {
        return  $cron = Carbon::now()->format('i'). ' '. Carbon::now()->format('H') . ' ' . Carbon::now()->format('d') .' ' . Carbon::now()->format('m') .' * ';
         
        return $cron;
    }

    public function index()
    {
        return  TaskResource::collection(Task::paginate(3));
     
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

        return response($task, 201);
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

            return response($task, 201);
        
    }

   
    public function destroy($id)
    {

        $task = Task::where( 'id' , $id)->first();

        if (!$task)
         {
 
         return $this->returnError('002', 'لا يوجد بيانات');

         }else{

         $task->delete();
 
         return response($task, 201);
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
