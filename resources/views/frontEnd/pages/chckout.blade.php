@extends('frontEnd.master');
@section('body')
   <!-- Breadcrumb Begin -->
   <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('/') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="{{ route('login') }}">Have a Login?</a> Click
                    here to Login.</h6>
                </div>
            </div>
            {{ Form::open(['route'=>'registration', 'method' =>'POST']) }}
            <div class="form-group">
                <input type="text" name="first_name" class="form-control" placeholder="First Name">
            </div>
            <div class="form-group">
                <input type="text" name="last_name" class="form-control" placeholder="Last Name">
            </div>

            <div class="form-group">
                <input type="email" name="email_address" class="form-control" placeholder="example@email.com">
            </div>

            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="password">
            </div>

            <div class="form-group">
                <input type="number" name="phone_number" class="form-control" placeholder="Phone Number">
            </div>
            <div class="form-group">
                <input type="text" name="address" class="form-control" placeholder="Address">
            </div>
            <input type="submit" name="btn" class="btn btn-success btn-block" value="Registration">
            {{ Form::close() }}
            </div>
        </section>
        <!-- Checkout Section End -->
@endSection
