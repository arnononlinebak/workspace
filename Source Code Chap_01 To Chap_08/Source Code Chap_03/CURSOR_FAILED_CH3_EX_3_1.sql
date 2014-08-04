/***************************************************
Source for Chapter 3 , Example 3.1
Show error if the order of statement in the block is wrong (This script can not Execute complete)
****************************************************/

DELIMITER $
DROP PROCEDURE IF EXISTS CURSOR_FAILED$
CREATE PROCEDURE CURSOR_FAILED()
BEGIN
  DECLARE MY_CURSOR CURSOR FOR SELECT * FROM TBL_CATEGORIES;
  DECLARE MY_VAR INTEGER;
END$


/***************************************************
End of file
****************************************************/