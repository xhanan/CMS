CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_Name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    username VARCHAR(50) UNIQUE NOT NULL,
    PASSWORD VARCHAR(100) NOT NULL
);

CREATE TABLE category(
	id INT PRIMARY KEY AUTO_INCREMENT,
    category_name VARCHAR(50) NOT NULL,
    setDate DATETIME
);

CREATE TABLE articles(
	id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    content VARCHAR(500) NOT NULL,
    category_id INT NOT NULL,
    user_id INT NOT NULL,
    published_date DATETIME,
    tags VARCHAR(10) NOT NULL,
    schedule_post DATETIME,
	FOREIGN KEY(category_id) REFERENCES category(id),
	FOREIGN KEY(user_id) REFERENCES users(id)
);

CREATE TABLE comments(
	id INT PRIMARY KEY AUTO_INCREMENT,
    article_id INT NOT NULL,
    user_id INT NOT NULL,
    descriptions VARCHAR(500) NOT NULL,
    datetimee DATETIME,
    FOREIGN KEY(article_id) REFERENCES articles(id),
    FOREIGN KEY(user_id) REFERENCES users(id)
);

CREATE TABLE media(
	id INT PRIMARY KEY AUTO_INCREMENT,
    url VARCHAR(500) NOT NULL,
    media_type BOOLEAN NOT NULL,
    article_id INT NOT NULL,
    datetimee DATETIME,
    FOREIGN KEY (article_id) REFERENCES articles(id)
);

CREATE TABLE bookmarks(
	id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    article_id INT NOT NULL,
    datetimee DATETIME,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (article_id) REFERENCES articles(id)
);

