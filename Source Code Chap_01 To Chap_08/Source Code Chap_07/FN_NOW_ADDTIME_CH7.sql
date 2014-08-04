/***************************************************
Source for Chapter 7 , Example (No run number)
Function NOW AND ADDTIME
You must copy this script run on MySQL Command Line Client
****************************************************/

use test;
SELECT NOW() AS 'TODAY', ADDTIME(NOW(), '2:10:10') AS 'TODAY ADD TIME 2:10:10';


/***************************************************
End of file
****************************************************/