@section('camera')
    <div class="home-single-contest gray-bg pt-90 pb-90" id="camera">
        <div class="home-single single-photo-contest-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="section-title">
                            <h2>Our <span>Cameras</span></h2>
                            <p>We have several cameras that excel in photographing all types of activities as well as in
                                various areas of shooting.
                                One of our superior cameras, the Canon EOS-1D X series, is built with a solid and durable
                                build that is flawless, responsive and performs intuitive focusing, while also offering
                                superior image quality and the highest quality video recording. </p>
                        </div>
                        <div class="about-content">
                            <h2>List Camera</h2>
                            <!-- <a style="float:right;display:block" class="btn btn-sm btn-danger pb-20" href="javascript:void(0)">All Camera <i class="fa fa-arrow-right"></i></a> -->
                            <ul class="home-single-slide variation">
                                @foreach ($cameras as $camera)
                                    <li>
                                        <div class="item">
                                            <div class="about-image">
                                                <img src="{{ $camera['photo'] }}" alt="">
                                                <div class="overley">
                                                    <h4><a>{{ $camera->camera }}</a></h4>
                                                </div>
                                            </div>
                                            <div class="about-text">
                                                <h3><a>{{ $camera->camera }}</a></h3>
                                                <p>{{ $camera->description }}</p>
                                                <a href="{{ route('user.camera.order') }}">Order Now</a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
