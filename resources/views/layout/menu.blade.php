
    <div class="navbar-menu clearfix">
        <div class="vd_panel-menu hidden-xs">
            <span data-original-title="Expand All" data-toggle="tooltip" data-placement="bottom" data-action="expand-all" class="menu" data-intro="<strong>Expand Button</strong><br/>To expand all menu on left navigation menu." data-step=4>
                <i class="fa fa-sort-amount-asc"></i>
            </span>
        </div>
        <h3 class="menu-title hide-nav-medium hide-nav-small">{{ Auth::user()->name }}</h3>
        <div class="vd_menu">
            <ul>
                <li class="">
                    <a href="{{ route('quotes.index') }}">
                        <span class="menu-icon"><i class="fa fa-usd"></i></span>
                        <span class="menu-text">COTAÇÕES</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        <span class="menu-icon"><i class="fa fa-sign-out"></i></span>
                        <span class="menu-text">SAIR</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <div class="navbar-spacing clearfix"></div>
                        
                        