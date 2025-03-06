
var data_1 = new Date("2022-12-11 23:00:00"); // PADRÃO DE ENTRADA DE DADO :  aaaa-mm-dd hh:mm
var data_inicial = data_1.toLocaleString();
console.log(data_inicial);

var data_2 = new Date("2022-12-12 07:00:00"); // PADRÃO DE ENTRADA DE DADO :  aaaa-mm-dd hh:mm
var data_final = data_2.toLocaleString(); 
console.log(data_final);

var divisao_por_minuto = 1000 * 60; // PADRONIZA A SAÍDA EM MINUTOS
var divisao_por_hora = 1000 * 60 * 60; // PADRONIZA A SAÍDA EM HORAS 
var divisao_por_dia = 1000 * 60 * 60 * 24; // PADRONIZA A SAÍDA EM DIAS

var diferenca_em_minutos = Math.round((data_2 - data_1) / divisao_por_minuto);
var diferenca_em_horas = Math.round((data_2 - data_1) / divisao_por_hora);
var diferenca_em_dias = Math.round((data_2 - data_1) / divisao_por_dia);

console.log("Diferença em minutos : " + diferenca_em_minutos);
console.log("Diferença em horas : " + diferenca_em_horas);
console.log("Diferença em dias : " + diferenca_em_dias);