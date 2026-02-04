@extends('layout')

@section('title','ToDo編集')

@section('content')
    @include('components.messages')
    <h2>ToDo編集</h2>

    <p class="todo-edit-instruction">Todoリスト内容を編集してください。</p>

    <div class="todo-form-container">
        <form action="/todos/{{$todo->id}}" method="POST">
            @csrf
            @method('PATCH')
            
            <input class="todo-form-edit-control" type="text" name="title" value="{{old('title',$todo->title)}}">
            <button class="enter-button" type="submit">更新</button>
        </form>
    </div>
@endsection