@extends('admin')
@section('content')
    @include('admin.category.heading')
    <div class="row" data-ng-controller="PostIndex">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Desc</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $cate)
                                <tr>
                                    <td>{{$cate->id}}</td>
                                    <td><a href="{{url('categories/'. $cate->id .'/edit')}}">{{$cate->title}}</a></td>
                                    <td>{{$cate->desc}}</td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $cate->id]]) !!}
                                        <button type="submit" class="btn btn-danger btn-mini">Delete</button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="row">

                        <div class="col-sm-6">{!!$categories->render()!!}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6"><a href="{{url('categories/create')}}">Create</a></div>
                    </div>


                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>

    </div>
@endsection