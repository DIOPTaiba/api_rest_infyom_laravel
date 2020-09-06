<!-- Id Responsable Compte Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_responsable_compte', 'Id Responsable Compte:') !!}
    {!! Form::number('id_responsable_compte', null, ['class' => 'form-control']) !!}
</div>

<!-- Adresse Field -->
<div class="form-group col-sm-6">
    {!! Form::label('adresse', 'Adresse:') !!}
    {!! Form::text('adresse', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Telephone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telephone', 'Telephone:') !!}
    {!! Form::text('telephone', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Date Inscription Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_inscription', 'Date Inscription:') !!}
    {!! Form::text('date_inscription', null, ['class' => 'form-control','id'=>'date_inscription']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#date_inscription').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Type Client Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type_client', 'Type Client:') !!}
    {!! Form::text('type_client', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('clients.index') }}" class="btn btn-default">Cancel</a>
</div>
