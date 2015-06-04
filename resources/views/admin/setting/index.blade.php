@extends('admin')
@section('content')
    @include('admin.setting.heading')
    <div class="row" data-ng-controller="SettingIndex">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Setting lists.
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Value</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($settings as $setting)
                                <tr>
                                    <td>{{$setting->id}}</td>
                                    <td><a href="{{url('settings/' .$setting->id . '/edit')}}">{{$setting->name}}</a></td>
                                    <td>{!! $setting->value !!}</td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['settings.destroy', $setting->id]]) !!}
                                        <button type="submit" class="btn btn-danger btn-mini">Xóa</button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">

                        <div class="col-sm-6">{!! $settings->render() !!}</div>
                    </div>
                    <div class="row"><a href="{{url('settings/create')}}">Create</a></div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>

    </div>
@endsection