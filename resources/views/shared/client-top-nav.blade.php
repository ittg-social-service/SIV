<div class="navbar-fixed main-navbar">
  <nav class="z-depth-1 top-nav">
    <div class="nav-wrapper">
      <a href="{{ url('/') }}" class="brand-logo hide-on-large-only">
        <img src="/img/logo_white.png" alt="">
      </a>
      <div class="row hide-on-med-and-down">
        <div class="col m10">
          <form class="row">
            <div class="input-field col m12">
              <input id="search" type="search" required>
              <label for="search"><i class="material-icons search-icon">search</i></label>
              <i class="material-icons">close</i>
            </div>
          </form>
        </div>
        <div class="col m2">
          <div class="row">
            <div class="col m12  map-client-opts  dropdown-button " data-activates='dropdown1'>
              <div class='row'>
                <div class="col m4 ">
                  <img src="{{ Auth::user()->avatar }}" alt="" class=left"">
                </div>
                <div class="col m2">
                    <i class="tiny material-icons">settings</i>
                </div>
              </div>
              <!-- Dropdown Structure -->
              <ul id='dropdown1' class='dropdown-content'>
                <li>
                   <a class="lime-text accent-3" href="{{ url('/client/settings') }}">Settings</a>
                </li>
                <li class="divider"></li>
                <li>
                   <a class="lime-text accent-3" href="{{ url('/logout') }}">Logout</a>
                </li>
              </ul>
              </div>
            </div>
          </div>
      </div>
      <a href="#" data-activates="out" class="button-collapse red-text"><i class="material-icons">menu</i></a>

    </div>
  </nav>
</div> 
