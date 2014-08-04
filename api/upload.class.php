<?php
/**
 * Upload 0.3b
 *
 * @author		JREAM
 * @link		http://jream.com
 * @copyright		2010 Jesse Boyer (contact@jream.com)
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
 *
 * @uses
 *
	You need your html form
	<form enctype="multipart/form-data" method="post" action="url_here.php">
		<input type="file" name="fieldname" />
		<input type="submit" />
	</form>

	The PHP usage:

 		$upload = new Upload('fieldname');
 		$upload->format('lowercase');
 		$upload->format('nospaces');
 		$upload->save();
 		
		if ($upload->result == true) {
			echo 'Tell them it was good!';
		}
		// Make sure to check the error variable incase something went wrong!
		// How you output it is up to you!
		else {
			echo $upload->error;
 		}

	A specific directory:
		$upload = new Upload('fieldname', 'myfolder/');


 */

class Upload
{

	/**
	 * @var <mixed> Retrieve the result, default is set to false.
	 */
	public $result = 0;
	
	/**
	 * @var <string> The name of the file used for outside operations (optional)
	 */
	public $name;
	
	/**
	 * @var <string> Retrieve the error
	 */
	public $error;

	/**
	 *
	 * @var <string> Name of the HTML form field
	 */
	private $_field;

	/**
	 * @var <string> The directory to place the file in
	 */
	private $_dir;

	/*
	 * @var <boolean> Whether or not overwriting should happen.
	 */
	private $_overwrite;
	
	/**
	 * @desc This WILL overwrite files that exist with the same name.
	 * 
	 * @param <string> $field The name of the HTML input field for the file
	 * @param <string> $dir the directory to place the file
	 * @param <boolean> $overwrite Whether or not to overwrite the file
	 */
	public function __construct($field, $dir = NULL, $overwrite = 1)
	{

		/** Set the name of the field for use with the other methods */
		$this->_field = $field;


		if (isset($dir))
		{
			if (substr($dir, -1) != '/')
			$dir .= '/';
		}
		$this->_dir = $dir;

		/** Do we want to overwrite files? */
		$this->_overwrite = $overwrite;

		/** The actual file name used for placement and retrieving outside the object */
		$this->name = $_FILES[$this->_field]['name'];
	
	}
	
	/**
	 * @desc Format the saved filename (optional)
	 * 
	 * @param <string> $type nospaces, lowercase, prepend
	 * @param <string> $value only used for the prepend value
	 */

	public function format($type, $value = NULL)
	{
		switch ($type)
		{
			case 'nospaces':
				$this->name = str_replace(' ', '_', $this->name);
				break;

			case 'lowercase':
				$this->name = strtolower($this->name);
				break;
				
			case 'prepend':
				$this->name = $value . $this->name;
				break;
		}
	}
	
	/**
	 * @desc The final command to upload the file
	 * 
	 */
	public function save()
	{
		/** Process the File */
		if ($this->_fileErrors() == false)
		{
			$this->_attemptMove();
		}
	}
	
	/**
	 * @desc Checks the incoming file for errors and whether it exists or not.
	 * 
	 * @return <string|boolean> Return the warning, otherwise return false.
	 */
	private function _fileErrors()
	{
		switch ($_FILES[$this->_field]['error'])
		{

			case 1:
				$this->error = 'UPLOAD_ERR_INI_SIZE; The uploaded file exceeds the upload_max_filesize directive in php.ini.';
				return true;
				break;

			case 2:
				$this->error = 'UPLOAD_ERR_FORM_SIZE; The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.';
				return true;
				break;

			case 3:
				$this->error = 'UPLOAD_ERR_PARTIAL; The uploaded file was only partially uploaded.';
				return true;
				break;

			case 4:
				$this->error = 'UPLOAD_ERR_NO_FILE; No file was uploaded.';
				return true;
				break;

			case 6:
				$this->error = 'UPLOAD_ERR_NO_TMP_dir; Missing a temporary folder.';
				return true;
				break;

			case 7:
				$this->error = 'UPLOAD_ERR_CANT_WRITE; Failed to write file to disk.';
				return true;
				break;

			case 8:
				$this->error = 'UPLOAD_ERR_EXTENSION; A PHP extension stopped the file upload. PHP does not provide a way to ascertain which extension caused the file upload to stop; examining the list of loaded extensions with phpinfo() may help.';
				return true;
				break;

			default:
				return false;
				break;
		}

	}

	/**
	 * @desc Attempts to move the file into the user specific directory.
	 *		 If anything goes wrong PHP will issue a warning.
	 * @return <boolean> result of the move
	 */
	private function _attemptMove()
	{
		if ($this->_overwrite == false && file_exists($this->_dir . $this->name))
		{
			$this->error = "This file already exists, please use another name.";
			$this->result = 0;
			return false;
		}
		else
		{
			if (move_uploaded_file($_FILES[$this->_field]["tmp_name"], $this->_dir . $this->name) == true)
			{
				$this->result = 1;
				chmod($this->_dir . $this->name, 0777);
				return true;
			}
			else return false;
		}
	}

}