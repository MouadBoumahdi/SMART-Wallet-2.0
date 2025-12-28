CREATE DATABASE IF NOT EXISTS smart_wallet;

use smart_wallet;

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT curtime(),
  `username` varchar(50) NOT NULL
)


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


CREATE TABLE `incomes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `montant` decimal(10,2) NOT NULL,
  `income_date` date NOT NULL,
  `description` varchar(200) DEFAULT 'Pending...',
  `created_at` timestamp NOT NULL DEFAULT curtime()
) 

ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `incomes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `incomes`
  ADD CONSTRAINT `incomes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `montant` decimal(10,2) NOT NULL,
  `expense_date` date NOT NULL,
  `description` varchar(200) DEFAULT 'Pending...',
  `created_at` timestamp NOT NULL DEFAULT curtime()
) 

ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;


ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

  ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;




CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    type ENUM('income','expense') NOT NULL
);
