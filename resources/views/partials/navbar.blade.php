<ul class="nav navbar-nav">
  @if (Auth::check()&&Auth::user()->isAdmin())
    <li @if (Request::is('admin')) class="active" @endif>
      <a href="/admin">Home</a>
    </li>
    <li @if (Request::is('admin/applicants*')) class="active" @endif>
      <a href="/admin/applicants">Membership Applications</a>
    </li>
    <li @if (Request::is('admin/members*')) class="active" @endif>
      <a href="/admin/members">Members</a>
    </li>
    <li @if (Request::is('admin/applications*')) class="active" @endif>
      <a href="/admin/applications">Loan Applications</a>
    </li>
    <li @if (Request::is('admin/accounts*')) class="active" @endif>
      <a href="/admin/accounts">Accounts</a>
    </li>
    <li @if (Request::is('admin/loans*')) class="active" @endif>
      <a href="/admin/loans">Loans</a>
    </li>
  @endif
    @if (Auth::check()&&!Auth::user()->isAdmin())
    <li @if (Request::is('account*')) class="active" @endif>
      <a href="/account">Accounts</a>
    </li>
  @endif
</ul>

<ul class="nav navbar-nav navbar-right">
  @if (Auth::guest())
    <li><a href="/apply">Apply</a></li>
    <li><a href="/auth/login">Login</a></li>
  @else
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
         aria-expanded="false">
        @if(Auth::user()->isAdmin())
          Administrator
        @else
         {{Auth::user()->email}}
        @endif

        <span class="caret"></span>
      </a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="/auth/logout">Logout</a></li>
      </ul>
    </li>
  @endif
</ul>