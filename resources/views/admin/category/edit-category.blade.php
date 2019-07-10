@extends('admin.master')

@section('title')
Edit Category
@endsection

@section('mainContent')
<!-- page-wrapper -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Category</h1>
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
                        <div class="col-lg-6">
                            <form role="form" name="editCategory" method="POST" action="{{ route('update-category') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Category Name:</label>
                                    <input class="form-control" type="text" name="category_name" value="{{$category_info->category_name}}"/>
                                    <input class="form-control" type="hidden" name="category_id" value="{{$category_info->id}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="sel1">Publication Status:</label>
                                    <select class="form-control" id="sel1" name="publication_status">
                                        <option>Select Publication Status</option>
                                        <option name="" value="1">Published</option>
                                        <option value="0">Unpublished</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Category Description</label>
                                    <textarea class="form-control" rows="3" name="category_description">
                                        {{$category_info->category_description}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Update Category">
                                </div>
                            </form>
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
<script type="text/javascript">
    document.forms['editCategory'].elements['publication_status'].value = {{$category_info->publication_status}};
</script>
@endsection

