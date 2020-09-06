<!-- Login Field -->
<div class="form-group">
    {!! Form::label('login', 'Login:') !!}
    <p>{{ $responsableCompte->login }}</p>
</div>

<!-- Mot De Passe Field -->
<div class="form-group">
    {!! Form::label('mot_de_passe', 'Mot De Passe:') !!}
    <p>{{ $responsableCompte->mot_de_passe }}</p>
</div>

<!-- Id Employes Field -->
<div class="form-group">
    {!! Form::label('id_employes', 'Id Employes:') !!}
    <p>{{ $responsableCompte->id_employes }}</p>
</div>

