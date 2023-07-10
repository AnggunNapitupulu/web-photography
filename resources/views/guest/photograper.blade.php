@section('photograper')
    <div class="related-winners-area pb-90 pt-90" id="photograper">
        <div class="container">
            <div class="section-title">
                <h2>Our <span>Contacts</span></h2>
                <p>this is information about me.
                    If there is something important you can contact me via the following social media. </p>
            </div>
            <!-- Winner Area Start Here -->
            <div class="winners-page-area pt-100">
                <div class="container">
                    <div class="row top-winners">
                        <div class="col-lg-6 md-mb-30">
                            <div class="images">
                                <a>
                                    <img src="{{ $contact->photo }}" alt="">
                                </a>
                                <div class="overley">
                                    <div class="informations">
                                        <h3><a>{{ $contact->name }}</a></h3>
                                        <span>{{ $contact->email }}</span>
                                        <span>{{ $contact->phone }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="winners-informations">
                                <h3><a>{{ $contact->name }}</a></h3>
                                <span>{{ $contact->email }}</span>
                                <p>
                                    {{ $contact->bio }}
                                </p>
                                <div class="social-media">
                                    <ul>
                                        <li><a href="{{ $contact->facebook }}"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="{{ $contact->twitter }}"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="{{ $contact->pinterest }}"><i class="fa fa-pinterest-p"></i></a></li>
                                        <li><a href="{{ $contact->linkedin }}"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="{{ $contact->instagram }}"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Winner Area End Here -->
        </div>
    </div>
@endsection
