CREATE TABLE events (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        name VARCHAR(100) NOT NULL,
                        description TEXT NOT NULL,
                        event_datetime DATETIME NOT NULL,  -- Combined date and time column
                        max_capacity INT NOT NULL,
                        created_by INT NOT NULL,
                        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        venue VARCHAR(255) NOT NULL,  -- New column for the venue
                        FOREIGN KEY (created_by) REFERENCES users(id)
);
