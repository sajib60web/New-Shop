@extends('admin.master')

@section('title')
Add Product
@endsection

@section('mainContent')
<!-- page-wrapper -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Product</h1>
        </div>
        <h4 class="text-success">{{Session::get('message')}}</h4>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">

                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-8">
                            {{ Form::open(['route'=>'save-product', 'method' =>'POST', 'enctype'=>'multipart/form-data']) }}
                            <div class="form-group">
                                <label>Product Name:</label>
                                <input class="form-control" name="product_name">
                            </div>
                            <div class="form-group">
                                <label for="sel1">Category Name:</label>
                                <select class="form-control" id="sel1" name="category_id">
                                    <option>Select Category Name</option>
                                    @foreach($category as $v_category)
                                    <option value="{{$v_category->id}}">{{$v_category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Brand Name:</label>
                                <select class="form-control" id="sel1" name="brand_id">
                                    <option>Select Brand Name</option>
                                    @foreach($brand as $v_brand)
                                    <option value="{{$v_brand->id}}">{{$v_brand->brand_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label> Product New Price</label>
                                <input class="form-control" type="number" name="new_price">
                            </div>
                            <div class="form-group">
                                <label>Product Old Price</label>
                                <input class="form-control" type="number" name="old_price">
                            </div>
                            <div class="form-group">
                                <label>Product Quantity</label>
                                <input class="form-control" type="number" name="quantity">
                            </div>
                            <div class="form-group">
                                <label>Product Short Description</label>
                                <textarea class="form-control" rows="3" name="short_description"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Product Long Description</label>
                                <textarea class="form-control" id="editor" name="long_description"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Product Images</label>
                                <input type="file" name="product_image" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label for="sel1">Publication Status:</label>
                                <select class="form-control" id="sel1" name="publication_status">
                                    <option>Select Publication Status</option>
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Add Product">
                            </div>
                            {{ Form::close() }}
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
@endsection


