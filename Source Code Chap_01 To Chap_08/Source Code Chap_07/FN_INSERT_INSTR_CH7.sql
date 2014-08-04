/***************************************************
Source for Chapter 7 , Example (No run number)
Function INSERT and INSTR
****************************************************/

DELIMITER $
DROP PROCEDURE IF EXISTS FN_INSERT$
CREATE PROCEDURE FN_INSERT()
BEGIN
  DECLARE SOURCE_STRING TEXT DEFAULT 'I LOVE YOU';
  DECLARE SUB_STRING TEXT DEFAULT 'MYSQL';
  DECLARE POSITION_INSERT INT;
  DECLARE LENGTH_STR_INSERT INT;
  SET POSITION_INSERT = INSTR(SOURCE_STRING,'YOU');
  SET LENGTH_STR_INSERT = LENGTH(SUB_STRING);
  SELECT INSERT(SOURCE_STRING,POSITION_INSERT,LENGTH_STR_INSERT,SUB_STRING) AS 'RESULT';
END$


/***************************************************
End of file
****************************************************/