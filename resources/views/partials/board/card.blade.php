<link href="{{ asset('/css/common.css') }}" rel="stylesheet">

  <article class="board-card" data-id="{{ $board->id }}">
  <a href="{{ url('/board/' . $board->id) }}">
      <h2 class="board-name"> {{ $board->name }} </h2>
  </a>
    <!-- Meter aqui um link para o board-component -->
  </article>
