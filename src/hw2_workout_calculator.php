<?php

include 'db.php';

function getUserName()
{
    echo "Please enter your name: ";
    $userName = trim(fgets(STDIN));
    return $userName;
}

function addWorkout($pdo, $userName)
{
    echo "Enter the date of the workout (yyyy-mm-dd): ";
    $workoutDate = trim(fgets(STDIN));

    echo "Enter the duration of the workout in minutes: ";
    $durationMinutes = trim(fgets(STDIN));

    echo "Enter the number of calories burned: ";
    $caloriesBurned = trim(fgets(STDIN));

    $sql = "INSERT INTO workouts (user_name, workout_date, duration_minutes, calories_burned) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userName, $workoutDate, $durationMinutes, $caloriesBurned]);

    echo "Workout added!\n";
}

function showResults($pdo, $userName)
{
    $sql = "SELECT SUM(duration_minutes) AS total_duration, AVG(duration_minutes) AS average_duration, SUM(calories_burned) AS total_calories, AVG(calories_burned) AS average_calories FROM workouts WHERE user_name = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userName]);
    $results = $stmt->fetch();

    echo "Here are your workouts:\n";
    $sql = "SELECT workout_date, duration_minutes, calories_burned FROM workouts WHERE user_name = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userName]);
    while ($row = $stmt->fetch()) {
        echo $row['workout_date'] . ": duration - " . $row['duration_minutes'] . " min, calories burned - " . $row['calories_burned'] . "\n";
    }

    echo "Total workout duration: " . $results['total_duration'] . " min\n";
    echo "Average workout duration: " . $results['average_duration'] . " min\n";
    echo "Total calories burned: " . $results['total_calories'] . "\n";
    echo "Average calories burned per workout: " . $results['average_calories'] . "\n";
}

function main()
{
    include 'db.php';
    echo "Welcome to the Workout Journal and Calorie Calculator!\n";
    $userName = getUserName();
    echo "Hello, $userName!\n";

    $continue = 'yes';
    while (strtolower($continue) === 'yes') {
        addWorkout($pdo, $userName);
        echo "Do you want to add another workout? (yes/no): ";
        $continue = trim(fgets(STDIN));
    }

    showResults($pdo, $userName);

    echo "Thank you for using the program! Good luck with your workouts!\n";
}

main();
