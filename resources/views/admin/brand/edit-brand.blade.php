@extends('admin.master')

@section('title')
Edit Brand
@endsection

@section('mainContent')
<!-- page-wrapper -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Brand</h1>
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
                            <form role="form" name="editBrand" method="POST" action="{{ route('update-brand') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Brand Name:</label>
                                    <input class="form-control" type="text" name="brand_name" value="{{$brand_info->brand_name}}"/>
                                    <input class="form-control" type="hidden" name="brand_id" value="{{$brand_info->id}}"/>
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
                                    <label>Brand Description</label>
                                    <textarea class="form-control" rows="3" name="brand_description">
                                        {{$brand_info->brand_description}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Update Brand">
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
    document.forms['editBrand'].elements['publication_status'].value = {{$brand_info->publication_status}};
</script>
@endsection

