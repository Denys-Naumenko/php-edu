document.addEventListener('DOMContentLoaded', function () {
    const questionContainer = document.getElementById('question-container');
    const scoreContainer = document.getElementById('score');
    const questionNumberSpan = document.getElementById('question-number');
    const totalQuestionsSpan = document.getElementById('total-questions');
    let currentQuestion = 0;
    let score = 0;

    function loadQuestion() {
        fetch('quiz.php')
            .then(response => response.json())
            .then(data => {
                questionContainer.innerHTML = `<h2>${data.question}</h2>`;
                data.answers.forEach(answer => {
                    const button = document.createElement('button');
                    button.type = 'button';
                    button.textContent = answer;
                    button.onclick = () => submitAnswer(answer);
                    questionContainer.appendChild(button);
                });
                totalQuestionsSpan.textContent = data.totalQuestions;
                questionNumberSpan.textContent = currentQuestion + 1;
            });
    }

    function submitAnswer(answer) {
        const formData = new FormData();
        formData.append('answer', answer);
        fetch('quiz.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                if (data.correct) {
                    score++;
                }
                scoreContainer.textContent = `Score: ${score}`;
                currentQuestion++;
                if (currentQuestion < data.totalQuestions) {
                    loadQuestion();
                } else {
                    questionContainer.innerHTML = '<h2>You have completed the quiz!</h2>';
                    questionContainer.appendChild(createRestartButton());
                }
            });
    }

    function createRestartButton() {
        const button = document.createElement('button');
        button.textContent = 'Restart Quiz';
        button.onclick = () => {
            currentQuestion = 0;
            score = 0;
            loadQuestion();
        };
        return button;
    }

    loadQuestion();
});
