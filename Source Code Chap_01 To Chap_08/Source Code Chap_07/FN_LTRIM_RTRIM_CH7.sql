/***************************************************
Source for Chapter 7 , Example (No run number)
Function LTRIM, RTRIM
You must copy this script run on MySQL Command Line Client
****************************************************/

use test;
SET @STRING1 = '          ABCDEFG          ';
SELECT LTRIM(@STRING1) AS 'LTRIM FN', RTRIM(@STRING1) AS 'RTRIM FN';


/***************************************************
End of file
****************************************************/