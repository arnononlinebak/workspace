/***************************************************
Source for Chapter 7 , Example (No run number)
Function DATE and TIME
You must copy this script run on MySQL Command Line Client
****************************************************/

use test;
SELECT NOW() AS 'TODAY', DATE(NOW()) AS 'DATE PART', TIME(NOW()) AS 'TIME PART';

/***************************************************
End of file
****************************************************/