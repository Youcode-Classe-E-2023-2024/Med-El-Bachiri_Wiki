-- ************************************** `users`
CREATE DATABASE IF NOT EXISTS wiki;
USE wiki;

-- ************************************** `users`
CREATE TABLE users
(
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password TEXT NOT NULL,
    image TEXT NOT NULL,
    role ENUM ('admin', 'author') DEFAULT 'author' NOT NULL,
    CONSTRAINT users_email_uindex UNIQUE (email),
    CONSTRAINT users_user_id_uindex UNIQUE (user_id)
);

-- ************************************** `categories`
CREATE TABLE categories
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    create_at TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
    edit_at TIMESTAMP(0) NULL
);

-- ************************************** `tags`
CREATE TABLE tags
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

-- ************************************** `wikis`
CREATE TABLE wikis
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    create_at TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
    edit_at TIMESTAMP(0) NULL,
    status ENUM('published', 'archived') NOT NULL,
    id_user INT NOT NULL,
    id_category INT NOT NULL,
    CONSTRAINT FK_1 FOREIGN KEY (id_user) REFERENCES users (user_id) ON DELETE CASCADE,
    CONSTRAINT FK_2 FOREIGN KEY (id_category) REFERENCES categories (id) ON DELETE CASCADE
);

-- ************************************** `wikis_tags`
CREATE TABLE wikis_tags
(
    id_wiki INT NOT NULL,
    id_tag INT NOT NULL,
    CONSTRAINT FK_3 FOREIGN KEY (id_wiki) REFERENCES wikis (id) ON DELETE CASCADE,
    CONSTRAINT FK_4 FOREIGN KEY (id_tag) REFERENCES tags (id) ON DELETE CASCADE,
    PRIMARY KEY (id_wiki, id_tag)
);