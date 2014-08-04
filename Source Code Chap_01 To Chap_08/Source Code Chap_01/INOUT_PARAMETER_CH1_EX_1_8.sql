/***************************************************
Source for Chapter 1 , Example 1.8
How to set property INOUT parameter
****************************************************/

DELIMITER $
DROP PROCEDURE IF EXISTS INOUT_PARAMETER$
CREATE PROCEDURE INOUT_PARAMETER (INOUT PARA_INOUT INT)
BEGIN
  SELECT PARA_INOUT;
  SET PARA_INOUT = 2;
  SELECT PARA_INOUT;
END$


/***************************************************
End of file
****************************************************/