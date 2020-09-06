<!-- Id Clients Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_clients', 'Id Clients:') !!}
    {!! Form::number('id_clients', null, ['class' => 'form-control']) !!}
</div>

<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', 'Nom:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Prenom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prenom', 'Prenom:') !!}
    {!! Form::text('prenom', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Carte Identite Field -->
<div class="form-group col-sm-6">
    {!! Form::label('carte_identite', 'Carte Identite:') !!}
    {!! Form::text('carte_identite', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('clientNonSalaries.index') }}" class="btn btn-default">Cancel</a>
</div>
