/***************************************************
Source for Chapter 6 , Example (No run number)
How to use TRIGGER finding sum data of any table
****************************************************/

DELIMITER $
DROP TRIGGER IF EXISTS SUMMARY_ITEMS_TRIGGER$
CREATE TRIGGER SUMMARY_ITEMS_TRIGGER AFTER INSERT
ON TBL_TRANSACTION_ITEMS
FOR EACH ROW
BEGIN
  DECLARE IS_ITEMID_EXISTS INT DEFAULT 0;
  SELECT COUNT(*) INTO IS_ITEMID_EXISTS FROM TBL_SUMMARY_ITEMS WHERE ItemID = NEW.ItemID;
  CASE
    WHEN (NEW.Activity = ‘IN’) THEN
      IF IS_ITEMID_EXISTS THEN
        UPDATE TBL_SUMMARY_ITEMS SET Amount = Amount + NEW.Amount WHERE ItemID = NEW.ItemID;
      ELSE
        INSERT INTO TBL_SUMMARY_ITEMS(ItemID,Amount) VALUES(NEW.ItemID,NEW.Amount);
      END IF;
    WHEN (NEW.Activity = ‘OUT’) THEN
      IF IS_ITEMID_EXISTS THEN
        UPDATE TBL_SUMMARY_ITEMS SET Amount = Amount - NEW.Amount WHERE ItemID = NEW.ItemID;
      ELSE
        INSERT INTO TBL_SUMMARY_ITEMS(ItemID,Amount) VALUES(NEW.ItemID,NEW.Amount);
      END IF;
  END CASE;
END$


/***************************************************
End of file
****************************************************/