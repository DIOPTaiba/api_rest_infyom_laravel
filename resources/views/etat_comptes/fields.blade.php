<!-- Etat Compte Field -->
<div class="form-group col-sm-6">
    {!! Form::label('etat_compte', 'Etat Compte:') !!}
    {!! Form::text('etat_compte', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Date Changement Etat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_changement_etat', 'Date Changement Etat:') !!}
    {!! Form::text('date_changement_etat', null, ['class' => 'form-control','id'=>'date_changement_etat']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#date_changement_etat').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('etatComptes.index') }}" class="btn btn-default">Cancel</a>
</div>
