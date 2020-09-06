<!-- Type Operation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type_operation', 'Type Operation:') !!}
    {!! Form::text('type_operation', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Montant Field -->
<div class="form-group col-sm-6">
    {!! Form::label('montant', 'Montant:') !!}
    {!! Form::number('montant', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Operation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_operation', 'Date Operation:') !!}
    {!! Form::text('date_operation', null, ['class' => 'form-control','id'=>'date_operation']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#date_operation').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Id Compte Source Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_compte_source_id', 'Id Compte Source Id:') !!}
    {!! Form::number('id_compte_source_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Compte Destinataire Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_compte_destinataire_id', 'Id Compte Destinataire Id:') !!}
    {!! Form::number('id_compte_destinataire_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('operations.index') }}" class="btn btn-default">Cancel</a>
</div>
