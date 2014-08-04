/***************************************************
Source for Chapter 8 , Example 8.1
How to create FUNCTION that use RETURN statement more than one time.
****************************************************/

DELIMITER $
DROP FUNCTION IF EXISTS MAX_3_NUMBERS$
CREATE FUNCTION MAX_3_NUMBERS(NUM1 INT,NUM2 INT,NUM3 INT)
RETURNS INT
BEGIN
  IF (NUM1 >= NUM2) AND (NUM1 >= NUM3) THEN
    RETURN NUM1;
  ELSEIF (NUM2 >= NUM1) AND (NUM2 >= NUM3) THEN
    RETURN NUM2;
  ELSEIF (NUM3 >= NUM1) AND (NUM3 >= NUM2) THEN
    RETURN NUM3;
  END IF;
END$


/***************************************************
End of file
****************************************************/