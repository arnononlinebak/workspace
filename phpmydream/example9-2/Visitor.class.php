<?php
class Visitor {
	private static $num_visitor = 0;

 	function __construct() {
	 	self::$num_visitor++;
 	}

 	public static function getVisitor() {
	 	return self::$num_visitor;
 	}
}
?>