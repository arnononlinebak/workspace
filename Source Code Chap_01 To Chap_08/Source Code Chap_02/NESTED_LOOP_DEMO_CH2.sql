/***************************************************
Source for Chapter 2 , Example (No run number)
How to use nested loop
****************************************************/

DELIMITER $
DROP PROCEDURE IF EXISTS NESTED_LOOP_DEMO$
CREATE PROCEDURE NESTED_LOOP_DEMO()
BEGIN
  DECLARE I INTEGER;
  DECLARE J INTEGER;
  SET I = 2;
  OUTTER_LOOP : LOOP
    SET J = 1;
    INNER_LOOP : WHILE (J <= 12) DO
      SELECT CONCAT(I,' * ',J,' = ',I*J) AS 'RESULT';
      SET J = J + 1;
    END WHILE INNER_LOOP;
    IF (J > 12) THEN LEAVE OUTTER_LOOP; END IF;
  END LOOP OUTTER_LOOP;
  SELECT 'END PROGRAM';
END$


/***************************************************
End of file
****************************************************/