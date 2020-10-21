@extends('admin.master')
@section('body')
    <!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
        @twitter

<table class="table">
  <thead>
    <tr>
      <th scope="col">SL NO</th>
      <th scope="col">category name</th>
      <th scope="col">description</th>
      <th scope="col">publication status</th>
      <th scope="col">publication status</th>
      <th scope="col">Edit</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
      @php($i = 0);
    @foreach($categories as $catagory )
    <tr>
      <td>{{ $i++}}</td>
      <td>{{ $catagory->category_name}}</td>
      <td>{{ $catagory->category_description}}</td>
      <td>{{ $catagory->publication_status == 1 ? "published" : "unpublished"}} </td>
      <td>
          @if($catagory->publication_status == 1)
            <a href="{{ route('unpublish-category', ['id' => $catagory->id]) }}" class="btn btn-success">public</a>
          @else
          <a href="{{ route('publish-category', ['id' => $catagory->id]) }}" class="btn btn-warning">Unpublic</a> 
          @endif
      </td>
        <td>
         <a href="{{ route('edit-category', ['id' => $catagory->id]) }}" class="btn btn-primary">EDIT</a>
        </td>
        <td>
            <a href="{{ route('delete-category', ['id' => $catagory->id]) }}" class="btn btn-danger">DELETE</a>
        </td>
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