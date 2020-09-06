<div class="table-responsive">
    <table class="table" id="etatComptes-table">
        <thead>
            <tr>
                <th>Etat Compte</th>
        <th>Date Changement Etat</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($etatComptes as $etatCompte)
            <tr>
                <td>{{ $etatCompte->etat_compte }}</td>
            <td>{{ $etatCompte->date_changement_etat }}</td>
                <td>
                    {!! Form::open(['route' => ['etatComptes.destroy', $etatCompte->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('etatComptes.show', [$etatCompte->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('etatComptes.edit', [$etatCompte->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
