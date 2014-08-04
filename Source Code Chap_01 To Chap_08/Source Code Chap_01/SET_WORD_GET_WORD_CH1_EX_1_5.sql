/***************************************************
Source for Chapter 1 , Example 1.5
How to use User Variable transfer data between any procedure in the same Session
****************************************************/

DELIMITER $
DROP PROCEDURE IF EXISTS SET_WORD$
CREATE PROCEDURE SET_WORD()
BEGIN
  SELECT 'Hello' INTO @MY_WORD;
END$
DROP PROCEDURE IF EXISTS GET_WORD$
CREATE PROCEDURE GET_WORD()
BEGIN
  SELECT CONCAT(@MY_WORD, ' WORLD') AS 'Result';
END$


/***************************************************
End of file
****************************************************/