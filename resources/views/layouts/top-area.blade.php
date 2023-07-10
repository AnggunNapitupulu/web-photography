@php
$contact = \App\Models\Contact::first();
@endphp
@section('top-area')
  <div class="header-top-area hidden-sm" id="home">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="header-top-left">
            <ul>
              <li><i class="fa fa-phone"></i><a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></li>
              <li><i class="fa fa-envelope-o"></i><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="right-side-tool text-right">
            <div class="social-media-area">
              <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
              </ul>
            </div>
            <div class="header-top-right">
              <ul>
                @guest
                  @if (Route::has('login'))
                    <li><i class="fa fa-users"></i><a href="{{ route('user.auth.login') }}">Login</a></li>
                  @endif
                @else
                  <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                  </li>
                @endguest
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
