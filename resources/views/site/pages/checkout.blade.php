@extends('site.pages.master')
@section('content')
    <section id="checkout-page">
        <div class="container">
            @php $total = 0 @endphp
            @if (session('cart'))
                @foreach (session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                @endforeach
            @endif
            <form action="">

            </form>
            <h3><strong>Total ${{ $total }}</strong></h3>
        </div>
    </section>
@endsection
