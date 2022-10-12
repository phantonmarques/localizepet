<li class="homepage nav-without-children">
    <a class="nav-link" href="{{ route('administrator.home') }}">
        <i class="fas fa-home" aria-hidden="true"></i>
        <span>Inicial</span>
    </a>
</li>

<li class="banners nav-without-children">
    <a class="nav-link" href="{{ route('administrator.banners.index') }}">
        <i class="fas fa-pager" aria-hidden="true"></i>
        <span>Banner</span>
    </a>
</li>

<li class="nav-parent">
    <a class="nav-link" href="#">
        <i class="fas fa-paw" aria-hidden="true"></i>
        <span>Animais Anúncios</span>
    </a>
    <ul class="nav nav-children">
        <li>
            <a class="nav-link" href="index.html">
                Aprovar
            </a>
        </li>
        <li>
            <a class="nav-link" href="index.html">
                Listar
            </a>
        </li>
        <li>
            <a class="nav-link" href="layouts-default.html">
                Cadastrar
            </a>
        </li>
        <li>
            <a class="nav-link" href="layouts-default.html">
                Excluídos
            </a>
        </li>
    </ul>
</li>

<li>
    <a class="nav-link" href="#">
        <i class="fas fa-user-plus" aria-hidden="true"></i>
        <span>Contribuidores</span>
    </a>
</li>

<li class="nav-parent">
    <a class="nav-link" href="#">
        <i class="fas fa-donate" aria-hidden="true"></i>
        <span>Contribuições</span>
    </a>
    <ul class="nav nav-children">
        <li>
            <a class="nav-link" href="index.html">
                Listar
            </a>
        </li>
        <li>
            <a class="nav-link" href="layouts-default.html">
                Cadastrar
            </a>
        </li>
    </ul>
</li>

<li class="ong nav-parent">
    <a class="nav-link" href="#">
        <i class="far fa-file-alt" aria-hidden="true"></i>
        <span>Página Personalizada</span>
    </a>
    <ul class="nav nav-children">
        <li class="list">
            <a class="nav-link" href="{{ route('administrator.ongs.details') }}">
                Detalhes
            </a>
        </li>
        <li class="create">
            <a class="nav-link" href="#">
                Fotos
            </a>
        </li>
        <li class="create">
            <a class="nav-link" href="#">
                Telefones
            </a>
        </li>
    </ul>
</li>

<li class="permissions nav-parent">
    <a class="nav-link" href="#">
        <i class="fas fa-shield-alt" aria-hidden="true"></i>
        <span>Permissões</span>
    </a>
    <ul class="nav nav-children">
        <li class="list">
            <a class="nav-link" href="{{ route('administrator.permissions.index') }}">
                Listar
            </a>
        </li>
        <li class="create">
            <a class="nav-link" href="{{ route('administrator.permissions.create') }}">
                Cadastrar
            </a>
        </li>
    </ul>
</li>

<li class="roles nav-parent">
    <a class="nav-link" href="#">
        <i class="fas fa-user-shield" aria-hidden="true"></i>
        <span>Funções</span>
    </a>
    <ul class="nav nav-children">
        <li class="list">
            <a class="nav-link" href="{{ route('administrator.roles.index') }}">
                Listar
            </a>
        </li>
        <li class="create">
            <a class="nav-link" href="{{ route('administrator.roles.create') }}">
                Cadastrar
            </a>
        </li>
    </ul>
</li>

<li class="users nav-parent">
    <a class="nav-link" href="#">
        <i class="fas fa-users" aria-hidden="true"></i>
        <span>Usuários</span>
    </a>
    <ul class="nav nav-children">
        <li class="list">
            <a class="nav-link" href="{{ route('administrator.users.index') }}">
                Listar
            </a>
        </li>
        <li class="create">
            <a class="nav-link" href="{{ route('administrator.users.create') }}">
                Cadastrar
            </a>
        </li>
        <li class="trashed">
            <a class="nav-link" href="{{ route('administrator.users.trashed') }}">
                Excluídos
            </a>
        </li>
    </ul>
</li>

<li>
    <a class="nav-link" href="#">
        <i class="fas fa-clipboard-list" aria-hidden="true"></i>
        <span>Logs</span>
    </a>
</li>