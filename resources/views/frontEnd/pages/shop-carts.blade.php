@extends('frontEnd.master');
@section('body');
    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @php($sum = 0)
                            @foreach($product as $product)
                                <tr>
                                    <td class="cart__product__item">
                                        <img src="{{ asset($product->image) }}" alt="">
                                        <div class="cart__product__item__title">
                                            <h6>{{ $product->name }}</h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">TK. {{ $product->price }}</td>
                                    <td class="cart__quantity">
                                            {{ Form::open(['route'=>'update-cart','method'=>'post']) }}
                                                <input type="number" name="qty" value="{{ $product->quantity }}" min="1"/>
                                                <input type="hidden" name="id" value="{{ $product->id }}"/>
                                                <input type="submit" name="btn" vlaue="update"/>
                                            {{ Form::close() }}
                                    </td>
                                    <td class="cart__total">{{ $total = $product->price * $product->quantity }}</td>
                                    <td class="cart__close">
                                        <a href="{{ route('delete-card-item',['id'=>$product->id]) }}"> <span class="icon_close"></span></a>
                                    </td>
                                </tr>
                                @php($sum = $sum + $total)
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="#">Continue Shopping</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <a href="#"><span class="icon_loading"></span> Update cart</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="discount__content">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">Apply</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>TK. {{ $sum }}</span></li>
                            <li>Total <span>TK. {{ $sum }}</span></li>
                            @php(Session::put('sum',$sum))
                        </ul>
                        <a href="{{ route('checkout') }}" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->
@endSection
