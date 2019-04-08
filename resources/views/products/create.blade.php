@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Products
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'products.store']) !!}

                        @include('products.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <!-- para los selects -->
    <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('functions')
    <!-- para los selects -->
    <script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').each(function(index, el) {
                $(el).select2({
                  width: '100%',
                  placeholder: $(el).attr('placeholder_text'),
                  allowClear: Boolean($(el).data('allow-clear')),
                });
            });
        });
    </script>
@endsection