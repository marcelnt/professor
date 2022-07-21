<?php

/* Classe de conexão com o Banco de Dados Mysql  
 * Autor: Marcel Neves Teixeira   
 * Data de Criação: 25/11/2019
 * Data de Modificação:
 * Modificações realizadas:
*/

class conexaoMysql
{
    private $server;
    private $user;
    private $password;
    private $database;
    
    //Construtor para atribuir os dados de conexão
    public function __construct(){
        $this->server = "localhost";
        $this->user = "root";
        $this->password = "bcd127";
        $this->database = "dbcontatos20192tb";
    }
    
    //Conexão com o Banco de dados
    public function connectDatabase (){
        try{
            $conexao = new PDO('mysql:host='.$this->server.';dbname='.$this->database, $this->user, $this->password);

            return $conexao;
            
        }catch (PDOException $Erro) {
            echo("Erro de conexão com o  Banco de Dados. 
                  <br>
                 Linha do Erro: ". $Erro->getLine().
                 "Mensagem de Erro: " . $Erro->getMessage() 
                );
        }
        
    }
}










?>