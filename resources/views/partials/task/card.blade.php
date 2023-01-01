<link href="{{ asset('/css/board.css') }}" rel="stylesheet">

<article class="task-card" data-id="{{ $task->id }}">
  <header>
    <a href="{{ url('/task/' . $task->id) }}">
      <div class="task-container">
        <h2 class="task-name">
          {{ $task->name}}
        </h2>
      </div>
    </a>
    <!--<h3 class="task-description"> {{$task->description}} </h3>-->
  </header>
</article>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js" defer></script>
<script src="/js/project/tasks-sortable.js" defer> </script>
