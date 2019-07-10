@extends('admin.master')

@section('title')
Manage Brand
@endsection

@section('mainContent')
<!-- page-wrapper -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Manage Brand</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <?php
    $massage = Session::get('massage');
    if (isset($massage)) {
        ?>
        <div class="alert alert-block alert-success fade in">
            <button data-dismiss="alert" class="close" type="button">×</button>
            <h4 class="alert-heading">Success!</h4>
            <p><?php echo $massage; ?></p>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">All Manage Brand</div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Brand ID</th>
                                <th>Brand Name</th>
                                <th>Brand Description</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($brand_info as $v_brand)
                            <tr class="odd gradeX">
                                <td>{{$v_brand->id}}</td>
                                <td>{{$v_brand->brand_name}}</td>
                                <td>{{str_limit($v_brand->brand_description,30)}}</td>
                                <td class="center">
                                    @if($v_brand->publication_status==1)
                                    <span class="label label-success">Published</span>
                                    @else
                                    <span class="label label-danger">Unpublished</span>
                                    @endif
                                </td>
                                <td>
                                    @if($v_brand->publication_status==0)
                                    <a class="btn btn-success" href="{{route('published-brand',['id'=>$v_brand->id])}}">
                                        <i class="glyphicon glyphicon-thumbs-up"></i>
                                    </a>
                                    @else
                                    <a class="btn btn-danger" href="{{route('unpublished-brand',['id'=>$v_brand->id])}}">
                                        <i class="glyphicon glyphicon-thumbs-down"></i>
                                    </a>
                                    @endif
                                    <a class="btn btn-info" href="{{route('edit-brand',['id'=>$v_brand->id])}}">

                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    <a class="btn btn-danger" href="{{route('delete-brand',['id'=>$v_brand->id])}}" onclick="return confirm('Are You Sure to Delete');">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#page-wrapper -->
@endsection


