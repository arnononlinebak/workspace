/***************************************************
Source for Chapter 7 , Example (No run number)
Function CONCAT_WS
****************************************************/

DELIMITER $
DROP PROCEDURE IF EXISTS FN_CONCAT$
CREATE PROCEDURE FN_CONCAT()
BEGIN
  DECLARE String_Value1 TEXT;
  DECLARE String_Value2 TEXT;
  SET String_Value1 = CONCAT('A',' ','B',' ','C',' ','D',' ','E',' ','F',' ','G');
  SET String_Value2 = CONCAT_WS(' ','A','B','C','D','E','F','G');
  SELECT String_Value1 AS 'RESULT CONCAT';
  SELECT String_Value2 AS 'RESULT CONCAT_WS';
END$


/***************************************************
End of file
****************************************************/