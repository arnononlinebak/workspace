/***************************************************
Source for Chapter 2 , Example 2.2
Show variable that declare in any block can access to variable that declare out of block
****************************************************/

DELIMITER $
DROP PROCEDURE IF EXISTS BLOCK2$
CREATE PROCEDURE BLOCK2()
BEGIN
  DECLARE OUTTER_VARIABLE VARCHAR(50);
  SET OUTTER_VARIABLE = 'THIS VALUE WAS SET IN THE OUTTER BLOCK';
  BEGIN   /* BEGIN INNER BLOCK */
    SET OUTTER_VARIABLE = 'THIS VALUE WAS SET IN THE INNER BLOCK';
  END;   /* END INNER BLOCK */
  SELECT OUTTER_VARIABLE AS 'OUTTER VARIABLE VALUE';
END$


/***************************************************
End of file
****************************************************/