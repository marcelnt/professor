<?php 

/* Classe de ContatoDAO  
 * Autor: Marcel Neves Teixeira   
 * Data de Criação: 25/11/2019
 * Data de Modificação:
 * Modificações realizadas:
*/

class ContatoDAO {
    
    private $conexaoMysql;
    private $conexao;
    
    public function __construct(){
        
        //Importa o arquivo de conexão com o Mysql
        require_once('conexaoMysql.php');
        
        //Instancia no Objeto de conexão com o Mysql
        $this->conexaoMysql = new conexaoMysql();
        
        //Abre a conexão com o BD
        $this->conexao = $this->conexaoMysql->connectDatabase();
    }
    
    //Insere um novo Contato
    public function insertContato(Contato $contato)
    {
        $sql = "insert into tblcontatos 
                (nome, telefone, celular, email)
                
                values(?,?,?,?)
                
                ";
        
        $statement = $this->conexao->prepare($sql);
        
        $statement_dados = array(
            $contato->getNome(),
            $contato->getTelefone(),
            $contato->getCelular(),
            $contato->getEmail()
        );
            
        if($statement->execute($statement_dados))
            return true;
        else
            return false;
            
    }
    
    //Atualiza um Contato
    public function updateContato(Contato $contato)
    {
        $sql = "update tblcontatos set nome=?, telefone=?,
                celular=?, email=? where codigo=?
                ";
        
        $statement = $this->conexao->prepare($sql);
        
        $statement_dados = array(
            $contato->getNome(),
            $contato->getTelefone(),
            $contato->getCelular(),
            $contato->getEmail(),
            $contato->getCodigo()
        );
            
        if($statement->execute($statement_dados))
            return true;
        else
            return false; 
    }
    
    //Apaga um Contato
    public function deleteContato($idContato)
    {
       	$sql = "delete from tblcontatos 
	   	where codigo=".$idContato;
		
		if($this->conexao->query($sql))
			return true;
		else
			return false;
		
    }
    
    //Seleciona todos os Contatos
    public function selectAllContato()
    {
     	$sql = "select * from tblcontatos"; 
		
		$select = $this->conexao->query($sql);
		
		//$select->fetch(PDO::FETCH_ASSOC)
		//O objeto select ja tem um metodo de fetch proprio, para realizar a conversão precisamos informar o tipo de fetch a ser realizado
		//PDO::FETCH_ASSOC
		
		$cont = 0;
		
		while ($rs = $select->fetch(PDO::FETCH_ASSOC))
		{
			//Cria uma coleção de objetos para guardar os dados do BD
			$contatos[] = new Contato();
			
			$contatos[$cont]->setCodigo($rs['codigo']);
			$contatos[$cont]->setNome($rs['nome']);
			$contatos[$cont]->setTelefone($rs['telefone']);
			$contatos[$cont]->setCelular($rs['celular']);
			$contatos[$cont]->setEmail($rs['email']);
			
			$cont++;
		}
		
		return $contatos;
		
    }
    
    //Busca um Contato pelo Id
    public function selectByIdContato($idContato)
    {
        $sql = "select * from tblcontatos
			where codigo = ".$idContato;
		
		$select = $this->conexao->query($sql);
		
		if($rs = $select->fetch(PDO::FETCH_ASSOC))
		{
			$contato = new Contato();
			
			$contato->setCodigo($rs['codigo']);
			$contato->setNome($rs['nome']);
			$contato->setTelefone($rs['telefone']);
			$contato->setCelular($rs['celular']);
			$contato->setEmail($rs['email']);
			
		}
		
		return $contato;
    }
    
    
    
}

?>