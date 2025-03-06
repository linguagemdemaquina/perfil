function calculaDiferencaDeHoras(){

    var func = document.getElementById("funcionario").value;
    var d1 = document.getElementById("data_hora_entrada").value;
    var d2 = document.getElementById("data_hora_saida").value;


var data_1 = new Date(d1); // PADRÃO DE ENTRADA DE DADO :  aaaa-mm-dd hh:mm
var data_inicial = data_1.toLocaleString();
console.log(data_inicial);

var data_2 = new Date(d2); // PADRÃO DE ENTRADA DE DADO :  aaaa-mm-dd hh:mm
var data_final = data_2.toLocaleString(); 
console.log(data_final);

var divisao_por_minuto = 1000 * 60; // PADRONIZA A SAÍDA EM MINUTOS
var divisao_por_hora = 1000 * 60 * 60; // PADRONIZA A SAÍDA EM HORAS 
var divisao_por_dia = 1000 * 60 * 60 * 24; // PADRONIZA A SAÍDA EM DIAS

var diferenca_em_minutos = Math.round((data_2 - data_1) / divisao_por_minuto);
var diferenca_em_horas = Math.round((data_2 - data_1) / divisao_por_hora);
var diferenca_em_dias = Math.round((data_2 - data_1) / divisao_por_dia);

console.log("Matrícula : " + func);
console.log("Diferença em minutos : " + diferenca_em_minutos);
console.log("Diferença em horas : " + diferenca_em_horas);
console.log("Diferença em dias : " + diferenca_em_dias);

let lancamento = '{ "matricula" : "' + func + '" , "horas_a_justificar" : "' + diferenca_em_minutos +'" }';
const obj = JSON.parse(lancamento);

console.log(obj);

}