@section('gallery')
    <!-- Portfolio One Start Here -->
    <div class="portfolio-one-area pt-90 pb-70" id="gallery">
        <div class="container">
            <div class="section-title">
                <h2>Our <span>Galleries</span></h2>
                <p>we show some photos that have been taken by Joshua Albert photography which are made into several parts,
                    namely pre-wedding photos, products, sports, fashion, stage, beauty, and trips. </p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="gridFilter portfolio-menu text-center">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            @foreach ($catgalleries as $catGallery)
                                <li data-filter=".{{ $catGallery['id'] }}">{{ $catGallery->category }}</li>
                            @endforeach
                        </ul>
                    </div><!-- .gridFilter end-->
                    <div class="row grid">
                        @foreach ($galleries as $gallery)
                            <div
                                class="col-lg-4 col-md-6 col-sm-12 mb-30 grid-item {{ $gallery['cat_gallery_id'] }} plugin html">
                                <div class="single-portfolio">
                                    <div class="portfolio-image">
                                        <img src="{{ $gallery['path_image'] }}" alt="" loading="lazy">
                                    </div>
                                    <div class="overley">
                                        <div class="portfolio-details">
                                            <h3> <a href="#">{{ $gallery->title }}</a></h3>
                                            <ul>
                                                <li>
                                                    <a class="image-popup" href="{{ $gallery['path_image'] }}">
                                                        <i class="fa fa-search"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="photo-informations">
                                            <ul>
                                                <li>{{ $gallery->created_at }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfo
      lio One End
       Here -->
@endsection
