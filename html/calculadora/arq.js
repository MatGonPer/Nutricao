const calcular = document.getElementById('calcular');

function imc(){
    const nome = document.getElementById('nome').value;
    const sexo = document.getElementById('sexo').value;
    const idade = document.getElementById('idade').value;
    const altura = document.getElementById('altura').value;
    const peso = document.getElementById('peso').value;
    const resultado = document.getElementById('resultado');

    if (sexo !== '' && idade !== '' && altura !== '' && peso !== '' ) {

        const valorIMC = ( peso / (altura * altura)).toFixed(1);

        let classificação = '';

        if (valorIMC < 18.5){
            classificação = 'está abaixo do peso.';
        } 
        
        else if (valorIMC < 25) {
            classificação = 'com peso ideal!';
        }

        else if (valorIMC < 30) {
            classificação = 'levemente acima do peso!';
        }

        else if (valorIMC < 35) {
            classificação = 'com obesidade grau 1! Tome cuidado!';
        }

        else if (valorIMC < 40) {
            classificação = 'com obesidade grau 2! Tome cuidado!';
        }

        else if (valorIMC < 45) {
            classificação = 'com obesidade grau 3! Tome cuidado';
        }

        resultado.textContent = `${nome}, seu IMC é ${valorIMC} e você está ${classificação}`;  

    } 
    else {
        resultado.textContent = 'Digite todos os campos corretamente!'
    }
}

calcular.addEventListener('click', imc);
