/***************************************************
Source for Chapter 2 , Example 2.1
Show variable that declare in any block. Any variable that declare out of this block it can't access to
variable in block
****************************************************/

DELIMITER $
DROP PROCEDURE IF EXISTS BLOCK1$
CREATE PROCEDURE BLOCK1()
BEGIN
  BEGIN   /* BEGIN INNER BLOCK */
    DECLARE INNER_VARIABLE VARCHAR(50);
    SET INNER_VARIABLE = 'THIS IS MY PRIVATE DATA, BECAUSE IT IS IN INNER BLOCK';
  END;   /* END INNER BLOCK */
  SELECT INNER_VARIABLE AS 'INNER VARIABLE VALUE'; /* TRY GET VALUE OF INNER_VARIABLE */
END$


/***************************************************
End of file
****************************************************/