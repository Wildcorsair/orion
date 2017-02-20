<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
      <a class="navbar-brand" href="/">Orion</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Home</a></li>
        <li class="{{ Request::is('blog') ? 'active' : '' }}"><a href="/blog">Blog</a></li>
        <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="/contact">Contact</a></li>
        <li class="{{ Request::is('about') ? 'active' : '' }}"><a href="/about">About</a></li>
      </ul>
      <!--<form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Отправить</button>
      </form>-->
      @if (Auth::check())
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hello, {{ Auth::user()->name }} <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('posts.index') }}">Posts</a></li>
              <li><a href="{{ route('categories.index') }}">Categories</a></li>
              <li><a href="{{ route('tags.index') }}">Tags</a></li>
              <li class="divider"></li>
              <li><a href="{{ url('/logout') }}">Logout</a></li>
            </ul>
          </li>
        </ul>
      @else
        <div class="pull-right btn-login-spacing">
          <a href="{{ url('/login') }}" class="btn btn-default">Login</a>
        </div>
      @endif
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>