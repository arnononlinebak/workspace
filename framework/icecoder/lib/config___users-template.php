<?php
$ICEcoderUserSettings = array(
"versionNo"		=> "3.2",
"root"			=> "",
"checkUpdates"		=> true,
"openLastFiles"		=> true,
"findFilesExclude"	=> array("_coder","ICEcoder",".doc",".gif",".jpg",".jpeg",".pdf",".png",".swf",".xml",".zip"),
"codeAssist"		=> true,
"visibleTabs"		=> false,
"lockedNav"		=> true,
"tagWrapperCommand"	=> "ctrl+alt",
"autoComplete"		=> "ctrl+space",
"password"		=> "",
"bannedFiles"		=> array("_coder","ICEcoder"),
"bannedPaths"		=> array("/var/www/.git","/var/www/sites/all/modules","/var/www/sites/default/files"),
"allowedIPs"		=> array("*"),
"plugins"		=> array(
			array("<b>Adminer</b><br>nMySQL database manager","plugins/adminer/icon.png","margin-left: 2px","plugins/adminer/adminer-3.7.1-mysql-en.php","_blank",""),
			array("<b>Emmet</b><br>Snippet type booster","plugins/emmet/icon.png","","http://docs.emmet.io","_blank",""),
			array("<b>CSS Beautify</b><br>Tidy up your CSS","plugins/cssbeautify/icon.png","","plugins/cssbeautify","fileControl:<b>Tidying your CSS</b>",""),
			array("<b>ICErepo</b><br>nGithub repo manager","plugins/ice-repo/icon.png","","plugins/ice-repo","_blank",""),
			array("<b>Zip It!</b><br>nFile/folder zip utility","plugins/zip-it/icon.png","margin-left: 3px","plugins/zip-it/?zip=|&exclude=*.doc*.gif*.jpg*.jpeg*.pdf*.png*.swf*.xml*.zip","fileControl:<b>Zipping Files</b>","30")
			),
"theme"			=> "default",
"fontSize"		=> "13px",
"lineWrapping"		=> true,
"indentWithTabs"	=> true,
"indentSize"		=> 4,
"previousFiles"		=> "",
"last10Files"		=> ""
);
?>