<?php

namespace App\Http\Controllers;
use App\Models\Assign;
use App\Models\Task;
use App\Models\Employees;
use Illuminate\Http\Request;

class AssignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['assign'] = Assign::join('employees','employees.id','=', 'assigns.employee_id')->join('tasks','tasks.id','=', 'assigns.task_id')->get(['employees.name', 'tasks.title', 'tasks.status','assigns.id', 'assigns.task_id']);
        //->join('city', 'city.state_id', '=', 'state.state_id')
        return view('assign.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
        $data['tasks'] = Task::where('status', 'Unassigned')->get();
        $data['employees'] = Employees::get();
        return view('assign.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $assign = new Assign();
        $assign->employee_id = $request->employee;
        $assign->task_id = $request->task;
        if($assign->save()){
            $task = Task::find($request->task);
            $task->status = 'Assigned';
            $task->update();
        };
        return redirect()->route('assign')->with('success', "Data saved successfully");
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function startstask($id)
    {
        $task = Task::find($id);
        $task->status = "In Progress";
        $task->update();
        return redirect()->route('assign')->with('success', "Data updated successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function finish_task($id)
    {
        $task = Task::find($id);
        $task->status = "Done";
        $task->update();
        return redirect()->route('assign')->with('success', "Data updated successfully");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeTask($id)
    {
        //
        $data['tasks'] = Task::where('status', 'Unassigned')->get();
        $data['employees'] = Employees::get();
        $data['assign'] = Assign::find($id);
        return view('assign.edit',  $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $assignData = Assign::find($id);
        if($assignData){
            $task = Task::find($assignData->task_id);
            $task->status = 'Unassigned';
            $task->update();
        }
        $assignData->employee_id = $request->employee;
        $assignData->task_id = $request->task;
        if($assignData->update()){
            $task = Task::find($request->task);
            $task->status = 'Assigned';
            $task->update();
        };
        return redirect()->route('assign')->with('success', "Data saved successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
