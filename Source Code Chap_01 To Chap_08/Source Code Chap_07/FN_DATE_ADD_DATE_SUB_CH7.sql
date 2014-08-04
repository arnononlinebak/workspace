/***************************************************
Source for Chapter 7 , Example (No run number)
Function DATE_ADD, DATE_SUB
You must copy this script run on MySQL Command Line Client
****************************************************/

use test;
SELECT NOW() AS 'TODAY', DATE_ADD(NOW(), INTERVAL '1 1' DAY_HOUR) AS 'TODAY INCREASE 1 DAY AND 1 HOUR';
SELECT NOW() AS 'TODAY', DATE_ADD(NOW(), INTERVAL '2' YEAR) AS 'TODAY INCREASE 2 YEARS';
SELECT NOW() AS 'TODAY', DATE_SUB(NOW(), INTERVAL '3 20' HOUR_MINUTE) AS 'TODAY DECREASE 3 HOURS AND 20 MINUTES';
SELECT NOW() AS 'TODAY', DATE_SUB(NOW(), INTERVAL '3' DAY) AS 'TODAY DECREASE 3 DAYS';


/***************************************************
End of file
****************************************************/