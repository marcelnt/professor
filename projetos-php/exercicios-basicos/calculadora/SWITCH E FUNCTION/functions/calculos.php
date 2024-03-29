<?php 


//Função para Calcular operações matemáticas
function calcular($n1, $n2, $tipoCalculo)
{
    //Criando variaveis locais dentro da função
    $numero1 = (double) 0;
    $numero2 = (double) 0;
    $total = (double) 0;
    $opcaoCalculo = (string) null;
    
    //Guardando os valores dos argumentos nas variaveis locais na função
    $numero1 = $n1;
    $numero2 = $n2;
    $opcaoCalculo = $tipoCalculo;
    
    //Verificação para qual tipo de calculo será realizado
    switch ($opcaoCalculo) {
        case ('SOMAR'):
            $total = $numero1 + $numero2;
            break;
        case ('SUBTRAIR'):
            $total = $numero1 - $numero2;
            break;

        case ('MULTIPLICAR'):
            $total = $numero1 * $numero2;
            break;

        case ('DIVIDIR'):
            //Tratamento de erro para divisão por zero
            if($numero2 == 0)
                echo(ERRO_DIVISAO_ZERO);
            else
                $total = round($numero1 / $numero2, 3);

            break;

        //Essa opção somente será executada caso nenhuma das opções do CASE seja válidada    
        default:
            echo(ERRO_CAIXA_VAZIA);
    }
    
  return $total;  
}


?>