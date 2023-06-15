{{--IMPORTANT: this page will be overwritten and any change will be lost!! Use custom_sidebar_bottom.blade.php and custom_sidebar_top.blade.php--}}

@if(Gate::any(['customer_allow', 'customer_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "customer" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.customer.index')}}"><i class="fas fa-user-alt fa-fw"></i>Customer Management</a></li>
@endIf
@if(Gate::any(['contact_form_allow', 'contact_form_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "contact_form" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.contact_form.index')}}"><i class="fas fa-users fa-fw"></i>Contact Form Management</a></li>
@endIf
@if(Gate::any(['booking_allow', 'booking_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "booking" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.booking.index')}}"><i class="fas fa-ticket-alt fa-fw"></i>Reservation Management</a></li>
@endIf
@if(Gate::any(['car_allow', 'car_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "car" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.car.index')}}"><i class="fas fa-car-alt fa-fw"></i>Cars Management</a></li>
@endIf
@if(Gate::any(['city_allow', 'city_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "city" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.city.index')}}"><i class="fas fa-broadcast-tower fa-fw"></i>City/District/Station Management</a></li>
@endIf