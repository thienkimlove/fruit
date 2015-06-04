@extends('admin')

@section('content')
    @include('admin.category.heading')
    <div class="row">
        <div class="col-lg-6">
            <h2>Add New</h2>
            {!! Form::model($category = new App\Category, ['route' => ['categories.store']]) !!}
            @include('admin.category.form', ['submitText' => 'Add New'])
            {!! Form::close() !!}
            @include('errors.list')

        </div>
    </div>
@stop