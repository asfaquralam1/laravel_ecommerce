@extends('site.pages.master')
@section('content')
    <section id="checkout-page">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <form action="{{ route('') }}" method="post"
                        style="background-color: rgb(241, 238, 238);border-radius: 5px;margin-bottom: 10px;padding: 20px;">
                        @csrf
                        <h4>Personal Information</h4>
                        <div class="mb-4">
                            <div class="row">
                                <div class="col-6"><label for="Name">First Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="first_name" value="{{ $user->first_name }}" id="first_name" placeholder="First Name">
                                    @error('first_name')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-6"><label for="Name">Last Name</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                        name="last_name" value="{{ $user->last_name }}" id="last_name" placeholder="Last Name">
                                    @error('last_name')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="Email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ Auth::user()->email }}" id="email" placeholder="Email">
                            @error('email')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="Phone">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                value="{{ Auth::user()->phone }}" id="phone" placeholder="Phone">
                            @error('phone')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <div class="row">
                                <div class="col-6">
                                    <label for="Address">Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ $user->address }}" placeholder="Address">
                                    @error('address')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-6"><label for="apartment">Apartment</label>
                                    <input type="text" class="form-control @error('apartment') is-invalid @enderror"
                                        name="apartment" value="{{ $user->apartment }}" id="name" placeholder="apartment">
                                    @error('apartment')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="city">City</label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" name="city"
                                value="{{ $user->city }}" placeholder="City">
                            @error('city')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="city">District</label>
                            <input type="text" class="form-control @error('district') is-invalid @enderror" name="district"
                                value="{{ $user->district }}" placeholder="district">
                            @error('district')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="country">Country</label>
                            <input type="text" class="form-control @error('country') is-invalid @enderror" name="country"
                                value="{{ $user->country }}" placeholder="Country">
                            @error('country')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
                <div class="col-2">
                    <h4>Order Summery</h4>
                    <div class="order-card" style="background-color: gray">
                        @php $total = 0 @endphp
                    @if (session('cart'))
                        @foreach (session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                            <tr data-id="{{ $id }}">
                                <td data-th="Subtotal" class="text-center">${{ $details['name'] X $details['quantity'] }}
                                </td>
                                <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}
                                </td>
                            </tr>
                            <tr data-id="{{ $id }}">
                                <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>
                                <h3><strong>Total ${{ $total }}</strong></h3>
                            </td>
                        </tr>
                    @endif
                    </div>
                    <div class="order-card" style="background-color: gray">
                        <ul>
                            <li>COD</li>
                            <li>Stripe</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
