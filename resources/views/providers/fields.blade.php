<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Products Field -->
<div class="form-group col-sm-6">
    {!! Form::label('products', 'Products:') !!}
    {!! Form::select('products[]', $products, null, ['class' => 'form-control select2', 'placeholder_text' => 'Select one...', 'multiple']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('providers.index') !!}" class="btn btn-default">Cancel</a>
</div>
