<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $purchases->id !!}</p>
</div>

<!-- Providers Id Field -->
<div class="form-group">
    {!! Form::label('providers_id', 'Providers Id:') !!}
    <p>{!! $purchases->providers_id !!}</p>
</div>

<!-- Storage Id Field -->
<div class="form-group">
    {!! Form::label('storage_id', 'Storage Id:') !!}
    <p>{!! $purchases->storage_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $purchases->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $purchases->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $purchases->deleted_at !!}</p>
</div>

