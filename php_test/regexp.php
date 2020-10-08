<?php
//* - MAtch zero or more of previous
//+ - Match one or more of previous
//? - match one or zero of previous
//{4}  - exact number
//{min,max} - match at least min but not more than max
//^ match start of the line
//$ match end of the line
//. match any single character

//escape special characters: ?,.,$,*,+   USE bACKSLASH \
// [] - range
// [A-Za-z] - from A-Z to a-z, space included

//for example - > for name -> /^[A-Za-z . ]*$/
// for email -> /[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/
//not quite work for URL -> /(http:|ftp:|https:)\/\/[a-zA-Z0-9-_%\$?#\~!`]+\.[a-zA-Z0-9-_%\$?#\~!`]*+\.[a-zA-Z0-9-_%\$?#\~!`]*/
?>