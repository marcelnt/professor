<?php 
    
    
    //constantes para estabelecer a conexão com o BD (local do BD, usuário, senha e database)
    const SERVER = 'localhost';
    const USER = 'root';
    const PASSWORD = 'bcd127';
    const DATABASE = 'dbcontatos';

    /********** Tabela de configuração de ERROS e MENSAGENS do sistema *************************************************
    *    
    *    
    *    ErroNumberId   Description                                                             Message
    *    1              Erro de manipulção de dados com o Banco de Dados                        Não foi possivel manipular os dados no Banco de Dados
    *    2              Erro de campos obrigatórios                                             Existem campos obrigatório que não foram preenchidos
    *    3              Erro de Script SQL quando executado no Banco de Dados                   O banco de dados não pode realizar essa operação.
    *    4              Erro de ID inválido para executar ação de buscar, excluir ou editar     Não é possível realizar esta ação sem informar um id válido.
    ******************************************************************************************************************/

    const ERRO_SCRIPT_SQL = array('idErro'   => 1,
                                  'message'  => 'Não foi possivel manipular os dados no Banco de Dados.'
                            );

    const ERRO_CAMPOS_OBRIGATORIOS = array( 'idErro'   => 2,
                                            'message'  => 'Existem campos obrigatório que não foram preenchidos.'
                            );

    const ERRO_INVALID_ID = array('idErro'   => 4,
                                  'message'  => 'Não é possível excluir um registro sem informar um id válido.'
                            );



    
?>