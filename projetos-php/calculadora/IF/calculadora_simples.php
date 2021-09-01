<?php 

//Declarando variaveis e definindo o seu tipo de dados
$resultado = (double) 0;
$valor1 = (double) 0;
$valor2 = (double) 0;
$operacao = (string) null;

$chkSubtrair = (string) null;
$chkMultiplicar = (string) null;

//Criando constantes para o projeto

//Forma 01 de criar uma constante
define('ERRO_CAIXA_VAZIA', "<span class='msgErro'>Não é possível calcular sem preencher todos os dados!</span>");

//Forma 02 de criar uma constante
const ERRO_DADOS_NAO_NUMERICOS = "<span class='msgErro'>Não é possível relizar calculos com valores não númericos</span>";


/*
    -string - Tipo de dados Texto
    -int ou integer - Tipo de dados númerico inteiro
    -double - Tipo de dados númerico com casas decimais (capacidade maior de armazenamento)
    -float - Tipo de dados númerico com casas decimais (capacidade menor de armazenamento)
    -boolean ou bool - Tipo de dados (True/false)
    -array - Tipo de dados para vetores e matrizes
    -object - Tipo de dados para referenciar um objeto

*/

//Validação para verificar se o botão calcular foi acionado
if (isset($_POST['btncalc']))
{
    //empty() permite verificar se um elemento é vazio
    
    //if($_POST['txtn1']=="" || $_POST['txtn2']=="")
    
    //Validação para caixa vazia
    if(empty($_POST['txtn1']) || empty($_POST['txtn2']))
        echo (ERRO_CAIXA_VAZIA);
    else
    {
        //Resgatando valores do formulário no HTML
        $valor1 = $_POST['txtn1'];
        $valor2 = $_POST['txtn2'];

        //Resgata o valor do radio e converte a escrita para MAIUSCULO
        //strtoupper() maiusculo
        //strtolower() minusculo
        
        //Validação para a escolha de uma operação de calculo
        if (isset($_POST['rdocalc']))
        {
            $operacao = strtoupper($_POST['rdocalc']);
            
            //Validação para verificar se os dados são numeros
            if(is_numeric($valor1) && is_numeric($valor2))
            {
            
                //Validação para identificar os tipos de calculos
                if($operacao == 'SOMAR')
                    $resultado = $valor1 + $valor2;
                elseif($operacao == 'SUBTRAIR')
                {
                    $resultado = $valor1 - $valor2;
                    $chkSubtrair = 'checked';
                }
                elseif($operacao == 'MULTIPLICAR')
                {
                    $resultado = $valor1 * $valor2;
                    $chkMultiplicar = 'checked';
                }
                elseif($operacao == 'DIVIDIR')
                    $resultado = round($valor1 / $valor2, 3);
                
            }//Validação para verificar se os dados são numeros
            else
                echo(ERRO_DADOS_NAO_NUMERICOS);
        }//Validação para a escolha de uma operação de calculo
        else
            echo(ERRO_CAIXA_VAZIA);

    } //Validação para caixa vazia
    
} //Validação para verificar se o botão calcular foi acionado


?>


<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Calculadora - Simples</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
	<body>
        
        <div id="conteudo">
            <div id="titulo">
                Calculadora Simples
            </div>

            <div id="form">
                <form name="frmcalculadora" method="post" action="">
                    <div>
                        <label>Valor 1:</label>
                        <input type="text" name="txtn1" value="<?=$valor1?>" > <br>
                    </div>
                    <div>
                        <label>Valor 2:</label>
                        <input type="text" name="txtn2" value="<?=$valor2?>" > <br>
                    </div>
                    
                    <div id="container_opcoes">
                        <div>
                            <input type="radio" name="rdocalc" value="somar" <?php 
                                        if($operacao == 'SOMAR')
                                            echo ('checked');
                                        ?> >Somar
                        </div>
                        <div>
                            <input type="radio" name="rdocalc" value="subtrair" <?=$chkSubtrair?>>Subtrair
                        </div>
                        <div>
                            <input type="radio" name="rdocalc" value="multiplicar"<?=$chkMultiplicar?> >Multiplicar
                        </div>
                        <div>    
                            <input type="radio" name="rdocalc" value="dividir" <?= $operacao=='DIVIDIR' ? 'checked' : '' ?> > Dividir
                        </div>
                        <div>
                            <input type="submit" name="btncalc" value ="Calcular" >
                            
                        </div>    

                    </div>	
                    <div id="resultado">
                        <?=$resultado?>
                    </div>

                </form>
            </div>
           
        </div>
        
		
	</body>

</html>

