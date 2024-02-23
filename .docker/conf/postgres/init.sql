-- Create the authors table.
CREATE SEQUENCE author_seq;
CREATE TABLE author (
    id INT NOT NULL DEFAULT nextval('author_seq'),
    name VARCHAR(100) UNIQUE NOT NULL,
    PRIMARY KEY (id)
);

-- Create the categories table.
CREATE SEQUENCE category_seq;
CREATE TABLE category (
    id INT NOT NULL DEFAULT nextval('category_seq'),
    name VARCHAR(50) UNIQUE NOT NULL,
    PRIMARY KEY(id)
);

-- Create the books table.
CREATE SEQUENCE book_seq;
CREATE TABLE book (
    id INT NOT NULL DEFAULT nextval('book_seq'),
    title VARCHAR(200) NOT NULL,
    description varchar(500) NOT NULL,
    cover varchar(255),
    publication_year INTEGER NOT NULL,
    publisher varchar(50),
    isbn VARCHAR(20) UNIQUE NOT NULL,
    PRIMARY KEY (id)
);

-- Create the relationship table between books and authors.
CREATE SEQUENCE book_author_seq; 
CREATE TABLE book_author (
    id INT NOT NULL DEFAULT nextval('book_author_seq'),
    id_book INT NOT NULL,
    id_author INT NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT fk_id_book_author_book FOREIGN KEY(id_book) REFERENCES book(id) ON DELETE CASCADE,
    CONSTRAINT fk_id_author FOREIGN KEY(id_author) REFERENCES author(id) ON DELETE CASCADE
);

-- Crear la tabla de relaciones entre libros y categoría.
CREATE SEQUENCE book_category_seq; 
CREATE TABLE book_category (
    id INT NOT NULL DEFAULT nextval('book_category_seq'),
    id_book INT NOT NULL,
    id_category INT NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT fk_id_book_category_book FOREIGN KEY(id_book) REFERENCES book(id) ON DELETE CASCADE,
    CONSTRAINT fk_id_category FOREIGN KEY(id_category) REFERENCES category(id) ON DELETE CASCADE
);