<!-- Providers Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('providers_id', 'Providers Id:') !!}
    {!! Form::number('providers_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Storage Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('storage_id', 'Storage Id:') !!}
    {!! Form::number('storage_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('purchases.index') !!}" class="btn btn-default">Cancel</a>
</div>
