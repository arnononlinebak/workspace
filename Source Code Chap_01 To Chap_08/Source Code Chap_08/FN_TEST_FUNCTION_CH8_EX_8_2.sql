/***************************************************
Source for Chapter 8 , Example 8.2
Show that in the body of Function can not return a result set
This script can not completed Execute, It use for learn about of error
****************************************************/

DELIMITER $
DROP FUNCTION IF EXISTS TEST_FUNCTION$
CREATE FUNCTION TEST_FUNCTION()
RETURNS INT
BEGIN
  SELECT * FROM TBL_LOG;
  RETURN 0;
END$


/***************************************************
End of file
****************************************************/