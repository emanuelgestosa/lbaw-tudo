<link href="{{ asset('/css/common.css') }}" rel="stylesheet">

<a href="{{ url('/board/' . $board->id) }}">
  <article class="board-card" data-id="{{ $board->id }}">
    <header>
      <h2 class="board-name"> {{ $board->name }} </h2>
    </header>
    <!-- Meter aqui um link para o board-component -->
  </article>
</a>