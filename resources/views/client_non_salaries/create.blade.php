@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Client Non Salarie
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'clientNonSalaries.store']) !!}

                        @include('client_non_salaries.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
