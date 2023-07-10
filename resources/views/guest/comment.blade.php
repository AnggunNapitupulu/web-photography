@section ('comment')
<div class="contact-us-page-area pt-90 pb-70" id="comment">
    <div class="container">
        <div class="section-title">
            <h2>Comment <span>Us</span></h2>
        </div>
        <!-- Winner Area Start Here -->
        <div class="contact-section">
            <div class="leave-comments-area">
                <div id="form-messages"></div>
                @if(session('msg'))
                <span class=" btn btn-success disabled">
                    {{ session('msg') }}
                </span>
                @endif
                <form id="contact-form" method="post" action="{{ route('commentGuest') }}">
                    @csrf
                    <fieldset>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <div>
                                        <div>
                                            <input name="name" id="name" type="text" class="form-control"
                                                value="{{ old('name') }}" placeholder="Name*">
                                        </div>
                                        <div style="margin-top: -17px;">
                                            @if($errors->has('name'))
                                            <span class="text-danger ml-3">
                                                {{ $errors->first('name') }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <div>
                                        <div>
                                            <input name="email" id="email" type="email" class="form-control"
                                                value="{{ old('email') }}" placeholder="Email*">
                                        </div>
                                        <div style="margin-top: -17px;">
                                            @if($errors->has('email'))
                                            <span class="text-danger ml-3">
                                                {{ $errors->first('email') }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <div>
                                        <div>
                                            <input name="phone" id="phone" type="text" class="form-control"
                                                value="{{ old('phone') }}" placeholder="Phone*">
                                        </div>
                                        <div style="margin-top: -17px;">
                                            @if($errors->has('phone'))
                                            <span class="text-danger ml-3">
                                                {{ $errors->first('phone') }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <div>
                                        <div>
                                            <input name="subject" id="subject" type="text" class="form-control"
                                                value="{{ old('subject') }}" placeholder="Subject*">
                                        </div>
                                        <div style="margin-top: -17px;">
                                            @if($errors->has('subject'))
                                            <span class="text-danger ml-3">
                                                {{ $errors->first('subject') }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div>
                                        <textarea name="message" id="message" cols="40" rows="10"
                                            class="textarea form-control" placeholder="I think ..."></textarea>
                                        @if($errors->has('message'))
                                        <span class="text-danger ml-3">
                                            {{ $errors->first('message') }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button class="btn-send" name="Submit" type="submit">Send Comment <i
                                        class="fa fa-angle-right"></i> </button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <!-- Winner Area End Here -->
    </div>
</div>
@endsection