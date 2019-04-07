@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Users Addresses
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($usersAddresses, ['route' => ['usersAddresses.update', $usersAddresses->id], 'method' => 'patch']) !!}

                        @include('users_addresses.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection