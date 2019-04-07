@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Type Vehicle
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($typeVehicle, ['route' => ['typeVehicles.update', $typeVehicle->id], 'method' => 'patch']) !!}

                        @include('type_vehicles.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection