@extends('admin')
@section('content')
    @include('admin.post.heading')
    <div class="row" data-ng-controller="PostIndex">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Desc</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Home Slide</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td><a href="{{url('posts/'. $post->id. '/edit')}}">{{$post->title}}</a></td>
                                    <td>{{$post->desc}}</td>
                                    <td>{{$post->price}} VND</td>
                                    <td><img src="{{url('images/small/' . $post->image)}}" /></td>
                                    <td>{{$post->category->title}}</td>
                                    <td>{{ ($post->home_slide) ? 'Yes' : 'No' }}</td>

                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id]]) !!}
                                        <button type="submit" class="btn btn-danger btn-mini">Delete</button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="row">

                        <div class="col-sm-6">{!!$posts->render()!!}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6"><a href="{{url('posts/create')}}">Create</a></div>
                    </div>


                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>

    </div>
@endsection