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
    if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET')
    {
        //Recebendo dados via URL para saber quem esta solicitando e qual ação será
            //realizada
        $component = strtoupper($_GET['component']);
        $action = strtoupper($_GET['action']);


        //Estrutura condicional para validar quem esta solicitando algo para o Router
        switch ($component)
            {
                case 'CONTATOS':
                    //import da controller Contatos
                    require_once('controller/controllerContatos.php');

                    //Validação para identificar o tipo de ação que será realizada
                    if($action == 'INSERIR')
                    {
                        //Chama a função de inserir na controller
                        $resposta = inserirContato($_POST);
                        //Valida o tipo de dados que a controller retornou
                        if(is_bool($resposta)) //Se for booleano
                        {
                            //Verificar se o retorno foi verdadeiro
                            if($resposta) 
                                echo("<script>
                                        alert('Registro Inserido com sucesso!');
                                        window.location.href = 'index.php'; 
                                    </script> ");
                        //Se o retorno for um array significa houve erro no processo de inserção           
                        }elseif (is_array($resposta)) 
                            echo("<script>
                                    alert('".$resposta['message']."');
                                    window.history.back(); 
                                </script> ");   
                    }elseif($action == 'DELETAR')
                    {
                        //Recebe o id do registro que deverá ser excluido, 
                        //que foi enviado pela url no link da imagem
                        //do excluir que foi acionado na index
                        $idContato = $_GET['id'];

                        $resposta = excluirContato($idContato);

                        if(is_bool($resposta))
                        {
                            if($resposta)
                            {
                                echo("<script>
                                        alert('Registro Excluído com sucesso!');
                                        window.location.href = 'index.php'; 
                                    </script> ");
                            }
                        }elseif (is_array($resposta))
                        {
                            echo("<script>
                                    alert('".$resposta['message']."');
                                    window.history.back(); 
                                 </script> ");   
                        }
                    }elseif ($action == 'BUSCAR')
                    {
                        $idContato = $_GET['id'];

                        $resposta = buscarContato($idContato);

                        if(is_bool($resposta))
                        {
                            if($resposta)
                            {
                                echo("<script>
                                        alert('Registro Excluído com sucesso!');
                                        window.location.href = 'index.php'; 
                                    </script> ");
                            }
                        }elseif (is_array($resposta))
                        {
                            echo("<script>
                                    alert('".$resposta['message']."');
                                    window.history.back(); 
                                 </script> ");   
                        } 
                    }elseif ($action == 'EDITAR')
                    {
                        $idContato = $_GET['id'];

                        //Chama a função de inserir na controller
                        $resposta = atualizarContato($_POST, $idContato);
                        //Valida o tipo de dados que a controller retornou
                        if(is_bool($resposta)) //Se for booleano
                        {
                            //Verificar se o retorno foi verdadeiro
                            if($resposta) 
                                echo("<script>
                                        alert('Registro Alterado com sucesso!');
                                        window.location.href = 'index.php'; 
                                    </script> ");
                        //Se o retorno for um array significa houve erro no processo de inserção           
                        }elseif (is_array($resposta)) 
                            echo("<script>
                                    alert('".$resposta['message']."');
                                    window.history.back(); 
                                </script> "); 
                    }

                    break;
            }    

        


    }

?>