<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $orders->id !!}</p>
</div>

<!-- Creator Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('creator_id', 'Creator:') !!}
    <p>{!! $users[$orders->creator_id] !!}</p>
</div>

<!-- Client Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', 'Client:') !!}
    <p>{!! $users[$orders->client_id] !!}</p>
</div>

<!-- Transporter Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transporter_id', 'Transporter:') !!}
    <p>{!! $users[$orders->transporter_id] !!}</p>
</div>

<!-- storage Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('storage_id', 'Storage:') !!}
    <p>{!! $orders->storage_name !!}</p>
</div>

<!-- Users Addresses Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_addresses_id', 'Users Addresses:') !!}
    <p>{!! $orders->users_addresses_name !!}</p>
</div>

<!-- Delivery Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delivery_date', 'Delivery Date:') !!}
    <p>{!! $orders->delivery_date !!}</p>
</div>

<!-- Priority Field -->
<div class="form-group col-sm-6">
    {!! Form::label('priority', 'Priority:') !!}
    <p>{!! $orders->priority !!}</p>
</div>

<!-- Status Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_id', 'Status:') !!}
    <p>{!! $orders->status_name !!}</p>
</div>

<!-- paid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paid', 'paid:') !!}
    <p>{!! ($orders->paid ? 'Yes' : 'No') !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $orders->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $orders->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $orders->deleted_at !!}</p>
</div>

<div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <!-- Name Field -->
                <div class="col-sm-6">
                    {!! Form::label('name', 'Product') !!}
                </div>
                <!-- Name Field -->
                <div class="col-sm-6">
                    {!! Form::label('name', 'Quantity') !!}
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row list-products">

                @foreach ($order_products as $product)
                    <div class="products col-sm-12">

                        <div class="form-group col-sm-6">
                            <p>{!! $product->name !!}</p>
                        </div>
                        <div class="form-group col-sm-6">
                            <p>{!! $product->quantity !!}</p>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
