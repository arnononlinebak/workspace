/***************************************************
Source for Chapter 7 , Example (No run number)
Function TIMEDIFF
You must copy this script run on MySQL Command Line Client
****************************************************/

use test;
SELECT TIMEDIFF(NOW(), DATE_ADD(NOW(), INTERVAL '1:5:12' HOUR_SECOND)) AS 'TIME2 IS GREATER THAN TIME1';
SELECT TIMEDIFF(DATE_ADD(NOW(), INTERVAL '1:5:12' HOUR_SECOND), NOW()) AS 'TIME1 IS GREATER THAN TIME2';

/***************************************************
End of file
****************************************************/