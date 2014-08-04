/***************************************************
Source for Chapter 3 , Example (No run number)
Script to create TBL_CATEGORIES
****************************************************/

DELIMITER $
DROP PROCEDURE IF EXISTS CREATE_TBL_CATEGORIES$
CREATE PROCEDURE CREATE_TBL_CATEGORIES()
BEGIN
  CREATE TABLE IF NOT EXISTS TBL_CATEGORIES(
    CategoryID INT NOT NULL,
    CategoryName VARCHAR(15) NOT NULL,
    Description LONGTEXT NULL,
    PRIMARY KEY(CategoryID))
  ENGINE = INNODB CHARACTER SET utf8 COLLATE utf8_unicode_ci;
  DELETE FROM TBL_CATEGORIES;
  INSERT INTO TBL_CATEGORIES(CategoryID,CategoryName,Description) VALUES (1, 'Beverages', 'Soft drinks, coffees, teas, beers, and ales');
  INSERT INTO TBL_CATEGORIES(CategoryID,CategoryName,Description) VALUES (2, 'Condiments', 'Sweet and savory sauces, relishes, spreads, and seasonings');
  INSERT INTO TBL_CATEGORIES(CategoryID,CategoryName,Description) VALUES (3, 'Confections', 'Desserts, candies, and sweet breads');
  INSERT INTO TBL_CATEGORIES(CategoryID,CategoryName,Description) VALUES (4, 'Dairy Products', 'Cheeses');
  INSERT INTO TBL_CATEGORIES(CategoryID,CategoryName,Description) VALUES (5, 'Grains/Cereals', 'Breads, crackers, pasta, and cereal');
  INSERT INTO TBL_CATEGORIES(CategoryID,CategoryName,Description) VALUES (6, 'Meat/Poultry', 'Prepared meats');
  INSERT INTO TBL_CATEGORIES(CategoryID,CategoryName,Description) VALUES (7, 'Produce', 'Dried fruit and bean curd');
  INSERT INTO TBL_CATEGORIES(CategoryID,CategoryName,Description) VALUES (8, 'Seafood', 'Seaweed and fish');
  SELECT 'OK. DONE' AS 'MESSAGE';
END$


/***************************************************
End of file
****************************************************/