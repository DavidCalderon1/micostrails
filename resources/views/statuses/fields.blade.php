<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- position Field -->
<div class="form-group col-sm-6">
    <b>{!! Form::label('position', 'Position:') !!}</b>
    {!! Form::number('position', null, ['class' => 'form-control']) !!}
</div>

<!-- Color Field -->
<div class="form-group col-sm-6">
    <b>{!! Form::label('color', __('words.Color')) !!}</b>
    {!! Form::color('color', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('statuses.index') !!}" class="btn btn-default">Cancel</a>
</div>
