<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//顯示所有任務的清單
Route::get('/', function () {
    return view('tasks');
});

// 增加新的任務
Route::post('/task', function (Request $request) {

    //驗證輸入
    $validator = Validator::make($request->all() , [
        'name' => 'required|max:255', //驗證規則
    ]);
    if ($validator->fails()) { //驗證失敗的處理
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    // 建立該任務...
    //新增任務存入DB的程式碼 (see next page)
    $task = new Task;
    $task->name = $request->name;
    $task->save();
    return redirect('/');
});

// 刪除任務
Route::delete('/task/{task}', function (Task $task) {
    //
});
