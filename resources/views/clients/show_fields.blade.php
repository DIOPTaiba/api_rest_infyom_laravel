<!-- Id Responsable Compte Field -->
<div class="form-group">
    {!! Form::label('id_responsable_compte', 'Id Responsable Compte:') !!}
    <p>{{ $clients->id_responsable_compte }}</p>
</div>

<!-- Adresse Field -->
<div class="form-group">
    {!! Form::label('adresse', 'Adresse:') !!}
    <p>{{ $clients->adresse }}</p>
</div>

<!-- Telephone Field -->
<div class="form-group">
    {!! Form::label('telephone', 'Telephone:') !!}
    <p>{{ $clients->telephone }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $clients->email }}</p>
</div>

<!-- Date Inscription Field -->
<div class="form-group">
    {!! Form::label('date_inscription', 'Date Inscription:') !!}
    <p>{{ $clients->date_inscription }}</p>
</div>

<!-- Type Client Field -->
<div class="form-group">
    {!! Form::label('type_client', 'Type Client:') !!}
    <p>{{ $clients->type_client }}</p>
</div>

