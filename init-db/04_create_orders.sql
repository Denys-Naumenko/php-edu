CREATE TABLE orders
(
    id           SERIAL PRIMARY KEY,
    user_id      INT REFERENCES users (id),
    product_name VARCHAR(100)   NOT NULL,
    amount       DECIMAL(10, 2) NOT NULL
);

INSERT INTO orders (user_id, product_name, amount)
VALUES (1, 'Laptop', 999.99),
       (2, 'Smartphone', 499.99);