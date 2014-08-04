/***************************************************
Source for Chapter 7 , Example (No run number)
Function TRIM
You must copy this script run on MySQL Command Line Client
****************************************************/

use test;
SET @STRING1 = '>>>>>ABCDEFG<<<<<';
SET @STRING2 = '-----ABCDEFG-----';
SET @STRING3 = '     ABCDEFG     ';
SELECT TRIM(LEADING '>' FROM @STRING1) AS 'TRIM LEADING', TRIM(TRAILING '<' FROM @STRING1) AS 'TRIM TRAILING', TRIM(BOTH '-' FROM @STRING2) AS 'TRIM BOTH', TRIM(@STRING3) AS 'TRIM FN';


/***************************************************
End of file
****************************************************/