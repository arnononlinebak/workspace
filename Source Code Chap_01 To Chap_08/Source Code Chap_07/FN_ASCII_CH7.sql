/***************************************************
Source for Chapter 7 , Example (No run number)
Function ASCII
****************************************************/

DELIMITER $
DROP PROCEDURE IF EXISTS FN_ASCII$
CREATE PROCEDURE FN_ASCII()
BEGIN
  DECLARE INTEGER1 INT;
  DECLARE STRING2 VARCHAR(26) DEFAULT 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  DECLARE SUB_STRING2 CHAR(1);
  DECLARE I INT DEFAULT 1;
  CREATE TEMPORARY TABLE ASCII_RESULT(Str_Value CHAR(1),Ascii_Value INT);
  WHILE(I <= LENGTH(STRING2)) DO
    SET SUB_STRING2 = SUBSTR(STRING2,I,1);
    SET INTEGER1 = ASCII(SUB_STRING2);
    INSERT INTO ASCII_RESULT(Str_Value,Ascii_Value) VALUES(SUB_STRING2,INTEGER1);
    SET I = I + 1;
  END WHILE;
  SELECT * FROM ASCII_RESULT;
END$


/***************************************************
End of file
****************************************************/