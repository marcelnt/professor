<?php 
    require_once('conexaoMysql.php');

    function insertContato ($dados)
    {
        $conexao = conexaoMysql();
        $sql = "insert into tblcontatos (nome, telefone, celular, email, obs) values ('".$dados['nome']."', '".$dados['telefone']."', '".$dados['celular']."', '".$dados['email']."', '".$dados['obs']."')";

        if (mysqli_query($conexao, $sql))
            {
                if(mysqli_affected_rows($conexao))
                    {
                        closeConexaoMysql($conexao);
                        return true;
                    }
                else
                    {
                        closeConexaoMysql($conexao);
                        return false;
                    }
            }
        else
            return false;
           

    }

    function selectAllContatos(){
        $conexao = conexaoMysql();
        $sql = "select * from tblcontatos order by idcontato desc";
        $result = mysqli_query($conexao, $sql);
        if ($result)
        {
            $cont = 0;
            while ($rsDados = mysqli_fetch_assoc($result))
                {
                $arrayDados[$cont] = array (
                    "id" => $rsDados['idcontato'],
                    "nome" => $rsDados['nome'],
                    "telefone" => $rsDados['telefone'],
                    "celular" => $rsDados['celular'],
                    "email" => $rsDados['email'],
                    "obs" => $rsDados['obs']
                );
                $cont++;
            }

                return $arrayDados;
        }
        else
            return false;
            
    }

?>