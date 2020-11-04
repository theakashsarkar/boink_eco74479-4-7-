@extends('admin.master')
@section('body')
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="text-center text-success">Add Product</h4>
                        </div>
						<div class="panel-body">
							 {!! Form::open(['route' => 'new-product','mathod' => 'post', 'enctype' => 'multipart/form-data']) !!}
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="">Category Name</label>
                                    <div class="col-md-9">
                                        <select name="category_id" id="" class="form-control">
                                            <option value="">----Select Category Name----</option>
    {                                       @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->has("brand_name") ? $errors->first("brand_name") : ' ' }}</span>
                                </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3" for="">Brand Name</label>
                                        <div class="col-md-9">
                                            <select name="brand_id" id="" class="form-control">
                                                <option value="">----Select Brand Name----</option>
                                                @foreach($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->has("brand_name") ? $errors->first("brand_name") : ' ' }}</span>
                                        </div>
                            <div class="form-group">
                                    <label for="" class="control-label col-md-4">Product Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="product_name" id="" class="form-control"/>
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="" class="control-label col-md-4">Product Quantity</label>
                                    <div class="col-md-8">
                                        <input type="number" name="product_quantity" class="form-control"/>
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="" class="control-label col-md-4">Product Price</label>
                                    <div class="col-md-8">
                                       <input type="number" name="product_price" class="form-control"/>
                                    </div>
                            </div>

                            <div class="form-group">
                                    <label for="" class="control-label col-md-4">Short Description</label>
                                    <div class="col-md-8">
                                        <textarea name="short_description" id="" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                            </div>
                             <div class="form-group">
                                    <label for="" class="control-label col-md-4">Long Description</label>
                                    <div class="col-md-8">
                                        <textarea name="long_description" id="long_description" cols="30" rows="10" class="form-control"></textarea>
                                        <script>
                                            CKEDITOR.replace( 'long_description' );
                						</script>
                                    </div>
                            </div>
                            <div class="form-group">
                            	<label class="control-label col-md-4">Prodouct Image</label>
                            	<div class="col-md-8">
                            		<input type="file" name="product_image" class="form-control"/>
                            	</div>
                            </div>

                            <div class="form-group">
                                    <label for="" class="control-label col-md-4">Publication Status</label>
                                    <div class="col-md-8 radio">
                                       <label for=""><input type="radio" checked name="publication_status" value="1">published</label>
                                       <label for=""><input type="radio"  name="publication_status"  value="0">unpubished</label>
                                    </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <input type="submit" name="btn" class="btn btn-success btn-block" value="Add Product Info"/>
                                </div>

                            </div>

                        {!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endSection;
