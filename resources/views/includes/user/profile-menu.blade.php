<div class="nav-list-user">
    <div class="list-group">
      <a href="{{ route('user.profile') }}" class="list-group-item list-group-item-action {{ Route::is('user.profile') ? 'active' : '' }}">Dashboard</a>
      <a href="{{ route('user.bookings') }}" class="list-group-item list-group-item-action {{ Route::is('user.bookings') ? 'active' : '' }}">Bookings</a>
      {{-- <a href="orders.html" class="list-group-item list-group-item-action">Orders</a> --}}
      <a href="{{ route('user.addresses') }}" class="list-group-item list-group-item-action">Addresses</a>
      <a href="{{ route('user.edit_profile') }}" class="list-group-item list-group-item-action {{ Route::is('user.edit_profile') ? 'active' : '' }}">Account details</a>
      <a href="{{ route('user.get_password_form') }}" class="list-group-item list-group-item-action {{ Route::is('user.get_password_form') ? 'active' : '' }}">Change Password</a>
      <a href="#" class="list-group-item list-group-item-action" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">Logout</a>
      <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
    </div> 
</div>