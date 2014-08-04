/***************************************************
Source for Chapter 5 , Example 5.1
How to set Storage Enging of any Table
****************************************************/

DROP TABLE IF EXISTS TBL_ITEMS;
CREATE TABLE TBL_ITEMS(
  ItemID INT NOT NULL,
  ItemName VARCHAR(20) NOT NULL,
  CategoryID INT NOT NULL,
  PRIMARY KEY(ItemID))
ENGINE = INNODB;


/***************************************************
End of file
****************************************************/