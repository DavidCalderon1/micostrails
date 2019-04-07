<!-- Creator Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('creator_id', 'Creator Id:') !!}
    {!! Form::number('creator_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Client Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', 'Client Id:') !!}
    {!! Form::number('client_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Transporter Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transporter_id', 'Transporter Id:') !!}
    {!! Form::number('transporter_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Users Addresses Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_addresses_id', 'Users Addresses Id:') !!}
    {!! Form::number('users_addresses_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Delivery Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delivery_date', 'Delivery Date:') !!}
    {!! Form::date('delivery_date', null, ['class' => 'form-control','id'=>'delivery_date']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#delivery_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Priority Field -->
<div class="form-group col-sm-6">
    {!! Form::label('priority', 'Priority:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('priority', 0) !!}
        {!! Form::checkbox('priority', '1', null) !!} 1
    </label>
</div>

<!-- Status Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_id', 'Status Id:') !!}
    {!! Form::number('status_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('orders.index') !!}" class="btn btn-default">Cancel</a>
</div>
