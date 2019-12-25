<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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

        // $tasks = Task::all();
        // foreach ($tasks as $task){
        // echo $task->name;
        // }
         $tasks = Task::all();
         return view('home')->with([
            'tasks' => $tasks
        ]);


        // $tasks = Task::where('status', 1)
        //     ->orderBy('name', 'desc')
        //     ->take(5)
        //     ->get(); 
        // return view('home')->with([
        //     'tasks'=> $tasks

        //     ]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Lấy dữ liệu từ Form
        $name = $request->get('name');
        $deadline = $request->get('deadline');
        $content = $request->get('content');
        $status = $request->get('status');
        $priority=$request->get('priority');

        // Tạo dữ liệu mới 
        $task = new Task();
        $task->name = $name;
        $task->status = $status;
        $task->content = $content;
        $task->priority = $priority;
        // $task->update = null;

        // $task->content = $content;
        $task->deadline = $deadline;
        $task->save();
        return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $task = Task::find($id);
        // $task = Task::findorfail($id);
        // $task = Task::where('id', $id)->first();
        // dd($task->name);
        return view('show')->with([
            'task' => $task
        ]);
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
        $tasks= Task::add();
         return view('edit')->with([
            'task' => $task,
            'tasks' => $tasks
        ]);
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
         // Lấy dữ liệu từ Form
        $name = $request->get('name');
        $deadline = $request->get('deadline');
        $content = $request->get('content');
        $status = $request->get('status');
        $priority=$request->get('priority');
        

        // Cập nhật
        $task = Task::find($id);
        $task->name = $name;
        $task->status = $status;
        $task->content = $content;
        $task->deadline = $deadline;
        $task->priority = $priority;
        $task->save();
        return redirect()->route('home');
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
        $task->delete();
        return redirect()->route('home');
    }
    public function complete($id)
    {
        $task = Task::find($id);
        $task->status=2;
        $task->save();
        return redirect()->route('home');
    }
    public function reComplete($id)
    {
        $task = Task::find($id);
        $task->status=1;
        $task->save();
        return redirect()->route('home');
    }

//mở db của a lên
}
