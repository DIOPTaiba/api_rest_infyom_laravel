<!-- Id Clients Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_clients', 'Id Clients:') !!}
    {!! Form::number('id_clients', null, ['class' => 'form-control']) !!}
</div>

<!-- Numero Compte Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero_compte', 'Numero Compte:') !!}
    {!! Form::text('numero_compte', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Cle Rib Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cle_rib', 'Cle Rib:') !!}
    {!! Form::number('cle_rib', null, ['class' => 'form-control']) !!}
</div>

<!-- Solde Field -->
<div class="form-group col-sm-6">
    {!! Form::label('solde', 'Solde:') !!}
    {!! Form::number('solde', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Ouverture Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_ouverture', 'Date Ouverture:') !!}
    {!! Form::text('date_ouverture', null, ['class' => 'form-control','id'=>'date_ouverture']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#date_ouverture').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Numero Agence Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero_agence', 'Numero Agence:') !!}
    {!! Form::number('numero_agence', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('comptes.index') }}" class="btn btn-default">Cancel</a>
</div>
