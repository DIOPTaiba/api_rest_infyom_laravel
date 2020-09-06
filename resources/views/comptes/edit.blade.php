@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Comptes
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($comptes, ['route' => ['comptes.update', $comptes->id], 'method' => 'patch']) !!}

                        @include('comptes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection