<li class="{{ Request::is('responsableComptes*') ? 'active' : '' }}">
    <a href="{{ route('responsableComptes.index') }}"><i class="fa fa-edit"></i><span>Responsable Comptes</span></a>
</li>

<li class="{{ Request::is('clients*') ? 'active' : '' }}">
    <a href="{{ route('clients.index') }}"><i class="fa fa-edit"></i><span>Clients</span></a>
</li>

<li class="{{ Request::is('clientMorals*') ? 'active' : '' }}">
    <a href="{{ route('clientMorals.index') }}"><i class="fa fa-edit"></i><span>Client Morals</span></a>
</li>

<li class="{{ Request::is('clientNonSalaries*') ? 'active' : '' }}">
    <a href="{{ route('clientNonSalaries.index') }}"><i class="fa fa-edit"></i><span>Client Non Salaries</span></a>
</li>

<li class="{{ Request::is('clientSalaries*') ? 'active' : '' }}">
    <a href="{{ route('clientSalaries.index') }}"><i class="fa fa-edit"></i><span>Client Salaries</span></a>
</li>

<li class="{{ Request::is('comptes*') ? 'active' : '' }}">
    <a href="{{ route('comptes.index') }}"><i class="fa fa-edit"></i><span>Comptes</span></a>
</li>

<li class="{{ Request::is('compteBloques*') ? 'active' : '' }}">
    <a href="{{ route('compteBloques.index') }}"><i class="fa fa-edit"></i><span>Compte Bloques</span></a>
</li>

<li class="{{ Request::is('compteCourants*') ? 'active' : '' }}">
    <a href="{{ route('compteCourants.index') }}"><i class="fa fa-edit"></i><span>Compte Courants</span></a>
</li>

<li class="{{ Request::is('compteEpargnes*') ? 'active' : '' }}">
    <a href="{{ route('compteEpargnes.index') }}"><i class="fa fa-edit"></i><span>Compte Epargnes</span></a>
</li>

<li class="{{ Request::is('etatComptes*') ? 'active' : '' }}">
    <a href="{{ route('etatComptes.index') }}"><i class="fa fa-edit"></i><span>Etat Comptes</span></a>
</li>

<li class="{{ Request::is('operations*') ? 'active' : '' }}">
    <a href="{{ route('operations.index') }}"><i class="fa fa-edit"></i><span>Operations</span></a>
</li>

