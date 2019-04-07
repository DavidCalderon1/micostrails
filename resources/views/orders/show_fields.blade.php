<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $orders->id !!}</p>
</div>

<!-- Creator Id Field -->
<div class="form-group">
    {!! Form::label('creator_id', 'Creator Id:') !!}
    <p>{!! $orders->creator_id !!}</p>
</div>

<!-- Client Id Field -->
<div class="form-group">
    {!! Form::label('client_id', 'Client Id:') !!}
    <p>{!! $orders->client_id !!}</p>
</div>

<!-- Transporter Id Field -->
<div class="form-group">
    {!! Form::label('transporter_id', 'Transporter Id:') !!}
    <p>{!! $orders->transporter_id !!}</p>
</div>

<!-- Users Addresses Id Field -->
<div class="form-group">
    {!! Form::label('users_addresses_id', 'Users Addresses Id:') !!}
    <p>{!! $orders->users_addresses_id !!}</p>
</div>

<!-- Delivery Date Field -->
<div class="form-group">
    {!! Form::label('delivery_date', 'Delivery Date:') !!}
    <p>{!! $orders->delivery_date !!}</p>
</div>

<!-- Priority Field -->
<div class="form-group">
    {!! Form::label('priority', 'Priority:') !!}
    <p>{!! $orders->priority !!}</p>
</div>

<!-- Status Id Field -->
<div class="form-group">
    {!! Form::label('status_id', 'Status Id:') !!}
    <p>{!! $orders->status_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $orders->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $orders->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $orders->deleted_at !!}</p>
</div>

