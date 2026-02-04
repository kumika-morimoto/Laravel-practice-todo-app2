<!-- resources/views/todos/index.blade.php -->
@extends('layout')

@section('title','ToDo一覧')

@section('content')
    @include('components.messages')
    <h2>あなたのToDo一覧</h2>

    <div class="todo-form-container">
        <form action="/todos" method="POST">
            @csrf
            <input class="todo-form-control" type="text" name="title" placeholder="やることリストを入力してください" value="{{old('title')}}";>
            <button class="enter-button" type="submit">追加</button>
        </form>
    </div>

    <div class="todo-list-container">
        <ul>
            @forelse($todos as $todo)
            <li class="todo-item">
                <form method="POST" action="/todos/{{$todo->id}}/toggle">
                    @csrf
                    @method('PATCH')
                    <input type="checkbox" class="todo-checkbox" onchange="this.form.submit()" {{$todo->is_completed ?'checked':''}}>
                </form>
                <form method="POST" action="{{route('todos.toggleImportant', $todo->id)}}">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="star-button">
                        {{$todo->is_important ?'★':'☆'}}
                    </button>
                </form>

                {{$todo->title}}
                @if($todo->is_completed)
                <span class="completed-badge">[完了！]</span>
                @endif
                <a class="edit-link" href="/todos/{{$todo->id}}/edit">編集</a>
                
                <form method="POST" action="/todos/{{$todo->id}}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="delete-button" type="submit" onclick="return confirm('削除しますか？')">削除</button>
                </form>
            </li>
            @empty
            <p>ToDoがまだ登録されてません。</p>
            @endforelse
        </ul>
    </div>
@endsection