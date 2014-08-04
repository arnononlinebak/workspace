/***************************************************
Source for Chapter 3 , Example 3.3
How to control CURSOR and problem when use FETCH statement
****************************************************/

DELIMITER $
DROP PROCEDURE IF EXISTS CURSOR_STATEMENT$
CREATE PROCEDURE CURSOR_STATEMENT()
BEGIN
  DECLARE CATEGORY_ID INTEGER;
  DECLARE CATEGORY_NAME VARCHAR(15);
  DECLARE DESCRIPTION LONGTEXT;
  DECLARE C_TBL_CATEGORIES CURSOR FOR SELECT * FROM TBL_CATEGORIES;
  OPEN C_TBL_CATEGORIES;
  CURSOR_FOR_TBL_CATEGORIES : LOOP
    FETCH C_TBL_CATEGORIES INTO CATEGORY_ID,CATEGORY_NAME,DESCRIPTION;
  END LOOP CURSOR_FOR_TBL_CATEGORIES;
  CLOSE C_TBL_CATEGORIES;
  SELECT 'END PROGRAM' AS 'MESSAGE';
END$


/***************************************************
End of file
****************************************************/