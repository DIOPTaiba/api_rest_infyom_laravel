<!-- Id Comptes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_comptes', 'Id Comptes:') !!}
    {!! Form::number('id_comptes', null, ['class' => 'form-control']) !!}
</div>

<!-- Frais Ouverture Field -->
<div class="form-group col-sm-6">
    {!! Form::label('frais_ouverture', 'Frais Ouverture:') !!}
    {!! Form::number('frais_ouverture', null, ['class' => 'form-control']) !!}
</div>

<!-- Montant Remuneration Field -->
<div class="form-group col-sm-6">
    {!! Form::label('montant_remuneration', 'Montant Remuneration:') !!}
    {!! Form::number('montant_remuneration', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('compteEpargnes.index') }}" class="btn btn-default">Cancel</a>
</div>
