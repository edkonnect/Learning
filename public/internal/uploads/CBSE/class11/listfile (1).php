<?php
$myDirectory = opendir(".");

// get each entry
while($entryName = readdir($myDirectory)) {
	$dirArray[] = $entryName;
}

// close directory
closedir($myDirectory);

//	count elements in array
$indexCount	= count($dirArray);


// sort 'em
sort($dirArray);

// print 'em
print("<TABLE border=1 cellpadding=5 cellspacing=0 class=whitelinks>\n");
print("<TR><TH>Folders</TH></TR>\n");
// loop through the array of files and print them all
for($index=0; $index < $indexCount; $index++) {
        if (substr("$dirArray[$index]", 0, 1) != "." AND is_dir("$dirArray[$index]")){ // don't list hidden files
		print("<TR><TD><a href=\"../$dirArray[$index]/listfile.php\">$dirArray[$index]</a></td>");
		print("</TR>\n");
	}
}
print("</TABLE>\n");

?>