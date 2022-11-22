<link href="{{ asset('/css/board.css') }}" rel="stylesheet">

<article class="task-card" data-id="{{ $task->id }}">
<header>
  <h2 class="task-name"> • {{ $task->name}} </h2>
  <!--<h3 class="task-description"> {{$task->description}} </h3>-->
</header>
<!-- Meter aqui um link para o task-component -->
</article>
