@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Storages
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($storages, ['route' => ['storages.update', $storages->id], 'method' => 'patch']) !!}

                        @include('storages.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection