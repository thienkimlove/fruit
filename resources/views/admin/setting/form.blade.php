<div class="form-group">
     {!! Form::label('name', 'Name') !!}
     {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
     {!! Form::label('value', 'Value') !!}
     {!! Form::textarea('value', null, ['class' => 'form-control ckeditor']) !!}
</div>

  <div class="form-group">
        {!! Form::submit($submitText, ['class' => 'btn btn-primary form-control']) !!}
  </div>