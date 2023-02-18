-- Create a new table called "students"
CREATE TABLE students (
  -- Define an auto-incrementing primary key column called "id"
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  -- Define a non-null string column called "name" with a maximum length of 30 characters
  name VARCHAR(30) NOT NULL,
  -- Define a non-null decimal column called "grade1" with a precision of 5 and a scale of 2
  grade1 DECIMAL(5,2) NOT NULL,
  -- Define a non-null decimal column called "grade2" with a precision of 5 and a scale of 2
  grade2 DECIMAL(5,2) NOT NULL,
  -- Define a non-null decimal column called "grade3" with a precision of 5 and a scale of 2
  grade3 DECIMAL(5,2) NOT NULL,
  -- Define an unsigned integer column called "college_id"
  college_id INT(6) UNSIGNED NOT NULL,
  -- Add a unique constraint to the "college_id" column to ensure that each student can only have one college ID
  UNIQUE (college_id)
);

-- Sets a trigger to keep values between 0 and 100.
CREATE TRIGGER grades_trigger
BEFORE INSERT ON students
FOR EACH ROW
BEGIN
  IF NEW.grade1 < 0 OR NEW.grade1 > 100 OR
     NEW.grade2 < 0 OR NEW.grade2 > 100 OR
     NEW.grade3 < 0 OR NEW.grade3 > 100 THEN
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Grades must be between 0 and 100';
  END IF;
END;