/***************************************************
Source for Chapter 2 , Example 2.4
How to use LEAVE statement for exit any block
****************************************************/

DELIMITER $
DROP PROCEDURE IF EXISTS BLOCK4$
CREATE PROCEDURE BLOCK4()
OUTTER_BLOCK : BEGIN
  DECLARE STATE_PROGRAM INTEGER;
  SET STATE_PROGRAM = 1;
  INNER_BLOCK : BEGIN
    IF (STATE_PROGRAM = 1) THEN
      LEAVE INNER_BLOCK;
    END IF;
    SELECT 'THIS STATEMENT PROCESSING BY INNER BLOCK';
  END INNER_BLOCK;
  SELECT 'END OF PROGRAM';
END OUTTER_BLOCK$


/***************************************************
End of file
****************************************************/