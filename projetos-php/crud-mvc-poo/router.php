<?php 

$controller = (string) null;
$modo = (string) null;


if(isset($_GET['controller']) && isset($_GET['modo']) )
{
    $controller = $_GET['controller'];
    $modo = $_GET['modo'];
    //Estrutura para manipular cada Controller do 
    //nosso Projeto, essa informação será enviada 
    //pela view
    switch (strtoupper($controller))
    {
        case 'CONTATOS':
            //Import da Controller
            require_once('controller/contatoController.php');

            switch(strtoupper($modo))
            {
                case 'NOVO':
                    //Instancia da controller de Contato
                    $contatoController = new ContatoController();

                    //Metodo de inserir um novo Contato
                    $contatoController->novoContato();

                    break;

                case 'EDITAR':
					
                    $id = $_GET['id'];
                    
                    $contatoController = new ContatoController();
                    
                    $contatoController->atualizarContato($id);
                    
                    
                    break;
					
				case 'BUSCAR':
					//Recebe o Id do link do excluir da view
					$id = $_GET['id'];
					//Instancia da classe Controller
					$contatoController = new ContatoController();
					//Metodo buscar um Contato
					$contatoController->buscarContato($id);
					
					break;
                case 'EXCLUIR':
					
					//Recebe o Id do link do excluir da view
					$id = $_GET['id'];
					//Instancia da classe Controller
					$contatoController = new ContatoController();
					//Metodo para excluir o registro
					$contatoController->excluirContato($id);

                    break;

            }


            break;
        case 'PRODUTOS':
            //Ex:
            break;

        case 'USUARIOS':
            //Ex:
            break;
    }

}

?>