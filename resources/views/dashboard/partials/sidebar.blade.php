@inject('request', 'Illuminate\Http\Request')

<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                    <img alt="image" class="img img-responsive img-logo" src="{{ asset('backend_assets/img/logo.png') }}" style="-webkit-filter: drop-shadow(1px 1px 12px #fff); filter: drop-shadow(1px 1px 12px #fff);" />
                     </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"></a>
                    <span class="clear"></span> <span class="block m-t-xs text-center"> <strong class="font-bold" style="color:#fff">UCE</strong>
                    </span> 
                </div>
                <div class="logo-element">
                    UCE
                </div>
            </li>

            <li class="{{ (Request::is('dashboard'))? 'active' : '' }}" >
                <a href="{{ route('dashboard') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dasboard</span></a>
            </li>

            <li class="{{ (Request::is('clients') || $request->segment(1) == 'add_client' || $request->segment(1) == 'edit_client')? 'active' : '' }}">
                <a href="#"><i class="fa fa-users" aria-hidden="true"></i><span class="nav-label">Clients</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ (Request::is('clients'))? 'active' : '' }}" >
                        <a href="{{ route('clients')}}">All Clients</a>
                    </li>
                    <li class="{{ (Request::is('add_client'))? 'active' : '' }}" >
                        <a href="{{ route('add_client')}}">Add New</a>
                    </li>
                    
                </ul>
            </li>

            <li class="{{ (Request::is('orders') || $request->segment(1) == 'add_order' || $request->segment(1) == 'edit_order')? 'active' : '' }}">
                <a href="#"><i class="fa fa-table" aria-hidden="true"></i><span class="nav-label">Orders</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ (Request::is('orders'))? 'active' : '' }}" >
                        <a href="{{ route('orders')}}">All Orders</a>
                    </li>
                    <li class="{{ (Request::is('add_order'))? 'active' : '' }}" >
                        <a href="{{ route('add_order')}}">Add New</a>
                    </li>
                    
                </ul>
            </li>

            <li class="{{ (Request::is('productions') || $request->segment(1) == 'add_production' || $request->segment(1) == 'edit_production')? 'active' : '' }}">
                <a href="#"><i class="fa fa-star" aria-hidden="true"></i><span class="nav-label">Production</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ (Request::is('productions'))? 'active' : '' }}" >
                        <a href="{{ route('productions')}}">Production</a>
                    </li>
                    <li class="{{ (Request::is('add_production'))? 'active' : '' }}" >
                        <a href="{{ route('add_production')}}">Add New</a>
                    </li>
                    
                </ul>
            </li>

            <li class="{{ (Request::is('productions') || $request->segment(1) == 'add_production' || $request->segment(1) == 'edit_production')? 'active' : '' }}">
                <a href="#"><i class="fa fa-star" aria-hidden="true"></i><span class="nav-label">Recieving/Cleaning</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ (Request::is('productions'))? 'active' : '' }}" >
                        <a href="{{ route('productions')}}">Recieving/Cleaning</a>
                    </li>
                    <li class="{{ (Request::is('add_production'))? 'active' : '' }}" >
                        <a href="{{ route('add_production')}}">Add New</a>
                    </li>
                    
                </ul>
            </li>

            <li class="{{ (Request::is('transactions') || $request->segment(1) == 'add_transaction' || $request->segment(1) == 'transaction')? 'active' : '' }}">
                <a href="#"><i class="fa fa-cog" aria-hidden="true"></i><span class="nav-label">Settings</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    {{-- <li class="{{ (Request::is('transactions'))? 'active' : '' }}" >
                        <a href="{{ route('transactions')}}">Threads</a>
                    </li> --}}
                    <li>
                        <a href="#">Threads<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="{{ route('threads')}}">All Threads</a>
                            </li>
                            
                        </ul>
                    </li>
                    
                </ul>
            </li>

                        
            
        </ul>
    </div>
</nav>