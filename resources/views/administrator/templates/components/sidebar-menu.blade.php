<li class="homepage nav-without-children">
    <a class="nav-link" href="{{ route('administrator.home') }}">
        <i class="fas fa-home" aria-hidden="true"></i>
        <span>Inicial</span>
    </a>
</li>

<li class="banners nav-parent">
    <a class="nav-link" href="#">
        <i class="fas fa-pager" aria-hidden="true"></i>
        <span>Banner</span>
    </a>
    <ul class="nav nav-children">
        <li class="banner-type-header">
            <a class="nav-link" href="{{ route('administrator.banners.index', ['header']) }}">
                Cabeçalho
            </a>
        </li>
        <li class="banner-type-footer">
            <a class="nav-link" href="{{ route('administrator.banners.index', ['footer']) }}">
                Rodapé
            </a>
        </li>
    </ul>
</li>

<li class="nav-parent">
    <a class="nav-link" href="#">
        <i class="fas fa-paw" aria-hidden="true"></i>
        <span>Animais Anúncios</span>
    </a>
    <ul class="nav nav-children">
        <li>
            <a class="nav-link" href="#">
                Aprovar
            </a>
        </li>
        <li>
            <a class="nav-link" href="#">
                Listar
            </a>
        </li>
        <li>
            <a class="nav-link" href="#">
                Cadastrar
            </a>
        </li>
        <li>
            <a class="nav-link" href="#">
                Excluídos
            </a>
        </li>
    </ul>
</li>

<li class="parameters nav-parent">
    <a class="nav-link" href="#">
        <i class="fas fa-cog" aria-hidden="true"></i>
        <span>Parâmetros</span>
    </a>
    <ul class="nav nav-children">
        <li class="animal-types nav-parent">
            <a href="#">
                Tipo de Animais
            </a>
            <ul class="nav nav-children" style="">
                <li class="list">
                    <a class="nav-link" href="{{ route('administrator.parameters.animal-types.index') }}">
                        Listar
                    </a>
                </li>
                <li class="create">
                    <a class="nav-link" href="{{ route('administrator.parameters.animal-types.create') }}">
                        Cadastrar
                    </a>
                </li>
            </ul>
        </li>
        <li class="species nav-parent">
            <a href="#">
                Espécies de Animais
            </a>
            <ul class="nav nav-children" style="">
                <li class="list">
                    <a class="nav-link" href="{{ route('administrator.parameters.species.index') }}">
                        Listar
                    </a>
                </li>
                <li class="create">
                    <a class="nav-link" href="{{ route('administrator.parameters.species.create') }}">
                        Cadastrar
                    </a>
                </li>
            </ul>
        </li>
        <li class="breeds nav-parent">
            <a href="#">
                Raças de Animais
            </a>
            <ul class="nav nav-children" style="">
                <li class="list">
                    <a class="nav-link" href="{{ route('administrator.parameters.breeds.index') }}">
                        Listar
                    </a>
                </li>
                <li class="create">
                    <a class="nav-link" href="{{ route('administrator.parameters.breeds.create') }}">
                        Cadastrar
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</li>

<!-- 

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
            <a class="nav-link" href="#">
                Listar
            </a>
        </li>
        <li>
            <a class="nav-link" href="#">
                Cadastrar
            </a>
        </li>
    </ul>
</li>

-->

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