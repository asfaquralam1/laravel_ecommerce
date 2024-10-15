@extends('site.pages.master')
@section('content')
<section id="contact">
    <div class="container">
        <div class="breadcrumb-section pt-4 py-4">
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
        <div class="contact_area">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12" style="padding: 0px !important;">
                    <iframe width="100%" height="400px"
                        src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;coord=52.70967533219885, -8.020019531250002&amp;q=1%20Grafton%20Street%2C%20Dublin%2C%20Ireland&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><br />
                </div>
                <div class="col-lg-6 col-lg-6 col-sm-12 bg-theme-primary" style="padding: 0px !important;">
                    <div class="contact-form-area" style="background-color: orange">
                        <h4 style="padding-bottom: 10px;">We want to hear from you</h4>
                        <form action="" class="contact-form">
                            <div class="mb-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name" placeholder="Name">
                                        @error('name')
                                        <p>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" id="email" placeholder="Email">
                                        @error('email')
                                        <p>{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                            name="subject" id="subject" placeholder="Subject">
                                        @error('subject')
                                        <p>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                            name="phone" id="phone" placeholder="Phone">
                                        @error('email')
                                        <p>{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment" cols="40" rows="5" placeholder="Write your comment"></textarea>
                                @error('comment')
                                <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <button class="btn" style="background-color: white" type="submit"><i class="fa fa-paper-plane"></i> <span>Send Message</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="newsletter">
    <div class="container">
        <div class="newsletter_area">
            <p>Subscribe for Our newsletters!</p>
            <div class="newsletter_area">
                <input type="text" placeholder="Enter your email" class="newslatter-input">
                <button type="submit" class="subscribe-btn">Subscribe</button>
            </div>
        </div>
    </div>
</section>
@endsection