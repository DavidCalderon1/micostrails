<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $vehicles->id !!}</p>
</div>

<!-- Type Vehicle Id Field -->
<div class="form-group">
    {!! Form::label('type_vehicle_id', 'Type Vehicle:') !!}
    <p>{!! $vehicles->type_vehicle_name !!}</p>
</div>

<!-- Brand Field -->
<div class="form-group">
    {!! Form::label('brand', 'Brand:') !!}
    <p>{!! $vehicles->brand !!}</p>
</div>

<!-- Model Field -->
<div class="form-group">
    {!! Form::label('model', 'Model:') !!}
    <p>{!! $vehicles->model !!}</p>
</div>

<!-- License Plate Field -->
<div class="form-group">
    {!! Form::label('license_plate', 'License Plate:') !!}
    <p>{!! $vehicles->license_plate !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $vehicles->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $vehicles->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $vehicles->deleted_at !!}</p>
</div>

