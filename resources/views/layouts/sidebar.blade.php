<div class="col-sm-3 offset-sm-1 blog-sidebar">
  <div class="sidebar-module sidebar-module-inset">
    <h4>About</h4>
    <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
  </div>

  <div class="sidebar-module">
    <h4>Archives</h4>

    <ul>
      @foreach($archives as $month)
        <li>
          <a href="/?month={{$month['month']}}&year={{$month['year']}}">
            {{ $month['month'] . ' ' . $month['year'] }}
          </a>
        </li>
      @endforeach
    </ul>
  </div>

  <div class="sidebar-module">
    <h4>Tags</h4>

    <ul>
      @foreach($tags as $tag)
        <li>
          <a href="/posts/tags/{{$tag}}">
            {{ $tag }}
          </a>
        </li>
      @endforeach
    </ul>
  </div>

  <div class="sidebar-module">
    <h4>Elsewhere</h4>
    <ol class="list-unstyled">
      <li><a href="#">GitHub</a></li>
      <li><a href="#">Twitter</a></li>
      <li><a href="#">Facebook</a></li>
    </ol>
  </div>
</div><!-- /.blog-sidebar -->