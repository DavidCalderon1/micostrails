
<!-- Client Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', 'Client:') !!}
    {!! Form::select('client_id', $clients, null, ['class' => 'form-control', 'placeholder' => 'Select one...', 'onchange' => 'getSelectOptions("'.route('usersAddresses.getUsersAddresses').'", this, "users_addresses_id")' ]) !!}
</div>

<!-- Users Addresses Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_addresses_id', 'Users Addresses:') !!}
    {!! Form::select('users_addresses_id', $users_addresses, null, ['class' => 'form-control', 'placeholder' => 'Select one...']) !!}
</div>

<!-- storage Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('storage_id', 'Storage:') !!}
    {!! Form::select('storage_id', $storages, null, ['class' => 'form-control', 'placeholder' => 'Select one...']) !!}
</div>

<!-- Transporter Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transporter_id', 'Transporter:') !!}
    {!! Form::select('transporter_id', $transporters, null, ['class' => 'form-control', 'placeholder' => 'Select one...']) !!}
</div>

<!-- Delivery Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delivery_date', 'Delivery Date:') !!}
    {!! Form::date('delivery_date', null, ['class' => 'form-control','id'=>'delivery_date']) !!}
</div>

@section('functions')
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
    {!! Form::number('priority', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_id', 'Status:') !!}
    {!! Form::select('status_id', $status, null, ['class' => 'form-control', 'placeholder' => 'Select one...']) !!}
</div>

<!-- Paid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paid', 'Paid:') !!}
    <label class="checkbox-inline form-control">
        {!! Form::hidden('paid', 0) !!}
        {!! Form::checkbox('paid', '1', null) !!} Yes
    </label>
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
                
                <div class="form-group col-sm-12">
                    <a href="javascript:void(0)" id="addRegister" class="btn btn-success">Add <i class="fa fa-plus"></i> </a>
                </div>

                <div class="products layout col-sm-12 hide">
                    <div class="form-group col-sm-5">
                        {!! Form::select('products_layout', $products, null, ['class' => 'form-control', 'placeholder' => 'Select one...']) !!}
                    </div>
                    <div class="form-group col-sm-5">
                        {!! Form::number('quantities_layout', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-2">
                        <a href="javascript:void(0)" class="btn btn-danger delRegister"><i class="fa fa-trash"></i> </a>
                    </div>
                </div>

                @foreach ($order_products as $product)
                    <div class="products col-sm-12">
                        {!! Form::hidden('sale_id[]', $product->id) !!}

                        <div class="form-group col-sm-5">
                            {!! Form::select('products[]', $products, $product->product_id, ['class' => 'form-control', 'placeholder' => 'Select one...']) !!}
                        </div>
                        <div class="form-group col-sm-5">
                            {!! Form::number('quantities[]', $product->quantity, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-sm-2">
                            <a href="javascript:void(0)" class="btn btn-danger delRegister"><i class="fa fa-trash"></i> </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('orders.index') !!}" class="btn btn-default">Cancel</a>
</div>
