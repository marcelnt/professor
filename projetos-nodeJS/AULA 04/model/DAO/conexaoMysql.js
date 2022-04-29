const Sequelize = require('sequelize');
const sequelize = new Sequelize('dbContatos', 'root', 'bcd127', 
    {
        host:'localhost',
        dialect: 'mysql'
    });

sequelize.authenticate().then(function (){
    console.log('Conexão realizada com sucesso.');
}).catch (function (erro) {
    console.log('Conexão Falhou. ' + erro);
});

