/***************************************************
Source for Chapter 8 , Example (No run number)
Improvement Function MAX_3_NUMBERS
****************************************************/

DELIMITER $
DROP FUNCTION IF EXISTS MAX_3_NUMBERS$
CREATE FUNCTION MAX_3_NUMBERS(NUM1 INT,NUM2 INT,NUM3 INT)
RETURNS INT
BEGIN
  DECLARE MAX_NUMBER INT;
  IF (NUM1 >= NUM2) AND (NUM1 >= NUM3) THEN
    SET MAX_NUMBER = NUM1;
  ELSEIF (NUM2 >= NUM1) AND (NUM2 >= NUM3) THEN
    SET MAX_NUMBER = NUM2;
  ELSEIF (NUM3 >= NUM1) AND (NUM3 >= NUM2) THEN
    SET MAX_NUMBER = NUM3;
  END IF;
  RETURN MAX_NUMBER;
END$


/***************************************************
End of file
****************************************************/