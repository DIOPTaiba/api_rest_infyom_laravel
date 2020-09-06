@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Client Moral
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($clientMoral, ['route' => ['clientMorals.update', $clientMoral->id], 'method' => 'patch']) !!}

                        @include('client_morals.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection