CREATE TABLE IF NOT EXISTS workouts
(
    id               SERIAL PRIMARY KEY,
    user_name        VARCHAR(50),
    workout_date     DATE,
    duration_minutes INT,
    calories_burned  INT
);