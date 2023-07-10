@section('mobile-area')
<div class="mobile-menu-area">
    <div class="container">
        <div class="mobile-logo-area">
            <a href="index.html"><img src="{{ asset('assets/images/logo.png') }}" alt="logo"></a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul>
                            <li><a href="index.html">Home <i class="fa fa-angle-down"></i></a>
                                <ul>
                                    <li><a href="index.html">Home One</a></li>
                                    <li><a href="index2.html">Home Two</a></li>
                                </ul>
                            </li>
                            <li><a href="about.html">About <i class="fa fa-angle-down"></i></a>
                                <ul>
                                    <li><a href="about.html">About Us</a>
                                    <li><a href="about-me.html">About Me</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Portfolio <i class="fa fa-angle-down"></i></a>
                                <ul>
                                    <li><a href="portfolio1.html">Portfolio 1</a></li>
                                    <li><a href="portfolio2.html">Portfolio 2</a></li>
                                    <li><a href="single-portfolio.html">Portfolio Details</a></li>
                                </ul>
                            </li>
                            <li class="active"><a href="gallery.html">Gallery <i class="fa fa-angle-down"></i></a>
                                <ul>
                                    <li><a href="gallery.html">Gallery One</a></li>
                                    <li><a href="gallery1.html">Gallery Two</a></li>
                                    <li><a href="gallery2.html">Gallery Three</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Pages <i class="fa fa-angle-down"></i></a>
                                <ul>
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="product-details.html">Product Details</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="photocontest-list1.html">Photo Contest List 1</a></li>
                                    <li><a href="photocontest-list2.html">Photo Contest List 2</a></li>
                                    <li><a href="single-contest1.html">Single Contest 1</a></li>
                                    <li><a href="single-contest2.html">Single Contest 2</a></li>
                                    <li><a href="photo-details.html">Photo Details</a></li>
                                    <li><a href="winners.html">Winners</a></li>
                                    <li><a href="single-winners.html">Winners Details</a></li>
                                    <li><a href="upload-photo.html">Upload Photo</a></li>
                                    <li><a href="registration.html">Registration</a></li>
                                    <li><a href="404.html">Error Page</a></li>
                                </ul>
                            </li>
                            <li><a href="blog.html">Blog <i class="fa fa-angle-down"></i></a>
                                <ul>
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="blog-left.html">Blog Left Sidebar</a></li>
                                    <li><a href="blog-right.html">Blog Right Sidebar</a></li>
                                    <li><a href="single-blog.html">Single Blog</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection