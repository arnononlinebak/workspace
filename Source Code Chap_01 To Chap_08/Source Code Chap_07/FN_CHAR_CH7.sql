/***************************************************
Source for Chapter 7 , Example (No run number)
Function CHAR
****************************************************/

DELIMITER $
DROP PROCEDURE IF EXISTS FN_CHAR$
CREATE PROCEDURE FN_CHAR()
BEGIN
  DECLARE INTEGER2 INT DEFAULT 1;
  DECLARE STRING1 CHAR(1);
  CREATE TEMPORARY TABLE CHAR_RESULT(Ascii_Value INT,Str_Value CHAR(1));
  WHILE(INTEGER2 <= 26) DO
    SET STRING1 = CHAR(INTEGER2);
    INSERT INTO CHAR_RESULT(Ascii_Value,Str_Value) VALUES(INTEGER2,STRING1);
    SET INTEGER2 = INTEGER2 + 1;
  END WHILE;
  SELECT * FROM ASCII_RESULT;
END$


/***************************************************
End of file
****************************************************/