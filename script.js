const form = document.getElementById('quizz-form');
const resultado = document.getElementById('resultado');

form.addEventListener('submit', (e) => {
  e.preventDefault();
  const respuestas = [];
  const preguntas = document.querySelectorAll('.pregunta');

  preguntas.forEach((pregunta) => {
    const opciones = pregunta.querySelectorAll('input[type="radio"]');
    opciones.forEach((opcion) => {
      if (opcion.checked) {
        respuestas.push(opcion.value);
      }
    });
  });

  const puntuacion = calcularPuntuacion(respuestas);
  resultado.innerText = `Tu puntuación es: ${puntuacion} / ${preguntas.length}`;

  // Verificar si el usuario ha acertado las dos respuestas
  if (puntuacion === 1) {
    alert('Felicitaciones! Tu código de descuento es MESSI10. Escríbeme, agenda tu turno y aprovecha al máximo tu código OFF.');
  }
});

function calcularPuntuacion(respuestas) {
  let puntuacion = 0;
  const respuestasCorrectas = ['ocho'];

  respuestas.forEach((respuesta, index) => {
    if (respuesta === respuestasCorrectas[index]) {
      puntuacion++;
    }
  });

  return puntuacion;
}

