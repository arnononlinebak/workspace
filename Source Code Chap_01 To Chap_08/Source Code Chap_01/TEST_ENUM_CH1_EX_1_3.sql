/***************************************************
Source for Chapter 1 , Example 1.3
How to set value for Enum variable and applied it.
****************************************************/

DELIMITER $
DROP PROCEDURE IF EXISTS TEST_ENUM$
CREATE PROCEDURE TEST_ENUM (IN PARA_IN_OPTION ENUM ('Yes', 'No', 'Maybe'))
BEGIN
  DECLARE OPTION_INDEX INTEGER;
  SET OPTION_INDEX = PARA_IN_OPTION;
  SELECT OPTION_INDEX AS 'INDEX', PARA_IN_OPTION AS 'VALUE';
END$

/***************************************************
End of file
****************************************************/