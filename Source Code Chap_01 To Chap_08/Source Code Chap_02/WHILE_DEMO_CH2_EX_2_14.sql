/***************************************************
Source for Chapter 2 , Example 2.14
How to use WHILE … END WHILE statement
****************************************************/

DELIMITER $
DROP PROCEDURE IF EXISTS WHILE_DEMO$
CREATE PROCEDURE WHILE_DEMO()
BEGIN
  DECLARE I INTEGER;
  SET I = 0;
  WHILE_TEST : WHILE (I <= 10) DO
  IF MOD(I,2) <> 0 THEN
    SELECT CONCAT(I, ' IS AN ODD NUMBER') AS 'MESSAGE';
  END IF;
  SET I = I + 1;
  END WHILE WHILE_TEST;
  SELECT 'END PROGRAM';
END$


/***************************************************
End of file
****************************************************/