<?php

return [

    /**
     * Configurations Default Application
     */

    'title' => 'Localize Pet',

    /**
     * Menu Administrator - excluir depois
     */

    'menu' => [
          [
               'text' => 'Contribuidores',
               'submenu' => [
                    [
                        'text' => 'Listar',
                    ],
                    [
                         'text' => 'Cadastrar',
                    ],
               ],
          ],
          [
               'text' => 'Planos',
               'submenu' => [
                    [
                         'text' => 'Listar',
                    ],
                    [
                         'text' => 'Cadastrar',
                    ],
                    [
                         'text' => 'Excluídos',
                    ],
               ],
          ],
          [ 'header' => 'Gerenciamento de Usuários' ],
          [
               'text'    => 'Usuários',
               'submenu' => [
                    [
                         'text'  => 'Listar',
                    ],
                    [
                         'text'  => 'Cadastrar',
                    ],
                    [
                         'text'  => 'Excluídos',
                    ],
               ],
          ],
          [
               'text'    => 'Permissões',
               'icon'    => 'fas fa-user-shield',
               'submenu' => [
                    [
                         'text' => 'Listar',
                    ],
                    [
                         'text' => 'Cadastrar',
                    ],
                    [
                         'text' => 'Excluídos',
                    ],
               ],
          ],
          [
               'text'    => 'Funções',
               'submenu' => [
                    [
                         'text' => 'Listar',
                    ],
                    [
                         'text' => 'Cadastrar',
                    ],
                    [
                         'text' => 'Excluídos',
                    ],
               ],
          ],
          [ 'header' => 'Gerenciamento de Conteúdo' ],
          [
               'text' => 'Animais para Doação',
          ],
          [
               'text' => 'Animais Encontrados',
          ],
          [
               'text' => 'Animais Perdidos',
          ],
          [
               'text' => 'Anúncios',
          ],
          [
               'text' => 'Banner',
          ],
          [ 'header' => 'Configurações da Conta' ],
          [
               'text' => 'Perfil',
          ],
          [
               'text' => 'Mudar Senha',
          ],
          [
               'text' => 'Configurar Página',
          ],
    ],
];
