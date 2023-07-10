@section('sidebar')
  <!-- Side Bar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <text class="sidebar-brand d-flex align-items-center justify-content-center">
      <div class="sidebar-brand-text mx-3">{{ auth()->user()->name }}</div>
    </text>
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ $title == 'Dashboard' ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Menu
    </div>
    <li class="nav-item {{ $title == 'User' ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('user') }}">
        <i class="fas fa-users"></i>
        <span>User</span>
      </a>
    </li>
    <li class="nav-item {{ $title == 'Gallery' ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('gallery') }}">
        <i class="fas fa-images"></i>
        <span>Gallery</span>
      </a>
    </li>
    <li class="nav-item {{ $title == 'Category Gallery' ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('catgallery') }}">
        <i class="fas fa-images"></i>
        <span>Category Gallery</span>
      </a>
    </li>
    <li class="nav-item {{ $title == 'Camera' ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('camera') }}">
        <i class="fas fa-camera"></i>
        <span>Camera</span>
      </a>
    </li>
    <li class="nav-item {{ $title == 'Service' ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('service') }}">
        <i class="fas fa-bars"></i>
        <span>Service</span>
      </a>
    </li>
    <li class="nav-item {{ $title == 'Order' ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('order') }}">
        <i class="fas fa-clipboard-list"></i>
        <span>Order</span>
      </a>
    </li>
    <li class="nav-item {{ $title == 'Comment' ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('comment') }}">
        <i class="fas fa-comment"></i>
        <span>Comment</span>
      </a>
    </li>
    <!-- <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                  aria-expanded="true" aria-controls="collapseTwo">
                  <i class="fas fa-fw fa-cog"></i>
                  <span>Components</span>
              </a>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                      <h6 class="collapse-header">Custom Components:</h6>
                      <a class="collapse-item" href="buttons.html">Buttons</a>
                      <a class="collapse-item" href="cards.html">Cards</a>
                  </div>
              </div>
          </li> -->
  </ul>
  <!-- Side Bar -->
@endsection
