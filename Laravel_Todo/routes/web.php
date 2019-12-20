<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () {
    return view('home');
});




Route::get('/thanhcong', function (){
   dd('thanh cong.....');

   });

Route::get('/user/{id}/post/{post}', function($id, $idPost) {
    return "This is post $idPost of user $id"; 
});

Route::get('user/{id?}', function($id = null) {
    if ($id == null) {
        return 'Ko có id';
    }
    
    return "User $id";
});

Route::get('user/{id}', function ($id) {
   return 'User'.$id;

   });

//tạo nhóm
 Route::group([
 'prefix' => 'task'

 	],function(){
 		Route::delete('/dan/{id}',function($id){
	return redirect('/');
})->name('todo.task.delete');

 	});
//bài tập 
 Route::group([
 'prefix' => 'task'

  ],function(){
    Route::get('/task/complete',function(){
  return redirect('/');
})->name('todo.task.complete');

    Route::get('/lamlai/{id}',function($id){
  return redirect('/');
})->name('todo.task.reset');

      });

//bài unit3

 Route::get('/hello2', function(){
 return view('hello2',[
  'name' => ' dan euro',
  'year' => 1998

  ]);

 });
 Route::get('/hello1', function(){
 return view('hello1');

 });
 Route::get('/sub/hello1', function(){
 return view('hello.hello1');

 });
 Route::get('/sub/hello2', function(){
 return view('hello.hello2',[
  'name' => ' dan euro',
  'year' => 1998

  ]);

 });

 Route::get('/hello1',function(){
  return view('hello1')->with('name','Đan euro');

 });

 Route::get('/sub/hello2',function(){
 return view('hello2')->with([
        'name' => 'Đan euro',
        'year' => 1998
    ]);
 });

 Route::get('/sub/hello2',function(){
// $content ='<b>Đan</b>';
// return view('hello2')->with('content',$content);

  $records =['1','2'];
  return view('hello2')->with('records',$records);

 });

 Route::get('/layout/home',function(){
  return view('layouts/home');
 });

//  //bài tập unit 3
//   Route::get('/profile',function(){
//     return view('profile')->with([
//       'username' => 'Đỗ Duy Đan',
//       'year' => 1998 ,
//       'school' => 'ĐHQGHN',
//       'que' => 'Hải Phòng'


//       ]);
//   });

//    Route::get('/list',function(){


//   $list = [
//         [
//             'name' => 'Học View trong Laravel',
//             'status' => 0
//         ],
//         [
//             'name' => 'Học Route trong Laravel',
//             'status' => 1
//         ],
        
//         [
//             'name' => 'Làm bài tập View trong Laravel',
//             'status' => -1
//         ],
//     ];
//   return view('list')->with('list',$list);

//  });

  Route::get('/','HomeController@index');
  Route::get('/page/{page?}', 'HomeController@page');
  Route::get('/Setting','SettingController@index');
  // Route::get('/Setting1','Admin\SettingController@index');

  // Route::get('/Setting2','Admin\Test\SettingController@index');

  // Route::namespace('Admin')->group(function(){
  // Route::get('/Setting1','SettingController@index');

  // Route::get('/Dashboard','DashboardController@index');
  // });

  Route::group([
    'namespace' =>'Admin'
    ],function(){


Route::get('/Setting1','SettingController@index');

  Route::get('/Dashboard','DashboardController@index');
  });

Route::delete('/destroy/{id}','Frontend\TaskController@delete')->name('todo.task.destroy');

// Route::resource('task', 'Frontend\TaskController');

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('task/create', 'Frontend\TaskController@create')->name('task.create');
Route::post('task', 'Frontend\TaskController@store')->name('task.store');
Route::get('task', 'Frontend\TaskController@index')->name('task.index');
Route::get('task/{task}','Frontend\TaskController@show')->name('task.show');
Route::match(['put','patch'], 'task/{task}', 'Frontend\TaskController@update')->name('task.update');
Route::get('task/{task}/edit', 'Frontend\TaskController@edit')->name('task.edit');