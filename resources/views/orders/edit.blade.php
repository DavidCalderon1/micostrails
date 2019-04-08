@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Orders
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($orders, ['route' => ['orders.update', $orders->id], 'method' => 'patch']) !!}

                        @include('orders.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

@section('functions')
    <script type="text/javascript">
        $(document).ready(function() {
            // clona el layout de los productos, le cambia los nombres y lo agrega al final de la lista
            $('#addRegister').click(function(){
                var products = $('.layout.products').clone();

                products.find('[name="products_layout"]').attr('name','products[]').attr('required','required');
                products.find('[name="quantities_layout"]').attr('name','quantities[]').attr('required','required');

                products.removeClass('layout');
                products.removeClass('hide');

                $('.list-products').append(products);
                    
            });     
            // elimina el ultimo producto de la lista 
            $('.delRegister').click(function(){
                $(this).parents('.products').remove();
            });
            
        });
    </script>
@endsection