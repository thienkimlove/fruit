@extends('admin')

@section('content')
    @include('admin.setting.heading')
    <div class="row">
        <div class="col-lg-6">
            <h2>Add Setting</h2>
            {!! Form::model($setting = new App\Setting, ['route' => ['settings.store']]) !!}
            @include('admin.setting.form', ['submitText' => 'Add Setting'])
            {!! Form::close() !!}
            @include('errors.list')

        </div>
    </div>
@stop