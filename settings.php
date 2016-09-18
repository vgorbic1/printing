<?php
/**
 * Application settings
 */
if (!isset($no_errors)) die("No direct access please");

// Set size for the attachemnt to be uploaded (in bytes) 
$maxFileSize = 4194304; // 4 MB in bytes 

// Set path to root directory, where all attachment folders are located
$destination = '';

// Set permitted file types to be uploaded. Get more MIME types here: http://www.freeformatter.com/mime-types-list.html 
$fileTypesPermitted = array('image/gif', 
							'image/jpeg', 
							'image/pjpeg', 
							'image/png', 
							'application/pdf',
							'application/msword',
							'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
							'application/vnd.ms-excel',
							'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
							'application/vnd.ms-powerpoint',
							'application/vnd.openxmlformats-officedocument.presentationml.presentation');
							
// Set Printing Services Staff email
$staffEmail = "";
?>