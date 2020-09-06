<!-- Login Field -->
<div class="form-group col-sm-6">
    {!! Form::label('login', 'Login:') !!}
    {!! Form::text('login', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Mot De Passe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mot_de_passe', 'Mot De Passe:') !!}
    {!! Form::text('mot_de_passe', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Id Employes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_employes', 'Id Employes:') !!}
    {!! Form::number('id_employes', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('responsableComptes.index') }}" class="btn btn-default">Cancel</a>
</div>
