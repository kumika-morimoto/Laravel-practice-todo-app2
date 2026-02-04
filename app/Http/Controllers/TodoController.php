<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index()
    {
        $todos=Auth::user()->todos()->latest()->get();
        return view ('todos.index',compact('todos'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:255',
        ],[
            'title.required'=>'タイトル未入力です',
            'title.max'=>'タイトルは255文字以内までです',
        ]);

        Todo::create([
            'user_id'=>Auth::id(),
            'title'=>$request->title,
            'is_completed'=>false,
            'is_important'=>false,
        ]);
        return redirect('/todos')
        ->with('success','ToDoを追加しました')
        ->with('comment','＜頑張ってタスクを完了しましょう！＞');
    }
    public function toggle($id){
        $todo=Todo::where('id',$id)->where('user_id',Auth::id())->firstOrFail();
        $todo->is_completed=!$todo->is_completed;
        $todo->save();
        return redirect('/todos')
        ->with('success','完了状態を更新しました');
    }
    public function toggleImportant($id){
        $todo=Todo::where('id',$id)->where('user_id',Auth::id())->firstOrFail();
        $todo->is_important=!$todo->is_important;
        $todo->save();
        return redirect()->back();
    }
    public function edit($id){
        $todo=Todo::where('id',$id)->where('user_id',Auth::id())->firstOrFail();
        return view('todos.edit',compact('todo'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'title'=>'required|max:255',
        ],[
            'title.required'=>'タイトル未入力です',
            'title.max'=>'タイトルは255文字以内までです',
        ]);
        $todo=Todo::where('id',$id)->where('user_id',Auth::id())->firstOrFail();
        $todo->title=$request->title;
        $todo->save();
        return redirect('/todos')
        ->with('success','ToDoを更新しました')
        ->with('comment','＜引き続き頑張りましょう！＞');
    }
    public function destroy($id){
        $todo=Todo::where('id',$id)->where('user_id',Auth::id())->firstOrFail();
        $todo->delete();
        return redirect('/todos')->with('success','ToDoを削除しました');
    }
}