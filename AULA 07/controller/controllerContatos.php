<?php 
    /***********************************************************************
     * Objetivo: Arquivo responsavel pela maniupulação de dados de contatos
     *  Obs(Este arquivo fará a ponte entre a View e a Model)
     * Autor: Marcel
     * Data: 04/03/2022
     * Versão: 1.0
    ************************************************************************/
    require_once('model/bd/contatoDAO.php');

    //Função para receber dados da View e encaminhar para a model (Inserir)
    function inserirContato ($dados)
    {
        if (!empty($dados))
        {
            $arrayContato = gerarArrayDados($dados);
            if (insertContato($arrayContato))
                return true;
            else
                return array("id" => 1, "message" => "Erro no Script");
        }
    }

    //Função para receber dados da View e encaminhar para a model (Atualizar)
    function atualizarContato ()
    {

    }

    //Função para realizar a exclusão de um contato
    function excluirContato ()
    {

    }

    //Função para solicitar os dados da model e encaminhar a lista 
    //de contatos para a View
    function listarContato ()
    {
        $dados = selectAllContatos();
        if (!empty($dados))
            return $dados;
        else    
            return false;
    }


    function gerarArrayDados($dados)
    {
        $arrayDados = array (
            "nome" => $dados['txtNome'],
            "telefone" => $dados['txtTelefone'],
            "celular" => $dados['txtCelular'],
            "email" => $dados['txtEmail'],
            "obs" => $dados['txtObs']
        );

        return $arrayDados;
    }

?>