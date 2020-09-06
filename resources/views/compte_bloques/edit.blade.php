@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Compte Bloque
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($compteBloque, ['route' => ['compteBloques.update', $compteBloque->id], 'method' => 'patch']) !!}

                        @include('compte_bloques.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection