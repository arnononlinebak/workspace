/***************************************************
Source for Chapter 5 , Example 5.2
Show create TRANSACTION with SET autocommit = 0;
****************************************************/

DELIMITER $
DROP PROCEDURE IF EXISTS TRANSACTION_1$
CREATE PROCEDURE TRANSACTION_1(IN PARM_ITEM_ID INT,IN PARM_ITEM_NAME LONGTEXT,IN PARM_CATEGORY_ID INT,IN TRANSACTION_STATUS INT)
BEGIN
  CASE
    WHEN (TRANSACTION_STATUS = 1) THEN
      SET autocommit = 0;
        INSERT INTO TBL_ITEMS(ItemID,ItemName,CategoryID) VALUES (PARM_ITEM_ID,PARM_ITEM_NAME,PARM_CATEGORY_ID);
      COMMIT;
      SELECT 'COMMIT THIS TRANSACTION' AS 'RESULT';
    WHEN (TRANSACTION_STATUS = 0) THEN
      SET autocommit = 0;
        INSERT INTO TBL_ITEMS(ItemID,ItemName,CategoryID) VALUES (PARM_ITEM_ID,PARM_ITEM_NAME,PARM_CATEGORY_ID);
      ROLLBACK;
      SELECT 'ROLLBACK THIS TRANSACTION' AS 'RESULT';
  END CASE;
END$


/***************************************************
End of file
****************************************************/