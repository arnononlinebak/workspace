/***************************************************
Source for Chapter 7 , Example (No run number)
Function STRCMP
You must copy this script run on MySQL Command Line Client
****************************************************/

use test;
SET @STRING1 = 'A';
SET @STRING2 = 'B';
SELECT ASCII(@STRING1) AS 'ASCII STRING1', ASCII(@STRING2) AS 'ASCII STRING2', STRCMP(@STRING1,@STRING2) AS 'COMPARE VALUE';
SELECT ASCII(@STRING2) AS 'ASCII STRING2', ASCII(@STRING1) AS 'ASCII STRING1', STRCMP(@STRING2,@STRING1) AS 'COMPARE VALUE';
SET @STRING3 = 'A';
SELECT ASCII(@STRING1) AS 'ASCII STRING1', ASCII(@STRING3) AS 'ASCII STRING3', STRCMP(@STRING1,@STRING3) AS 'COMPARE VALUE';


/***************************************************
End of file
****************************************************/