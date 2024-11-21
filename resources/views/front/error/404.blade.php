@extends('front.layouts.app')

@section('content')
    <section class="innerbanner">
        <div class="container">
            <div class="inner_bannercont text-center">
                <img src="{{ asset('front_assets/images/undraw_cancel_re_pkdm.svg') }}" alt="could-not-find" style="height: 100px">

                <h5 class="display-5 mt-3 mb-4">OOPS !</h5>

                <p class="text-muted">We could not find what you were looking for.</p>

                <a href="{{ url('/') }}" class="btn btn-primary mb-4">Back to home</a>
            </div>
        </div>
    </section>
@endsection