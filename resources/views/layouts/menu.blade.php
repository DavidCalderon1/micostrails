<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-users"></i><span class="nav-label">Users</span></a>
</li>

<li class="{{ Request::is('usersAddresses*') ? 'active' : '' }}">
    <a href="{!! route('usersAddresses.index') !!}"><i class="fa fa-address-card-o"></i><span class="nav-label">Users Addresses</span></a>
</li>

<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-key"></i><span class="nav-label">Roles</span></a>
</li>

<li class="{{ Request::is('typeVehicles*') ? 'active' : '' }}">
    <a href="{!! route('typeVehicles.index') !!}"><i class="fa fa-list-ol"></i><span class="nav-label">Type Vehicles</span></a>
</li>

<li class="{{ Request::is('vehicles*') ? 'active' : '' }}">
    <a href="{!! route('vehicles.index') !!}"><i class="fa fa-car"></i><span class="nav-label">Vehicles</span></a>
</li>

<li class="{{ Request::is('cities*') ? 'active' : '' }}">
    <a href="{!! route('cities.index') !!}"><i class="fa fa-map-o"></i><span class="nav-label">Cities</span></a>
</li>

<li class="{{ Request::is('statuses*') ? 'active' : '' }}">
    <a href="{!! route('statuses.index') !!}"><i class="fa fa-check-square-o"></i><span class="nav-label">Statuses</span></a>
</li>

<li class="{{ Request::is('storages*') ? 'active' : '' }}">
    <a href="{!! route('storages.index') !!}"><i class="fa fa-industry"></i><span class="nav-label">Storages</span></a>
</li>

<li class="{{ Request::is('products*') ? 'active' : '' }}">
    <a href="{!! route('products.index') !!}"><i class="fa fa-archive"></i><span class="nav-label">Products</span></a>
</li>

<li class="{{ Request::is('providers*') ? 'active' : '' }}">
    <a href="{!! route('providers.index') !!}"><i class="fa fa-handshake-o"></i><span class="nav-label">Providers</span></a>
</li>

<li class="{{ Request::is('purchases*') ? 'active' : '' }}">
    <a href="{!! route('purchases.index') !!}"><i class="fa fa-money"></i><span class="nav-label">Purchases</span></a>
</li>

<li class="{{ Request::is('orders*') ? 'active' : '' }}">
    <a href="{!! route('orders.index') !!}"><i class="fa fa-share-square-o"></i><span class="nav-label">Orders</span></a>
</li>