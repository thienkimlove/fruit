@extends('admin')

@section('content')
  @include('admin.category.heading')
  <div class="row">
      <div class="col-lg-6">
          <h2>Edit</h2>
          {!! Form::model($category, ['method' => 'PATCH', 'route' => ['categories.update', $category->id]]) !!}
              @include('admin.category.form', ['submitText' => 'Edit'])
          {!! Form::close() !!}
          @include('errors.list')

      </div>
  </div>
@stop