<h1>
    the list of tasks
</h1>


<div>
   <!--  @if (count($tasks)) -->
        @forelse($tasks as $task)
            <div>
                <a href="{{ route('task.show', ['id'=> $task->id]) }}">{{ $task->title}}</a>
            </div>
        @empty
            <div>there is no tasks!</div>
        @endforelse
<!--     @endif -->
</div>