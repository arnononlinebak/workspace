/***************************************************
Source for Chapter 1 , Example 1.7
How to set property OUT parameter
****************************************************/

DELIMITER $
DROP PROCEDURE IF EXISTS OUT_PARAMETER$
CREATE PROCEDURE OUT_PARAMETER (OUT PARA_OUT INT)
BEGIN
  SELECT PARA_OUT;
  SET PARA_OUT = 2;
  SELECT PARA_OUT;
END$


/***************************************************
End of file
****************************************************/