/***************************************************
Source for Chapter 4 , Example 4.1
Show working of EXIT HANDLER
****************************************************/

DELIMITER $
DROP PROCEDURE IF EXISTS HANDLER_EXIT$
CREATE PROCEDURE HANDLER_EXIT(IN CATEGORY_ID INTEGER,IN CATEGORY_NAME VARCHAR(15),IN DESCRIPTION LONGTEXT)
MAIN_BLOCK : BEGIN
  DECLARE HAVE_ERROR INT DEFAULT 0;
  SUB_BLOCK : BEGIN
    DECLARE EXIT HANDLER FOR 1062 SET HAVE_ERROR = 1;
    INSERT INTO TBL_CATEGORIES(CategoryID,CategoryName,Description) VALUES (CATEGORY_ID,CATEGORY_NAME,DESCRIPTION);
    SELECT CONCAT('Category ID ',CATEGORY_ID,' Created') AS 'Result';
  END SUB_BLOCK;
  IF HAVE_ERROR = 1 THEN
    SELECT CONCAT('Category ID ',CATEGORY_ID,' Failed to Insert :: Duplicate Key') AS 'Result';
  END IF;
END MAIN_BLOCK$


/***************************************************
End of file
****************************************************/