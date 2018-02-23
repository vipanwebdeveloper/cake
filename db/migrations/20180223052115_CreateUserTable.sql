-- Skip: no
-- Name: CreateUserTable
-- Date: 23.02.2018 05:21:15
-- Description: Created by Dev, 2018-02-23 05:21:15

-- UP --
CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255),
    role VARCHAR(20),
    active tinyint default '1',
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);


-- DOWN --



