/***************************************************
Source for Chapter 3 , Example (No run number)
How to solve problem of FETCH statement when you use CURSOR
****************************************************/

DELIMITER $
DROP PROCEDURE IF EXISTS CURSOR_STATEMENT$
CREATE PROCEDURE CURSOR_STATEMENT()
BEGIN
  DECLARE CATEGORY_ID INTEGER;
  DECLARE CATEGORY_NAME VARCHAR(15);
  DECLARE DESCRIPTION LONGTEXT;
  DECLARE EOF INT DEFAULT 0; /* Statement Added */
  DECLARE C_TBL_CATEGORIES CURSOR FOR SELECT * FROM TBL_CATEGORIES;
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET EOF = 1; /* Statement Added */
  OPEN C_TBL_CATEGORIES;
  CURSOR_FOR_TBL_CATEGORIES : LOOP
    FETCH C_TBL_CATEGORIES INTO CATEGORY_ID,CATEGORY_NAME,DESCRIPTION;
    /* Statement Added */
    IF (EOF = 1) THEN
      LEAVE CURSOR_FOR_TBL_CATEGORIES;
    END IF;
    /* Statement Added */
  END LOOP CURSOR_FOR_TBL_CATEGORIES;
  CLOSE C_TBL_CATEGORIES;
  SET EOF = 0; /* Statement Added */
  SELECT 'END PROGRAM' AS 'MESSAGE';
END$


/***************************************************
End of file
****************************************************/