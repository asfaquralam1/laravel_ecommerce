@extends('site.pages.master')
@section('content')
    <section id="checkout-page">
        <div class="container">
            <div class="breadcrumb-section pt-4 py-4">
                <div class="breadcrumb">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
            <form action="{{ route('place.order') }}" method="post" style="margin-bottom: 10px;padding: 20px;">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-9">
                        <h4>Personal Information</h4>
                        <div class="checkout-info">
                            <div class="mb-4">
                                <label for="Name">Name</label>
                                <input type="name" class="form-control @error('name') is-invalid @enderror"
                                    name="name" id="name" placeholder="Name">
                                @error('name')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="Email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" placeholder="Email">
                                @error('email')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="Phone">Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" id="phone" placeholder="Number">
                                @error('phone')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="Address">Address</label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror"
                                            name="address" placeholder="Address">
                                        @error('address')
                                            <p>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6"><label for="apartment">Apartment</label>
                                        <input type="text" class="form-control @error('apartment') is-invalid @enderror"
                                            name="apartment" id="name" placeholder="apartment">
                                        @error('apartment')
                                            <p>{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="city">City</label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror"
                                    name="city" placeholder="City">
                                @error('city')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="city">District</label>
                                <input type="text" class="form-control @error('district') is-invalid @enderror"
                                    name="district" placeholder="district">
                                @error('district')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="zip">Zip</label>
                                <input type="text" class="form-control @error('zip') is-invalid @enderror" name="zip"
                                    placeholder="zip">
                                @error('zip')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="country">Country</label>
                                <input type="text" class="form-control @error('country') is-invalid @enderror"
                                    name="country" placeholder="Country">
                                @error('country')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <h4 class="text-center">Order Summery</h4>
                        <div class="order-summery">
                            @php $total = 0 @endphp
                            @if (session('cart'))
                                @foreach (session('cart') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                    <tr>
                                        <td class="text-center">{{ $details['name'] }}X{{ $details['quantity'] }}
                                        </td>
                                        <td class="text-center">{{ $details['quantity'] * $details['price'] }}
                                        </td>
                                        <br>
                                    </tr>
                                @endforeach
                                <hr>
                                <tr>
                                    <td>
                                        <h6><strong>Subtotal {{ $total }}</strong></h6>
                                        <input type="hidden" name="subtotal" id="" value="{{ $total }}">
                                    </td>
                                    <td>
                                        <h6><strong>Shipping 70</strong></h6>
                                        <input type="hidden" name="shipping" id="" value="{{ 70 }}">
                                    </td>
                                    <td>
                                        <h6><strong>Vat {{ $total * (5 / 100) }}</strong></h6>
                                        <input type="hidden" name="shipping" id="" value="{{ 70 }}">
                                    </td>
                                    <hr>
                                    <td>
                                        <h5><strong>Total {{ $total + 70 + $total * (5 / 100) }}</strong></h5>
                                        <input type="hidden" name="grand_total" value="{{ $total + 70 }}">
                                    </td>
                                </tr>
                            @endif
                        </div>
                        {{-- <div class="order-card" style="background-color: rgb(221, 219, 219);padding: 20px;margin: 20px">
                            <p><strong>Payment Method</strong></p>
                            <input type="radio" id="cod" name="fav_language" value="cod">
                            <label for="cod">COD</label><br>
                            <input type="radio" id="bKash" name="fav_language" value="bKash">
                            <label for="bKash">bKash</label><br>
                        </div> --}}
                        <button type="submit" class="btn btn-success order-btn">Place Order</button>
                    </div>
                </div>
                @if ($user)
                    <input hidden type="text" name="user_id" value="{{ $user->id }}">
                @endif
            </form>
        </div>
    </section>
@endsection
