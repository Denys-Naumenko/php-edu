<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Форма додавання чисел</title>
    <style>
        .error {
            color: red;
            display: block; /* Додаємо новий рядок для кожної помилки */
        }
    </style>
    <script>
        function getGreeting() {
            fetch('/greet')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('greeting').innerText = data.message;
                })
                .catch(error => console.error('Error:', error));
        }

        function submitForm(event) {
            event.preventDefault();
            const formData = new FormData(event.target);

            fetch('/add', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.errors) {
                        displayErrors(data.errors);
                    } else if (data.result) {
                        document.getElementById('result').innerText = 'Результат: ' + data.result;
                        clearErrors();
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function displayErrors(errors) {
            clearErrors();

            Object.entries(errors).forEach(([field, messages]) => {
                const input = document.querySelector(`[name="${field}"]`);
                messages.forEach(message => {
                    const errorElement = document.createElement('span');
                    errorElement.classList.add('error');
                    errorElement.innerText = message;
                    input.insertAdjacentElement('afterend', errorElement);
                });
            });
        }

        function clearErrors() {
            document.querySelectorAll('.error').forEach(errorElement => errorElement.remove());
        }
    </script>
</head>
<body>

<button type="button" onclick="getGreeting()">Отримати привітання</button>
<p id="greeting"></p>

<h1>Додавання чисел</h1>
<form onsubmit="submitForm(event)">
    <label for="number1">Число 1:</label>
    <input type="text" id="number1" name="number1">
    <br><br>
    <label for="number2">Число 2:</label>
    <input type="text" id="number2" name="number2">
    <br><br>
    <button type="submit">Додати</button>
</form>
<p id="result"></p>

</body>
</html>
