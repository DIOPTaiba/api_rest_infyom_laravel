<!-- Id Comptes Field -->
<div class="form-group">
    {!! Form::label('id_comptes', 'Id Comptes:') !!}
    <p>{{ $compteBloque->id_comptes }}</p>
</div>

<!-- Frais Ouverture Field -->
<div class="form-group">
    {!! Form::label('frais_ouverture', 'Frais Ouverture:') !!}
    <p>{{ $compteBloque->frais_ouverture }}</p>
</div>

<!-- Montant Remuneration Field -->
<div class="form-group">
    {!! Form::label('montant_remuneration', 'Montant Remuneration:') !!}
    <p>{{ $compteBloque->montant_remuneration }}</p>
</div>

<!-- Duree Blocage Field -->
<div class="form-group">
    {!! Form::label('duree_blocage', 'Duree Blocage:') !!}
    <p>{{ $compteBloque->duree_blocage }}</p>
</div>

