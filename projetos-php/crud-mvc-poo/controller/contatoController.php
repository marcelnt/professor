<?php 

/* Classe de Controller Contato  
 * Autor: Marcel Neves Teixeira   
 * Data de Criação: 25/11/2019
 * Data de Modificação:
 * Modificações realizadas:
*/

class ContatoController{
    
    private $contato;
    
    public function __construct(){
        
        //Import das classes de Contato e ContatoDAO
        require_once('model/contatoClass.php');
        require_once('model/DAO/contatoDAO.php');
        
        
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            //Instancia do obejto Contato
            $this->contato = new Contato();

            //Envia para os atributos da classe o Post do Form
            $this->contato->setNome($_POST['txtnome']);
            $this->contato->setTelefone($_POST['txttelefone']);
            $this->contato->setCelular($_POST['txtcelular']);
            $this->contato->setEmail($_POST['txtemail']);
        }
    }
    
    //Inserir um novo Contato
    public function novoContato(){

        //Instancia do objeto ContatoDAO
        $contatoDAO = new ContatoDAO();
        
        if($contatoDAO->insertContato($this->contato))
			header('location:index.php');
		else
			echo("Não foi possivel inserir o Registro");
        
        
    }
	
	//Listar Contatos
	public function listarContato()
	{
		//Instancia da classe ContatoDAO
		$contatoDAO = new ContatoDAO();
		
		//Metodo para retornar a lista de contatos
		return $contatoDAO->selectAllContato();
	}
	//Excluir contato
	public function excluirContato($idContato)
	{
		//Instancia da Classe Contato DAO
		$contatoDAO = new ContatoDAO();
		
		//Metodo para excluir o registro no BD
		if($contatoDAO->deleteContato($idContato))
			header('location:index.php');
		else
			echo("Não foi possivel excluir o Registro");
	}
	//Busca um Contato pelo Id
	public function buscarContato($idContato)
	{
		//Instancia da Classe Contato DAO
		$contatoDAO = new ContatoDAO();
		
		//Metodo para buscar um Contato pelo ID
		$contatoDados = $contatoDAO->selectByIdContato($idContato);
        
   
		
		require_once('index.php');
		
	}
    
    public function atualizarContato($idContato)
    {
        $this->contato->setCodigo($idContato);
        
         //Instancia do objeto ContatoDAO
        $contatoDAO = new ContatoDAO();
        
        if($contatoDAO->updateContato($this->contato))
			header('location:index.php');
		else
			echo("Não foi possivel editar o Registro");
    }
    
}

?>






