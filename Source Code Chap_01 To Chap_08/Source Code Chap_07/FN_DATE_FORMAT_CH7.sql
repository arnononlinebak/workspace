/***************************************************
Source for Chapter 7 , Example (No run number)
Function DATE_FORMAT
You must copy this script run on MySQL Command Line Client
****************************************************/

use test;
SELECT DATE_FORMAT(NOW(), '%a %d %b %y') AS 'TODAY';
SELECT DATE_FORMAT(NOW(), '%W, %D %M %Y, %r') AS 'TODAY';
SELECT DATE_FORMAT('2011-01-01', '%X, %V') AS 'WEEK NUMBER';
SELECT DATE_FORMAT(NOW(), '%x, %v') AS 'WEEK NUMBER';


/***************************************************
End of file
****************************************************/