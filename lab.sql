USE patient_tracking;

-- Patient table
CREATE TABLE IF NOT EXISTS Patient (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    birthday DATE NOT NULL,
    email VARCHAR(255) NOT NULL
);

-- Physician table
CREATE TABLE IF NOT EXISTS Physician (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    specialty VARCHAR(255) NOT NULL
);

-- Clinic table
CREATE TABLE IF NOT EXISTS Clinic (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

-- Visit table
CREATE TABLE IF NOT EXISTS Visit (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT NOT NULL,
    physician_id INT NOT NULL,
    clinic_id INT NOT NULL,
    visit_date DATE NOT NULL,
    visit_summary VARCHAR(255),
    FOREIGN KEY (patient_id) REFERENCES Patient(id),
    FOREIGN KEY (physician_id) REFERENCES Physician(id),
    FOREIGN KEY (clinic_id) REFERENCES Clinic(id)
);

--  Patient table
INSERT INTO Patient (name, birthday, email) VALUES
('Anne Davies', '1954-01-08', 'adav@bla.com'),
('Bobby Beebop', '1988-10-02', 'bbop@bla.com'),
('Jen Jenson', '2001-03-12', 'jjen@bla.com');

-- Physician table
INSERT INTO Physician (name, specialty) VALUES
('Yusef Sahleed', 'PCP'),
('Bill Roberts', 'Cardiology'),
('Aaarn Aaaaa', 'Toe Health');

-- Clinic table
INSERT INTO Clinic (name) VALUES
('Hearth Central'),
('Downtown'),
('Westside'),
('Northside');

-- Visit table
INSERT INTO Visit (patient_id, physician_id, clinic_id, visit_date, visit_summary) VALUES
(1, 1, 1, '2022-07-04', 'Cough'),
(1, 1, 1, '2022-08-04', 'Fever'),
(1, 1, 2, '2023-04-12', 'Plague'),
(2, 2, 3, '2024-01-02', 'Rattles'),
(2, 2, 3, '2024-01-14', 'Feline allergies'),
(3, 1, 2, '2023-12-01', 'Stubbed toe'),
(3, 3, 4, '2024-02-11', 'Hypochondria');
