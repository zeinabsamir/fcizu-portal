CREATE TABLE users (
                        id INT(11) NOT NULL AUTO_INCREMENT,
                        email VARCHAR(100) NOT NULL,
                        password VARCHAR(24) NOT NULL,
                        first_name VARCHAR(100) NOT NULL,
                        last_name VARCHAR(100) NOT NULL,
                        department VARCHAR(150) NOT NULL,
                        date_of_birth DATE,
                        user_role VARCHAR(30) NOT NULL DEFAULT 'student',
                        is_admin TINYINT(1) DEFAULT 0,
                        created_at DATETIME NOT NULL,
                        PRIMARY KEY (id),
                        UNIQUE KEY email (email)
                        );

CREATE TABLE courses
(
                        id INT(11) NOT NULL AUTO_INCREMENT,
                        title VARCHAR(255),
                        code VARCHAR(100),
                        department VARCHAR(100) NOT NULL,
                        created_at DATETIME NOT NULL,
                        PRIMARY KEY (id),
                        UNIQUE KEY code (code)
                        );

CREATE TABLE teaches (
                        id INT(11) NOT NULL AUTO_INCREMENT,
                        course_id INT(11) NOT NULL,
                        teacher_id INT(11) NOT NULL,
                        year VARCHAR(100),
                        semester VARCHAR(100),
                        created_at DATETIME NOT NULL,
                        PRIMARY KEY (id)
                        );

CREATE TABLE studies (
                        id INT(11) NOT NULL AUTO_INCREMENT,
                        course_id INT(11) NOT NULL,
                        student_id INT(11) NOT NULL,
                        year VARCHAR(100),
                        semester VARCHAR(100),
                        created_at DATETIME NOT NULL,
                        PRIMARY KEY (id)
                        );

CREATE TABLE attendance (
                        id INT(11) NOT NULL AUTO_INCREMENT,
                        course_id INT(11) NOT NULL,
                        student_id INT(11) NOT NULL,
                        teacher_id INT(11) NOT NULL,
                        has_attended TINYINT(1) DEFAULT 0,
                        day DATE NOT NULL,
                        created_at DATETIME NOT NULL,
                        PRIMARY KEY (id),
                        UNIQUE KEY course_student_day (course_id, student_id, day)
                        );

CREATE TABLE announcements (
                        id INT(11) NOT NULL AUTO_INCREMENT,
                        content TEXT NOT NULL,
                        course_id INT(11) NOT NULL,
                        teacher_id INT(11) NOT NULL,
                        created_at DATETIME NOT NULL,
                        PRIMARY KEY (id)
                        );

CREATE TABLE grades (
                        id INT(11) NOT NULL AUTO_INCREMENT,
                        course_id INT(11) NOT NULL,
                        student_id INT(11) NOT NULL,
                        teacher_id INT(11) NOT NULL,
                        title VARCHAR(255) NOT NULL,
                        grade DECIMAL(7,2) NOT NULL DEFAULT 99999.99,
                        created_at DATETIME NOT NULL,
                        PRIMARY KEY (id),
                        UNIQUE KEY course_student_title (course_id, student_id, title)
                        );

CREATE TABLE student_gpas (
                        id INT(11) NOT NULL AUTO_INCREMENT,
                        student_id INT(11) NOT NULL,
                        GPA DECIMAL(7,2) NOT NULL DEFAULT 99999.99,
                        created_at DATETIME NOT NULL,
                        PRIMARY KEY (id)
                        );

CREATE TABLE course_materials (
                        id INT(11) NOT NULL AUTO_INCREMENT,
                        course_id INT(11) NOT NULL,
                        teacher_id INT(11) NOT NULL,
                        description TEXT,
                        file_url VARCHAR(255),
                        created_at DATETIME NOT NULL,
                        PRIMARY KEY (id)
                        );

CREATE TABLE course_assignments (
                        id INT(11) NOT NULL AUTO_INCREMENT,
                        course_id INT(11) NOT NULL,
                        student_id INT(11) NOT NULL,
                        description TEXT,
                        file_url VARCHAR(255),
                        created_at DATETIME NOT NULL,
                        PRIMARY KEY (id)
                        );
