@extends('layouts.master') 
@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thêm công việc mới
            </div>

            <div class="panel-body">
                <!-- Display Validation Errors -->

            <!-- New Task Form -->
                <form action="{{route('task.store')}}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <!-- Task Name -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Tên công việc</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                            <!-- <input type="text" name="name1" id="task-name" class="form-control" value="{{ old('task') }}">
                            <input type="text" name="name2" id="task-name" class="form-control" value="{{ old('task') }}"> -->
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Mô tả công việc</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                            
                        </div>
                    </div> -->

                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>Thêm công việc
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Current Tasks -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách công việc hiện tại
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                    <th>Tên công việc</th>
                    <th>Nội dung</th>
                    <th>Deadline</th>
                    <th>&nbsp;</th>
                    </thead>
                    <tbody>
                    
                    @foreach($tasks as $task)


                   

                    <tr> 
                   

                        <td class="table-text"><div> {{ $task->name}} </div></td>
                        <td class="table-text"><div> 
                        @if($task->status==1)
                                Đã hoàn thành
                             @else($task->status==0)
                                Chưa hoàn thành
                        @endif 
                            </div></td>
                        <td class="table-text"><div> {{ $task->deadline}} </div></td>
                        <!-- Task Complete Button -->
                        <td>
                            <a href="{{ route('todo.task.complete', 3) }}" type="submit" class="btn btn-success">
                                <i class="fa fa-btn fa-check"></i>Sửa
                        </td>
                        <td>
                            <a href="{{ route('todo.task.complete', 3) }}" type="submit" class="btn btn-success">
                                <i class="fa fa-btn fa-check"></i>Hoàn thành
                            </a>
                        </td>

                        <!-- Task Delete Button -->
                        <td>
                            <form action="{{route('todo.task.destroy', $task->id)}}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-btn fa-trash"></i>Xoá
                                </button>
                            </form>
                        </td>

                    </tr>



                    @endforeach

                   <!--  <tr>
                        <td class="table-text"><div>Làm bài tập Laravel </div></td>
                        
                        <td>
                            <a href="{{ route('todo.task.complete', 3) }}" type="submit" class="btn btn-success">
                                <i class="fa fa-btn fa-check"></i>Hoàn thành
                            </a>
                        </td>
                       
                        <td>
                            <form action="{{ route('todo.task.complete', 1) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-btn fa-trash"></i>Xoá
                                </button>
                            </form>
                        </td>
                    </tr> -->
                    <!-- <tr>
                        <td class="table-text"><div>Làm bài tập PHP  </div></td>
                        
                        <td>
                            <a href="{{ route('todo.task.complete', 3) }}" type="submit" class="btn btn-success">
                                <i class="fa fa-btn fa-check"></i>Hoàn thành
                            </a>
                        </td>
                        
                        <td>
                            <form action="{{ url('task/2') }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-btn fa-trash"></i>Xoá
                                </button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-text"><div><strike>Làm project Laravel </strike></div></td>
                        
                        <td>
                            <a href="{{ route('todo.task.reset', 1) }}" type="submit" class="btn btn-success">
                                <i class="fa fa-btn fa-refresh"></i>Làm lại
                            </a>
                        </td>
                        
                        <td>
                            <form action="{{ route('todo.task.delete', 1)}}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-btn fa-trash"></i>Xoá
                                </button>
                            </form>
                        </td>
                    </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- JavaScripts -->
