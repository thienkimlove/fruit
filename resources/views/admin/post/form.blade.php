<div class="form-group">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Choose Category') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('image', 'Post Avatar') !!}
    @if ($post->image)
        <img src="{{url('images/small/' . $post->image)}}" />

        <hr>
    @endif
    {!! Form::file('image', null, ['class' => 'form-control']) !!}
</div>



<div class="form-group">
     {!! Form::label('desc', 'Description') !!}
     {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('content', 'Content') !!}
     {!! Form::textarea('content', null, ['class' => 'form-control ckeditor']) !!}
</div>


 <div class="form-group">
        {!! Form::submit($submitText, ['class' => 'btn btn-primary form-control']) !!}
  </div>
