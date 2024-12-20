// Variables globales que deben ser definidas antes de incluir este archivo:
// - questionsId: Lista de IDs de preguntas
// - totalQuestions: Número total de preguntas
// - id_prueba: ID de la prueba actual
// - id_usuario: ID del usuario actual

let currentQuestionIndex = 0;

function navigateQuestion(direction) {
    if (direction === 1) {
        const currentId = questionsId[currentQuestionIndex];
        const selectedOption = document.querySelector(`input[name="pregunta${currentId}"]:checked`);
        if (!selectedOption) {
            alert('Por favor, selecciona una respuesta antes de continuar.');
            return;
        }
    }

    document.getElementById(`question${questionsId[currentQuestionIndex]}`).style.display = 'none';
    currentQuestionIndex += direction;
    document.getElementById(`question${questionsId[currentQuestionIndex]}`).style.display = 'block';

    document.getElementById('prevBtn').style.display = currentQuestionIndex === 0 ? 'none' : 'inline-block';
    document.getElementById('nextBtn').style.display = currentQuestionIndex === questionsId.length - 1 ? 'none' : 'inline-block';
    document.getElementById('submitBtnDiv').style.display = currentQuestionIndex === questionsId.length - 1 ? 'block' : 'none';
}

function submitExam() {
    const respuestas = [];
    questionsId.forEach((id) => {
        const respuesta = document.querySelector(`input[name="pregunta${id}"]:checked`);
        respuestas.push({
            pregunta: id,
            respuesta: respuesta ? respuesta.value : 'No respondida'
        });
    });

    const datos = {
        id_usuario: id_usuario,
        id_prueba: id_prueba,
        respuestas: respuestas
    };

    fetch('procesa_pruebas.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(datos)
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                window.location.href = 'pruebas.php';
            } else {
                alert(data.message);
                console.error('Error:', data.error);
            }
        })
        .catch(error => {
            alert('Hubo un problema al enviar las respuestas.');
            console.error('Error:', error);
        });
}
