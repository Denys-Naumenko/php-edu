<?php

session_start();
header('Content-Type: application/json');

$questions = [
    [
        "question" => "Яке значення 'null' в JavaScript?",
        "answers" => ["object", "null", "undefined"],
        "correct" => "object"
    ]
];

$totalQuestions = count($questions);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $answer = $_POST['answer'];
    $correct = $_SESSION['current_question']['correct'];

    if ($answer === $correct) {
        $correct = true;
        $message = "Correct!";
    } else {
        $correct = false;
        $message = "Wrong! The correct answer was: $correct.";
    }

    echo json_encode(['message' => $message, 'correct' => $correct, 'totalQuestions' => $totalQuestions]);
} else {
    $randomIndex = array_rand($questions);
    $_SESSION['current_question'] = $questions[$randomIndex];
    $questions[$randomIndex]['totalQuestions'] = $totalQuestions;
    echo json_encode($questions[$randomIndex]);
}
