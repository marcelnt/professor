<?php 
    $form = (string) "router.php?component=contatos&action=inserir";

    if(session_status())
    {
        if(!empty($_SESSION['dadosContato']))
        {
            $id = $_SESSION['dadosContato'][0]['id'];
            $nome = $_SESSION['dadosContato'][0]['nome'];
            $telefone = $_SESSION['dadosContato'][0]['telefone'];
            $celular = $_SESSION['dadosContato'][0]['celular'];
            $email = $_SESSION['dadosContato'][0]['email'];
            $obs = $_SESSION['dadosContato'][0]['obs'];

            unset($_SESSION['dadosContato']);

            $form = (string) "router.php?component=contatos&action=editar&id=".$id;
            
        }
    }    
?>
<!DOCTYPE>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title> Cadastro </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">


    </head>
    <body>
       
        <div id="cadastro"> 
            <div id="cadastroTitulo"> 
                <h1> Cadastro de Contatos </h1>
                
            </div>
            <div id="cadastroInformacoes">
                <form  action="<?=$form?>" name="frmCadastro" 
                method="post" >
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Nome: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNome" value="<?= isset($nome)?$nome:null ?>" placeholder="Digite seu Nome" maxlength="100">
                        </div>
                    </div>
                                     
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Telefone: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="tel" name="txtTelefone" value="<?= isset($telefone)?$telefone:null ?>">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Celular: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="tel" name="txtCelular" value="<?= isset($nome)?$telefone:null ?>">
                        </div>
                    </div>
                   
                    
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Email: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="email" name="txtEmail" value="<?= isset($email)?$email:null ?>">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Observações: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <textarea name="txtObs" cols="50" rows="7"><?= isset($obs)?$obs:null ?></textarea>
                        </div>
                    </div>
                    <div class="enviar">
                        <div class="enviar">
                            <input type="submit" name="btnEnviar" value="Salvar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="consultaDeDados">
            <table id="tblConsulta" >
                <tr>
                    <td id="tblTitulo" colspan="6">
                        <h1> Consulta de Dados.</h1>
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblColunas destaque"> Nome </td>
                    <td class="tblColunas destaque"> Celular </td>
                    <td class="tblColunas destaque"> Email </td>
                    <td class="tblColunas destaque"> Opções </td>
                </tr>
                
               <?php 
                    //import do arquivo da controller para solicitar a listagem dos dados
                    require_once('controller/controllerContatos.php');
                    //Chama a função que vai retornar os dados de contatos
                    $listContato = listarContato();
                    //estrutura de repetição para retorar os dados do array 
                    //e printar na tela
                    foreach($listContato as $item)
                    {
                    ?>
                        <tr id="tblLinhas">
                            <td class="tblColunas registros"><?=$item['nome']?></td>
                            <td class="tblColunas registros"><?=$item['celular']?></td>
                            <td class="tblColunas registros"><?=$item['email']?></td>
                        
                            <td class="tblColunas registros">
                                <a href = "router.php?component=contatos&action=buscar&id=<?=$item['id']?>">
                                    <img src="img/edit.png" alt="Editar" title="Editar" class="editar">
                                </a>
                                
                                <a href = "router.php?component=contatos&action=deletar&id=<?=$item['id']?>">
                                    <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                                </a>
                                <img src="img/search.png" alt="Visualizar" title="Visualizar" class="pesquisar">
                            </td>
                        </tr>
                    <?php 
                        }
                    ?>
            </table>
        </div>
    </body>
</html>