/***************************************************
Source for Chapter 2 , Example 2.12
How to use ITERATE statement
****************************************************/

DELIMITER $
DROP PROCEDURE IF EXISTS ITERATE_DEMO$
CREATE PROCEDURE ITERATE_DEMO()
BEGIN
  DECLARE I INTEGER;
  SET I = 0;
  ITERATE_TEST : LOOP
    SET I = I + 1;
    IF (I >= 10) THEN
      LEAVE ITERATE_TEST;
    ELSEIF MOD(I,2) = 0 THEN
      ITERATE ITERATE_TEST;
    END IF;
    SELECT CONCAT(I, ' IS AN ODD NUMBER') AS 'MESSAGE';
  END LOOP ITERATE_TEST;
END$


/***************************************************
End of file
****************************************************/