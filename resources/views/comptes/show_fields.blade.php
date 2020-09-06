<!-- Id Clients Field -->
<div class="form-group">
    {!! Form::label('id_clients', 'Id Clients:') !!}
    <p>{{ $comptes->id_clients }}</p>
</div>

<!-- Numero Compte Field -->
<div class="form-group">
    {!! Form::label('numero_compte', 'Numero Compte:') !!}
    <p>{{ $comptes->numero_compte }}</p>
</div>

<!-- Cle Rib Field -->
<div class="form-group">
    {!! Form::label('cle_rib', 'Cle Rib:') !!}
    <p>{{ $comptes->cle_rib }}</p>
</div>

<!-- Solde Field -->
<div class="form-group">
    {!! Form::label('solde', 'Solde:') !!}
    <p>{{ $comptes->solde }}</p>
</div>

<!-- Date Ouverture Field -->
<div class="form-group">
    {!! Form::label('date_ouverture', 'Date Ouverture:') !!}
    <p>{{ $comptes->date_ouverture }}</p>
</div>

<!-- Numero Agence Field -->
<div class="form-group">
    {!! Form::label('numero_agence', 'Numero Agence:') !!}
    <p>{{ $comptes->numero_agence }}</p>
</div>

