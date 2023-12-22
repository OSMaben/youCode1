CREATE TABLE role(
    id_role INT PRIMARY KEY AUTO_INCREMENT,
    role_type varchar(225)
);

CREATE TABLE users(
    id_user INT PRIMARY KEY AUTO_INCREMENT,
    firstName varchar(50),
    lastName varchar(50),
    email varchar(100),
    password varchar(100),
    id_role INT,
    FOREIGN KEY (id_role) references role (id_role) 
);

CREATE TABLE classes(
    id_classes INT PRIMARY KEY AUTO_INCREMENT,
    id_apprenant INT,
    id_formateur INT,
    FOREIGN KEY (id_apprenant) references users (id_user),
    FOREIGN KEY (id_formateur) references users (id_user)
);


CREATE TABLE authority(
    id_authority INT PRIMARY KEY AUTO_INCREMENT,
    authority_type varchar(225)
);

CREATE TABLE userAuth(
    id_userAuth INT PRIMARY KEY AUTO_INCREMENT,
    id_auth INT,
    id_user INT,
    FOREIGN KEY (id_auth) references authority (id_authority),
    FOREIGN KEY (id_user) references users (id_user)

);
-- Assuming your table is named 'roles'
INSERT INTO roles (id_role, role_type) VALUES (1, 'student');
INSERT INTO roles (id_role, role_type) VALUES (2, 'teacher');
INSERT INTO roles (id_role, role_type) VALUES (3, 'admin');
