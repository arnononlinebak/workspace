/***************************************************
Source for Chapter 6 , Example (No run number)
Script create TBL_TRANSACTION_ITEMS
****************************************************/

DROP TABLE IF EXISTS TBL_TRANSACTION_ITEMS;
CREATE TABLE TBL_TRANSACTION_ITEMS(
  TransactionID INT AUTO_INCREMENT NOT NULL,
  ItemID INT,
  Activity VARCHAR(3),
  Amount INT,
  PRIMARY KEY(TransactionID))ENGINE = INNODB;
DROP TABLE IF EXISTS TBL_SUMMARY_ITEMS;
CREATE TABLE TBL_SUMMARY_ITEMS(
  ItemID INT,
  Amount INT,
  PRIMARY KEY(ItemID))ENGINE = INNODB;
DROP TABLE IF EXISTS TBL_LOG;
CREATE TABLE TBL_LOG(
  LogID INT AUTO_INCREMENT NOT NULL,
  Detail LONGTEXT,
  LogDateTime DATETIME,
  PRIMARY KEY(LogID))ENGINE = INNODB;


/***************************************************
End of file
****************************************************/