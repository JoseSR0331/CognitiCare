let questionsId = [];
let currentQuestionIndex = 0;

document.addEventListener('DOMContentLoaded', () => {
    navigateQuestion(0);
});

function setQuestions(ids) {
    questionsId = ids;
}

function navigateQuestion(direction) {
    const currentId = questionsId[currentQuestionIndex];
    document.getElementById(`question${currentId}`).classList.add('d-none');
    currentQuestionIndex += direction;
    const nextId = questionsId[currentQuestionIndex];
    document.getElementById(`question${nextId}`).classList.remove('d-none');

    document.getElementById('prevBtn').classList.toggle('d-none', currentQuestionIndex === 0);
    document.getElementById('nextBtn').classList.toggle('d-none', currentQuestionIndex === questionsId.length - 1);
    document.getElementById('submitBtnDiv').classList.toggle('d-none', currentQuestionIndex !== questionsId.length - 1);
}

function submitExam(userId, testId) {
    const respuestas = questionsId.map(id => {
        const seleccionada = document.querySelector(`input[name="pregunta${id}"]:checked`);
        return { pregunta: id, respuesta: seleccionada ? seleccionada.value : 'No respondida' };
    });

    fetch('guardar_respuestas.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id_usuario: userId, id_prueba: testId, respuestas })
    })
    .then(res => res.ok ? res.json() : Promise.reject(res.statusText))
    .then(() => {
        alert('Respuestas enviadas correctamente');
        window.location.href = 'pruebas.php';
    })
    .catch(() => displayMessage('Error al enviar las respuestas. Inténtalo de nuevo.'));
}

function displayMessage(msg) {
    const messageDiv = document.getElementById('message');
    messageDiv.textContent = msg;
    messageDiv.classList.remove('d-none');
}
