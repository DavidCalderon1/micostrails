<!-- Type Vehicle Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type_vehicle_id', 'Type Vehicle:') !!}
    {!! Form::select('type_vehicle_id', $type_vehicles, null, ['class' => 'form-control']) !!}
</div>

<!-- Brand Field -->
<div class="form-group col-sm-6">
    {!! Form::label('brand', 'Brand:') !!}
    {!! Form::text('brand', null, ['class' => 'form-control']) !!}
</div>

<!-- Model Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model', 'Model:') !!}
    {!! Form::text('model', null, ['class' => 'form-control']) !!}
</div>

<!-- License Plate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('license_plate', 'License Plate:') !!}
    {!! Form::text('license_plate', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('vehicles.index') !!}" class="btn btn-default">Cancel</a>
</div>
