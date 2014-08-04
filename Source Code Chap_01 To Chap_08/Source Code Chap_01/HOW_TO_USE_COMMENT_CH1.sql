/***************************************************
Source for Chapter 1 , Example (No run number)
How to use Multi line Comment
****************************************************/

DELIMITER $
DROP PROCEDURE IF EXISTS HOW_TO_USE_COMMENT$
CREATE PROCEDURE HOW_TO_USE_COMMENT (IN PARA_IN INT)
BEGIN
  /* -------------------------------------------- *
   * PROGRAM     :   HOW_TO_USE_COMMENT           *
   * PURPOSE     :   How to use Multi Line Comment*
   * AUTHOR      :   Yong                         *
   * -------------------------------------------- */
  SELECT PARA_IN + 1 INTO @AMOUNT;
  SELECT 'AMOUNT = ' INTO @AMOUNT_TEXT;
  SELECT CONCAT(@AMOUNT_TEXT, @AMOUNT) AS 'Result';
END$



/***************************************************
End of file
****************************************************/