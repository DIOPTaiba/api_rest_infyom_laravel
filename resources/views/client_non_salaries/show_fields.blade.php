<!-- Id Clients Field -->
<div class="form-group">
    {!! Form::label('id_clients', 'Id Clients:') !!}
    <p>{{ $clientNonSalarie->id_clients }}</p>
</div>

<!-- Nom Field -->
<div class="form-group">
    {!! Form::label('nom', 'Nom:') !!}
    <p>{{ $clientNonSalarie->nom }}</p>
</div>

<!-- Prenom Field -->
<div class="form-group">
    {!! Form::label('prenom', 'Prenom:') !!}
    <p>{{ $clientNonSalarie->prenom }}</p>
</div>

<!-- Carte Identite Field -->
<div class="form-group">
    {!! Form::label('carte_identite', 'Carte Identite:') !!}
    <p>{{ $clientNonSalarie->carte_identite }}</p>
</div>

