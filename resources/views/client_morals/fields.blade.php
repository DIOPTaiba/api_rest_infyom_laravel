<!-- Id Clients Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_clients', 'Id Clients:') !!}
    {!! Form::number('id_clients', null, ['class' => 'form-control']) !!}
</div>

<!-- Nom Entreprise Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom_entreprise', 'Nom Entreprise:') !!}
    {!! Form::text('nom_entreprise', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Identifiant Entreprise Field -->
<div class="form-group col-sm-6">
    {!! Form::label('identifiant_entreprise', 'Identifiant Entreprise:') !!}
    {!! Form::text('identifiant_entreprise', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Raison Social Field -->
<div class="form-group col-sm-6">
    {!! Form::label('raison_social', 'Raison Social:') !!}
    {!! Form::text('raison_social', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('clientMorals.index') }}" class="btn btn-default">Cancel</a>
</div>
