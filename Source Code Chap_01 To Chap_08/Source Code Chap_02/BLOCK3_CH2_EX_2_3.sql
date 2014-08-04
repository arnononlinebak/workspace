/***************************************************
Source for Chapter 2 , Example 2.3
We can declare any variable same name but they are in different block
****************************************************/

DELIMITER $
DROP PROCEDURE IF EXISTS BLOCK3$
CREATE PROCEDURE BLOCK3()
BEGIN
  DECLARE MY_VARIABLE VARCHAR(50);
  SET MY_VARIABLE = 'THIS VALUE WAS SET IN THE OUTTER BLOCK';
  BEGIN   /* BEGIN INNER BLOCK */
    DECLARE MY_VARIABLE VARCHAR(50);
    SET MY_VARIABLE = 'THIS VALUE WAS SET IN THE INNER BLOCK';
  END;   /* END INNER BLOCK */
  SELECT MY_VARIABLE AS 'VARIABLE VALUE';
END$


/***************************************************
End of file
****************************************************/