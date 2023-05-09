CREATE TABLE doctors (
  id INT PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(255) NOT NULL,
  last_name VARCHAR(255) NOT NULL,
  phone VARCHAR(20) NOT NULL,
  birth_date DATE NOT NULL,
  nationality VARCHAR(255) NOT NULL,
  hospital VARCHAR(255) NOT NULL,
  gender ENUM('male', 'female') NOT NULL
);

CREATE TABLE certificates (
  id INT PRIMARY KEY AUTO_INCREMENT,
  filename VARCHAR(255) NOT NULL,
  doctor_id INT NOT NULL,
  FOREIGN KEY (doctor_id) REFERENCES doctors(id)
);