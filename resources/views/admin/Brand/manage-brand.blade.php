@extends('admin.master')
@section('body')
    <!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">NO SL.</th>
                    <th scope="col">Brand Name</th>
                    <th scope="col">Brand Description</th>
                    <th scope="col">Publication Status</th>
                    <th scope="col">Publication Status</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @php ($i = 0);
                @foreach($brands as $brand)
                <tr>
                    <th>{{ $i++}}</th>
                    <th>{{ $brand->brand_name }}</th>
                    <th>{{ $brand->brand_description}}</th>
                    <th>{{ $brand->publication_status == 1 ? "public" : "Unpublic"}}</th>
                    <th>
                        @if($brand->publication_status == 1)
                            <a href="{{ route('unpublic-status', ['id' => $brand->id] )}}" class="btn btn-success">public</a>
                        @else
                            <a href="{{ route('public-status', ['id' => $brand->id] )}}" class="btn btn-warning">Unpublic</a>
                        @endif
                    </th>
                    <th>
                        <a href="{{ route('edit-brand', ['id' => $brand->id ]) }}" class="btn btn-primary">Edit</a>
                    </th>
                    <th>
                        <a href="{{ route('delete-brand', ['id' => $brand->id]) }}" class="btn btn-danger">Delete</a>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>  
    </div>
        <!-- /.row -->
  </div>
      <!-- /.container-fluid -->
</div>
@endSection