<link href="{{ asset('/css/board.css') }}" rel="stylesheet">

<article class="task-card" data-id="{{ $task->id }}">
  <header>
    <a href="{{ url('/task/' . $task->id) }}">
      <h2 class="task-name">    
        <i class="fa fa-grip-lines"></i>
        {{ $task->name}} 
      </h2>
    </a>
    <!--<h3 class="task-description"> {{$task->description}} </h3>-->
  </header>
</article>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js" defer></script>
<script src="/js/project/tasks-sortable.js" defer> </script>
