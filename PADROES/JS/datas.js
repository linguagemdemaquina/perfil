// 1 - OBTENDO DATA COMPLETA ATUAL

const dataAtual = new Date();
    
    // EXTRAÇÃO DATA COMPLETA 
    console.log("Data Completa : " + dataAtual);
    // EXTRAÇÃO DA DATA SIMPLIFICADA - LOCAL
    console.log("Data Simplificada : "+ dataAtual.toLocaleString());

// 1.1 - OBTENDO NOME DO DIA DA SEMANA ATUAL 

const numeroDoDiaAtual = dataAtual.getDay();
    // ARRAY COM NOMES DOS DIAS DA SEMANA
    var arrayDiaDaSemana = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'];
    // VINCULA NOME DO DIA NO ARRAY
    var nomeDoDia = arrayDiaDaSemana[numeroDoDiaAtual];

    // EXTRAÇÃO DO NOME DO DIA ATRAVÉS DO ARRAY 
    console.log("Dia da Semana : " + nomeDoDia);


// 1.2 - OBTENDO NOME DO MÊS ATUAL

const numeroDoMesAtual = dataAtual.getMonth();
    // ARRAY COM NOMES DOS MESES
    var arrayMesesDoAno = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho','Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
    // VINCULA NOME DO DIA NO ARRAY
    var nomeDoMes = arrayMesesDoAno[numeroDoMesAtual];
   
    // EXTRAÇÃO DO MÊS NUMÉRICO
    console.log("Mês numérico : " + (numeroDoMesAtual + 1));

    // EXTRAÇÃO DO NOME DO MÊS ATRAVÉS DO ARRAY 
    console.log("Mês : " + nomeDoMes);


// 1.3 - EXTRAINDO O ANO ATUAL COM 4 DÍGITOS

const valorDoAnoAtual = dataAtual.getFullYear();

    // EXTRAÇÃO DO VALOR DO ANO ATUAL COM 4 DÍGITOS 
    console.log("Ano com 4 dígitos : " + valorDoAnoAtual);