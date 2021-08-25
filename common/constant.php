<?php

//always use these constants to store the current date & time.
date_default_timezone_set('Asia/Kolkata');

define("CURRENTTIME", date('Y-m-d H:i:s'));
define("CURRENTDATE", date('Y-m-d'));

define("COMPANY", 'Reyound');
define("LOGO", '../QwertyAsdf/img/logo.png');
define("TABLE_CLASS","table-responsive-lg table-bordered");

//to be used when you need the URL path:
$serverPath = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/";

define("LOCAL_IMAGE_PATH", $serverPath.'/');
//if you want to add a folder name for temporary purpose then you can do this: define("LOCAL_IMAGE_PATH", $serverPath.'folderName');   concat the name
define("SERVERPATHS", $serverPath.'Reyound/');


//to be used only when the project has mail sending facility otherwise delete it
// define("HOST","mail.studyleagueit.com");
// define("PORT",25);
// define("USERNAME","testing@studyleagueit.com");
// define("PASSWORD","123456789");
// define("NOREPLY","testing@studyleagueit.com");


define("company_name",'Reyound - Admin panel');

//SMS Pack credential
// define("SMSAPIKEY","35FF9A76EA45A1");
// define("SENDERID","SLITSS");
// define("ROUTEID","7");
// define("ENTITYID","1201161001935042878");
// define("CAMPAIGN_ID","10423");
// define("template_id","1207161767824281970");

//Pagination Limit
define("pagination_limit","18");

?>

