CREATE TABLE IF NOT EXISTS results
(
    id SERIAL PRIMARY KEY,
    user_id INT,
    score INT,
    quiz_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
