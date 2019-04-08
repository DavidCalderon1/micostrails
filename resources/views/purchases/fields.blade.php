<!-- Providers Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('providers_id', 'Provider:') !!}
    {!! Form::select('providers_id', $providers, null, ['class' => 'form-control', 'placeholder' => 'Select one...']) !!}
</div>

<!-- Storage Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('storage_id', 'Storage:') !!}
    {!! Form::select('storage_id', $storages, null, ['class' => 'form-control', 'placeholder' => 'Select one...']) !!}
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

                @foreach ($purchase_products as $product)
                    <div class="products col-sm-12">
                        {!! Form::hidden('purchases_detail_id[]', $product->id) !!}

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
    <a href="{!! route('purchases.index') !!}" class="btn btn-default">Cancel</a>
</div>