/***************************************************
Source for Chapter 2 , Example 2.13
How to use REPEAT … UNTIL … END REPEAT statement
****************************************************/

DELIMITER $
DROP PROCEDURE IF EXISTS REPEAT_DEMO$
CREATE PROCEDURE REPEAT_DEMO()
BEGIN
  DECLARE I INTEGER;
  SET I = 0;
  REPEAT_TEST : REPEAT
    SET I = I + 1;
    IF MOD(I,2) <> 0 THEN
      SELECT CONCAT(I, ' IS AN ODD NUMBER') AS 'MESSAGE';
    END IF;
  UNTIL (I >= 10)
  END REPEAT REPEAT_TEST;
  SELECT 'END PROGRAM';
END$


/***************************************************
End of file
****************************************************/