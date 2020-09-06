<!-- Id Comptes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_comptes', 'Id Comptes:') !!}
    {!! Form::number('id_comptes', null, ['class' => 'form-control']) !!}
</div>

<!-- Agios Field -->
<div class="form-group col-sm-6">
    {!! Form::label('agios', 'Agios:') !!}
    {!! Form::number('agios', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('compteCourants.index') }}" class="btn btn-default">Cancel</a>
</div>
