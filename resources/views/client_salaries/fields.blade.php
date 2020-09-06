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

<!-- Profession Field -->
<div class="form-group col-sm-6">
    {!! Form::label('profession', 'Profession:') !!}
    {!! Form::text('profession', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Salaire Field -->
<div class="form-group col-sm-6">
    {!! Form::label('salaire', 'Salaire:') !!}
    {!! Form::number('salaire', null, ['class' => 'form-control']) !!}
</div>

<!-- Nom Employeur Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom_employeur', 'Nom Employeur:') !!}
    {!! Form::text('nom_employeur', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Adresse Entreprise Field -->
<div class="form-group col-sm-6">
    {!! Form::label('adresse_entreprise', 'Adresse Entreprise:') !!}
    {!! Form::text('adresse_entreprise', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Raison Social Field -->
<div class="form-group col-sm-6">
    {!! Form::label('raison_social', 'Raison Social:') !!}
    {!! Form::text('raison_social', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Identifiant Entreprise Field -->
<div class="form-group col-sm-6">
    {!! Form::label('identifiant_entreprise', 'Identifiant Entreprise:') !!}
    {!! Form::text('identifiant_entreprise', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('clientSalaries.index') }}" class="btn btn-default">Cancel</a>
</div>
