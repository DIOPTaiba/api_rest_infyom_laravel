@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Client Salarie
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($clientSalarie, ['route' => ['clientSalaries.update', $clientSalarie->id], 'method' => 'patch']) !!}

                        @include('client_salaries.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection