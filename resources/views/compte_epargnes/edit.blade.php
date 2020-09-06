@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Compte Epargne
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($compteEpargne, ['route' => ['compteEpargnes.update', $compteEpargne->id], 'method' => 'patch']) !!}

                        @include('compte_epargnes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection