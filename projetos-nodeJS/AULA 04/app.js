//import da biblioteca express
const express = require('express');
//import a biblioteca de cors (permissão de acesso)
const cors = require('cors'); 
const body = require('body-parser');
const bodyParser = require('body-parser');
const { extend } = require('lodash');
const { urlencoded } = require('body-parser');



//instancia para a classe express
const app = express();

//Configura o Cors
// app.use ((request, response, next) => {
//     //console.log('teste');
//     response.header('Access-Control-Allow-Origin', '*');
//     response.header('Access-Control-Allow-Methods', 'GET');
//     app.use(cors());
//     next();
// });


//Configura o padrão de dados que vai chegar no body (json ou encoded)
// app.use(bodyParser.json());

app.use(urlencoded());


//EndPoint Raíz
app.get('/', cors(),function(request, response, next){
    //response.writeHead(200);
  response.sendFile(__dirname + '/index.html');
  //response.send('/view/index');
});

app.post('/novo', cors(),function(request, response, next){

    let statusCode;
    let mensagem;

    //import do arquivo de funções
    const controllerContato = require('./controller/controllerContato');

    if(controllerContato(request.body))
    {
        statusCode = 201;
        mensagem = request.body.nome + "<br>" + request.body.email;
    }else
    {
        statusCode = 400;
        mensagem = "Problemas no processamento";
    }
    
    response.status(statusCode);
    response.send(mensagem);
    
  //response.send('/view/index');
});

//Ativa o servidor HTTP para escutar na porta xxxx 8080, e cria uma função de CallBack para escrever uma mensagem
//Sempre deve ser a ultima linha
app.listen (8080, function(){
    console.log('Servidor aguardando requisições HTTP');
});