<?php
/**
 * Router Utility
 *
 * @author		JREAM
 * @link		http://jream.com
 * @copyright		2011 Jesse Boyer (contact@jream.com)
 * @license		GNU General Public License 3 (http://www.gnu.org/licenses/)
 *
 * This program is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details:
 * http://www.gnu.org/licenses/
*/

/**
*	Part 1: Rename this file to index.php
*/

/**
*	Part 2:	Create an .htaccess file
*	-------------------------------------
	RewriteEngine On
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteRule ^(.*)$ index.php [L]
*	-------------------------------------
*/

/**
*	Part 3: Setup a directory for your classes
*	Autoload Classes 
*/
function __autoload($class) {
    $file = "./". $class .".php";
    include_once($file);
}

/**
*	Handle the URL Component
*/
$url = explode('/', $_SERVER['REQUEST_URI']);

/**
*	Remove empty components
*/
$url = array_filter($url, 'strlen');

/**
*	See the Output
*/
echo '<pre>';
print_r($url);
echo '</pre>';

/**
*	Handle your code in any way you like.
*/