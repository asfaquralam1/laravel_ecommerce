@extends('master')
@section('content')
    <section id="banner">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://t3.ftcdn.net/jpg/03/16/91/28/360_F_316912806_RCeHVmUx5LuBMi7MKYTY5arkE4I0DcpU.jpg"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://t3.ftcdn.net/jpg/03/16/91/28/360_F_316912806_RCeHVmUx5LuBMi7MKYTY5arkE4I0DcpU.jpg"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://t3.ftcdn.net/jpg/03/16/91/28/360_F_316912806_RCeHVmUx5LuBMi7MKYTY5arkE4I0DcpU.jpg"
                        class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section id="product">
        <div class="container">
            <h1 class="product_heading">Products</h1>
            @include('topproduct')
        </div>
    </section>


    <section id="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 text-center">
                    <div class="mb-4" style="font-weight: 900;">Join
                        2,000+ subscribers</div>
                    <div class="text-lg">Stay in the loop with everything you need to know.</div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <input type="text" placeholder="Enter your email" class="newslatter-input">
                    <button type="submit" class="subscribe-btn">Subscribe</button>
                </div>
            </div>
        </div>
    </section>
@endsection
