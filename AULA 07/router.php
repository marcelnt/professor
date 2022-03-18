<?php 
    /***************************************************************************
     * Objetivo: Arquivo de rota, para segmentar as ações encaminhadas pela View
     *      (dados de um form, listagem de dados, ação de excluir ou atualizar).
     *      Esse arquivo será responsável por encaminhar as solicitações para
     *      a Controller
     * Autor: Marcel
     * Data: 04/03/2022
     * Versão: 1.0
     * 
     **************************************************************************/

    $action = (string) null; 
    $component = (string) null; 
    
    //Validação para verificar se a requisição é um POST de um formulário
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        //Recebendo dados via URL para saber quem esta solicitando e qual ação será
            //realizada
        $component = strtoupper($_GET['component']);
        $action = $_GET['action'];

        //Estrutura condicional para validar quem esta solicitando algo para o Router
        switch ($component)
            {
                case 'CONTATOS':
                    require_once('controller/controllerContatos.php');
                    $resposta = inserirContato($_POST);
                    if (is_bool($resposta))
                    {
                        if($resposta)
                            echo("
                            <script>
                                alert ('Registro inserido!');
                                window.location.href='index.php';
                            </script>
                            ");
                    }    
                    elseif (is_array($resposta))
                        echo($resposta['message']);
         
            }    

        


    }

?>