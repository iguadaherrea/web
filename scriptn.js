function calculateIMC(){
    var peso = document.getElementById('peso').value;
    var altura = document.getElementById('altura').value;

    if (peso !== '' &&  altura !== ''){
        var imc= peso / ((altura/100)** 2);
        var result = document.getElementById ('result');
        result.innerHTML = 'TU IMC ES ' + imc.toFixed(2);

        //Clasificación de IMC 

        if (imc < 18.5){
            result.innerHTML += '- BAJO PESO';
            
        } else if (imc < 25){
            result.innerHTML += '-PESO NORMAL';
        } else if (imc < 30){
            result.innerHTML += '-SOBREPESO';
        } else {
            result.innerHTML += '-OBESIDAD';
        }
    }
}