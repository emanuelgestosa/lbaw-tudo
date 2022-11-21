<article class="vertical">
    @foreach ($vertical->tasks()->get() as $task)
        @include('partials.task.card',['task'=>$task])
    @endforeach
</article>
