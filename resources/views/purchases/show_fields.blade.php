<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $purchases->id !!}</p>
</div>

<!-- Providers Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('providers_id', 'Provider:') !!}
    <p>{!! $purchases->providers_name !!}</p>
</div>

<!-- Storage Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('storage_id', 'Storage:') !!}
    <p>{!! $purchases->storage_name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $purchases->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $purchases->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $purchases->deleted_at !!}</p>
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

                @foreach ($purchase_products as $product)
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