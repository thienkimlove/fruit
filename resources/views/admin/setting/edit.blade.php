@extends('admin')

@section('content')
  @include('admin.setting.heading')
  <div class="row">
      <div class="col-lg-6">
          <h2>Edit</h2>
          {!! Form::model($setting, ['method' => 'PATCH', 'route' => ['settings.update', $setting->id]]) !!}
              @include('admin.setting.form', ['submitText' => 'Edit'])
          {!! Form::close() !!}
          @include('errors.list')

      </div>
  </div>
@stop