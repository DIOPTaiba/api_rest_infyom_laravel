<!-- Type Operation Field -->
<div class="form-group">
    {!! Form::label('type_operation', 'Type Operation:') !!}
    <p>{{ $operations->type_operation }}</p>
</div>

<!-- Montant Field -->
<div class="form-group">
    {!! Form::label('montant', 'Montant:') !!}
    <p>{{ $operations->montant }}</p>
</div>

<!-- Date Operation Field -->
<div class="form-group">
    {!! Form::label('date_operation', 'Date Operation:') !!}
    <p>{{ $operations->date_operation }}</p>
</div>

<!-- Id Compte Source Id Field -->
<div class="form-group">
    {!! Form::label('id_compte_source_id', 'Id Compte Source Id:') !!}
    <p>{{ $operations->id_compte_source_id }}</p>
</div>

<!-- Id Compte Destinataire Id Field -->
<div class="form-group">
    {!! Form::label('id_compte_destinataire_id', 'Id Compte Destinataire Id:') !!}
    <p>{{ $operations->id_compte_destinataire_id }}</p>
</div>

