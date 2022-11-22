<link href="{{ asset('/css/board.css') }}" rel="stylesheet">

<article class="task-card" data-id="{{ $task->id }}">
  <header>
    <a href="{{ url('/task/' . $task->id) }}">
      <h2 class="task-name"> • {{ $task->name}} </h2>
    </a>
    <!--<h3 class="task-description"> {{$task->description}} </h3>-->
  </header>
</article>