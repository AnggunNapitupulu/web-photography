@section('navbar')
    <div class="header-middle-area" id="sticky">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="{{ route('base') }}"><img src="{{ asset('assets/images/Logo2.png') }}" alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <div class="main-menu">
                        @guest
                            <nav>
                                <ul>
                                    <li><a href="{{ route('base') }}#home">Home</a></li>
                                    <li><a href="{{ route('base') }}#gallery">Gallery</a></li>
                                    <li><a href="{{ route('base') }}#camera">Camera</a></li>
                                    <li><a href="{{ route('base') }}#service">Service</a></li>
                                    <li><a href="{{ route('base') }}#photograper">Contact</a></li>
                                    <li><a href="{{ route('base') }}#comment">Comment</a></li>
                                </ul>
                            </nav>
                        @endguest
                        @role('User|Admin')
                            <nav>
                                <ul>
                                    <li class="active"><a href="{{ route('base') }}">Home</a></li>
                                    <li><a href="{{ route('user.galery.index') }}">Gallery</a></li>
                                    <li><a href="{{ route('user.camera.index') }}">Camera</a></li>
                                    <li><a href="{{ route('user.service.index') }}">Service</a></li>
                                    <li><a href="{{ route('contact') }}">Contact</a></li>
                                    <li><a href="{{ route('base') }}#comment">Comment</a></li>
                                </ul>
                            </nav>
                        @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
