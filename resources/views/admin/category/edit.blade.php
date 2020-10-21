@extends('admin.master')
@section('body')
    <!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
    <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Add Category</h4>
                </div>
                <div class="panel-body">
                    <h3 class="text-center text-success">{{ Session::get('message')}}</h3>
                        {!! Form::open(['route' => 'update','mathod' => 'post']) !!}
                            <div class="form-group">
                                    <label for="" class="control-label col-md-4">Category Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="category_name" id="" value="{{ $categories->category_name }}" class="form-control"/>
                                        <input type="hidden" name="category_id" id="" value="{{ $categories->id }}">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="" class="control-label col-md-4">Category Description</label>
                                    <div class="col-md-8">
                                        <textarea name="category_description" id="" cols="30" rows="10" class="form-control">{{ $categories->category_description }}</textarea>
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="" class="control-label col-md-4">Publication Status</label>
                                    <div class="col-md-8 radio">
                                       <label for=""><input type="radio" {{ $categories->publication_status == 1 ? 'checked' : ''}} name="publication_status" value="1">published</label>
                                       <label for=""><input type="radio" {{ $categories->publication_status == 0 ? 'checked' : ''}} name="publication_status"  value="0">unpubished</label>
                                    </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <input type="submit" name="btn" class="btn btn-success btn-block" value="update Categoy Info"/>
                                </div>

                            </div>
                  
                        {!! Form::close() !!}     
          
    </div>
        <!-- /.row -->
  </div>
      <!-- /.container-fluid -->
</div>
@endSection