/*************************************************************************
php easy :: online visitors counter scripts set - README FILE
==========================================================================
Author:      php easy code, www.phpeasycode.com
Web Site:    http://www.phpeasycode.com
Contact:     webmaster@phpeasycode.com
*************************************************************************/


I. DESCRIPTION
--------------
This set is intended to count and display the number of unique visitors currently
viewing your site by checking the referer IP addresses. It contains 3 ready-to-use
online visitor counters using 3 different methods of displaying data:
1. php include() directive;
2. html iframe widget;
3. javascript widget.
While php include() directive can be used only within php scripts, two other methods
can be called from html files as well.


II. USAGE
---------
1. Upload all the three files from the appropriate subfolder to the root folder on
   your server. You can also change the average time in seconds to consider someone
   online before removing from the online visitors list by modifying $expire value
   in seconds in visitors.php (by default is set to 100).
2. CHMOD visitors.db file to 666 to make it writable.
3. Open demo in your browser: http://www.yourdomain.com/demo.php (or demo.html)
4. If everything works, open the local demo file, find out the code to display the
   widget between
   <!-- widget start -->
   and
   <!-- widget end -->
   comments and copy it to ALL your files you want to display the widget.
5. Remove demo from your server.


III. LICENSE AGREEMENT
----------------------
This license is a legal agreement between you and 'php easy code' for the use
of 'php easy :: online visitors counter scripts set' (the 'Software'). By obtaining
the Software you agree to comply with the terms and conditions of this license.

PERMITTED USE
You are permitted to use, copy, modify, and distribute the Software and its
documentation, with or without modification, for any purpose, provided that
the following conditions are met:

1. A copy of this license agreement must be included with the distribution.

2. Redistributions of source code must retain the above copyright notice in
   all source code files.

3. Redistributions in binary form must reproduce the above copyright notice
   in the documentation and/or other materials provided with the distribution.

4. Any files that have been modified must carry notices stating the nature 
   of the change and the names of those who changed them.

5. Products derived from the Software must include an acknowledgment that
   they are derived from php easy code in their documentation and/or other
   materials provided with the distribution.


INDEMNITY
You agree to indemnify and hold harmless the authors of the Software and 
any contributors for any direct, indirect, incidental, or consequential 
third-party claims, actions or suits, as well as any related expenses, 
liabilities, damages, settlements or fees arising from your use or misuse 
of the Software, or a violation of any terms of this license.

DISCLAIMER OF WARRANTY
THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND, EXPRESSED OR 
IMPLIED, INCLUDING, BUT NOT LIMITED TO, WARRANTIES OF QUALITY, PERFORMANCE, 
NON-INFRINGEMENT, MERCHANTABILITY, OR FITNESS FOR A PARTICULAR PURPOSE. 

LIMITATIONS OF LIABILITY
YOU ASSUME ALL RISK ASSOCIATED WITH THE INSTALLATION AND USE OF THE SOFTWARE. 
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS OF THE SOFTWARE BE LIABLE 
FOR CLAIMS, DAMAGES OR OTHER LIABILITY ARISING FROM, OUT OF, OR IN CONNECTION 
WITH THE SOFTWARE. LICENSE HOLDERS ARE SOLELY RESPONSIBLE FOR DETERMINING THE 
APPROPRIATENESS OF USE AND ASSUME ALL RISKS ASSOCIATED WITH ITS USE, INCLUDING
BUT NOT LIMITED TO THE RISKS OF PROGRAM ERRORS, DAMAGE TO EQUIPMENT, LOSS OF 
DATA OR SOFTWARE PROGRAMS, OR UNAVAILABILITY OR INTERRUPTION OF OPERATIONS.

==================================
Copyright © 2008, by php easy code
