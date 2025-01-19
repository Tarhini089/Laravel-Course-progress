@extends('layouts.app')

@section('title', 'Add Task')

@section('content')
    <form method="POST" action="{{ route('tasks.store') }}"> 
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" />
        </div>
       
        <div>
            <lable for="description">Description</label>
            <textarea name="description" id="description" rows="5"></textarea>
        </div>

        <div>
            <lable for="long_description">long Description</label>
            <textarea name="long_description" id="long_description" rows="10"></textarea>
        </div>
        
        <div>
            <button type="submit">Add Task</button>
        </div>
    </form>
@endsection