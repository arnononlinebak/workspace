/***************************************************
Source for Chapter 1 , Example 1.6
How to set property IN parameter
****************************************************/

DELIMITER $
DROP PROCEDURE IF EXISTS IN_PARAMETER$
CREATE PROCEDURE IN_PARAMETER (IN PARA_IN INT)
BEGIN
  SELECT PARA_IN;	-- Display value of PARA_IN
  SET PARA_IN = 2; -- Set value to PARA_IN
  SELECT PARA_IN;	-- Display value of PARA_IN again
END$


/***************************************************
End of file
****************************************************/