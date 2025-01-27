CREATE TABLE `users` (
                         `id` INT AUTO_INCREMENT PRIMARY KEY, -- Auto-incrementing user ID
                         `name` VARCHAR(255) NOT NULL, -- User's name
                         `email` VARCHAR(255) NOT NULL UNIQUE, -- User's email (must be unique)
                         `password` VARCHAR(255) NOT NULL, -- Hashed password
                         `phone_no` VARCHAR(15) DEFAULT NULL, -- Optional phone number
                         `is_approved` TINYINT(1) DEFAULT 0, -- Approval status (0 = not approved, 1 = approved)
                         `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Auto-filled timestamp for creation
)