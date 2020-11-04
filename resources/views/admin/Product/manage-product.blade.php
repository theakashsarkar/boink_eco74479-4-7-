@extends('admin.master')
@section('body')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="text-center text-success">Manage Product</h4>
                        </div>
                        <div class="panel-body">
                            <table class="table table-dark">
                                <thead>
                                    <tr class="">
                                        <th scope="col">SI NO</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Brand Name</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Product Image</th>
                                        <th scope="col">Product Price</th>
                                        <th scope="col">Product Quantity</th>
                                        <th scope="col">Publication Status</th>
                                        <th scope="col">Publication Status</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                    <tbody>
                                        @foreach($products as $product)
                                            @php($i = 1)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $product->category_name }}</td>
                                            <td>{{ $product->brand_name }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>
                                                <img src="{{asset($product->product_image)}}" all="" width="100" height="100">
                                            </td>
                                            <td>{{ $product->product_price }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->publication_status == 1 ? 'public' : 'unpublic' }}</td>
                                            <td>
                                                @if($product->publication_status == 1)
                                                    <a href="{{route('Unpublic',['id' => $product->id])}}" class="btn btn-success">Public</a>
                                                @else
                                                    <a href="{{route('Public',['id' => $product->id]) }}" class="btn btn-danger">Unpublic</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-success">Edit</a>
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endSection;
