@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Operations
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($operations, ['route' => ['operations.update', $operations->id], 'method' => 'patch']) !!}

                        @include('operations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection