<?php
/**
 * Main functions for the application
 */
if (!isset($no_errors)) die("No direct access please");
	
/**
 * Check whether the field is empty
 */
function validateEmpty($field) {
	if (empty($field[1])) {
		global $no_errors;
		$no_errors = false;
		return "field is empty";
	}
}

/**
 * Check whether the email address is valid
 */
function validateEmail($field) {
	if (!filter_var($field[1], FILTER_VALIDATE_EMAIL)){
		global $no_errors;
		$no_errors = false;
		return "email address is invalid";
	}
}

/**
 * Check whether the date is valid
 */
function validateDate($field) {
	$valid_date = preg_match("/^[0-1][0-9]\\/[0-3][0-9]\\/20\\d{2}$/", $field[1]);
	if(!$valid_date){
		global $no_errors;
		$no_errors = false;
		return "date is invalid";
	}
}

/**
 * Check whether the phone has numbers, spaces, and dashes
 * - Must begin with one of these characters: +, (, or a digit
 * - Must contain at least 8 digits in the phone number part (not considering any extension part)
 * - At least 2 digits need to be grouped consecutively
 * - Must only contain these characters: ().,- and whitespace and digits
 */
function validatePhone($field) {
    $field[1] = preg_replace('/\s+(#|x|ext(ension)?)\.?:?\s*(\d+)/', ' ext \3', $field[1]);
    $us_number = preg_match('/^(\+\s*)?((0{0,2}1{1,3}[^\d]+)?\(?\s*([2-9][0-9]{2})\s*[^\d]?\s*([2-9][0-9]{2})\s*[^\d]?\s*([\d]{4})){1}(\s*([[:alpha:]#][^\d]*\d.*))?$/', $field[1]);
    $valid_number = preg_match('/^(\+\s*)?(?=([.,\s()-]*\d){8})([\d(][\d.,\s()-]*)([[:alpha:]#][^\d]*\d.*)?$/', $field[1]) && preg_match('/\d{2}/', $field[1]);
    if (!$us_number || !$valid_number) {
        global $no_errors;
		$no_errors = false;
		return "$field[0] is invalid";
    }
} 

/**
 * Check whether the field is numeric
 */
function validateType($field, $type) {
	if ($type == "numeric") {
		if (!ctype_digit($field[1])) {
			global $no_errors;
		    $no_errors = false;
			return "enter numbers only";	
		}
	}
}

/** 
 * Check whether the field has a valid type and number of characters
 */ 
function validateNumberOfChars($field, $type, $min, $max) {	
	$message = validateType($field, $type);
	if (empty($message)) {
		if ($min == $max) {
			if (strlen($field[1]) != $min) {
				global $no_errors;
				$no_errors = false;
				return "enter $min characters";
			}	
		} else {
			if (strlen($field[1]) < $min || strlen($field[1] > $max)) {
				global $no_errors;
				$no_errors = false;
				return "enter correct number of characters";
			}	
		}	
	}
	return $message;
}

/**
 * Check whether the attachment file is valid for downloading
 */
function validateAttachment($attachment, $max, $types) {
	if ($attachment['size'] > $max) {
		global $no_errors;
		$no_errors = false;
	    return "{$attachment['name']} exceeds maximum size: " . $max/1048576 . " MB";
	}
	switch ($attachment['error']) {
      case 0:
		break;
      case 1:
      case 2:
	    global $no_errors;
		$no_errors = false;
        return "{$attachment['name']} exceeds maximum size: " . $max/1048576 . " MB";
		break;
      case 3:
		global $no_errors;
		$no_errors = false;	  
        return "Error uploading {$attachment['name']} Please try again";
        break;
      case 4:
		global $no_errors;
		$no_errors = false;	  
        return "No file selected";
        break;
      default:
		global $no_errors;
		$no_errors = false;	  
        return  "System error uploading {$attachment['name']}. Contact webmaster";
	}
	if ($attachment['size'] == 0) {
		global $no_errors;
		$no_errors = false;
	    return "File is empty";
	}
	if (!in_array($attachment['type'], $types)) {
		global $no_errors;
		$no_errors = false;
		return "this file type is not permitted";
	}	
}

/**
 * Define file size to display it to user
 */
function formatSizeUnits($attachment) {
    if ($attachment['size'] >= 1073741824) {
        return number_format($attachment['size'] / 1073741824, 2) . ' GB';
    }
    elseif ($attachment['size'] >= 1048576) {
        return number_format($attachment['size'] / 1048576, 2) . ' MB';
    }
    elseif ($attachment['size'] >= 1024) {
        return number_format($attachment['size'] / 1024, 2) . ' kB';
    }
    elseif ($attachment['size'] > 1) {
        return $attachment['size'] . ' bytes';
    }
    elseif ($attachment['size'] == 1) {
        return $attachment['size'] . ' byte';
    } else {
        return '0 bytes';
    }
}

/**
 * Create a Directory for current attachment
 */
function createUserDirectory($user_email, $directory) {
	// Get current timestamp
	date_default_timezone_set("America/Chicago");
	$now = new DateTime();
	// Choose format for the directory name
	$timestamp = $now->format('Y-m-d_h-i-s'); 
	// Add user's name part, which is one before "@" symbol in user's email
	$user_email = explode("@", $user_email[1]);
	$username = $user_email[0];
	// Create path to user's directory
	$pathToUserDir = $directory . $username . "_" . $timestamp;
	if (!file_exists($pathToUserDir)) {
		// Create directory and specify permissions
		mkdir($pathToUserDir, 0777, true);
	}
	// Add trailing slash to the path
return "{$pathToUserDir}/"; 
}

/**
 * Create a file with user's input to put together with the attachment into the user's directory
 */
function createOrderDetailsFile($pathToUserDir, $userInput, $attachment) {
	// User's input to put to Order Details file
	$outputTable = generateOrderDetailsTable($userInput, $attachment);
	//Create html template for the file
	$output = <<<TEXT
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Order Details</title> 
		<style>
			body {color: #050505; font: 14px Arial, Helvetica, sans-serif;}
		</style>
	</head>
	<body>
		{$outputTable}
	</body>
</html> 
TEXT;
	// Name the file that contains the Order Details
	$fileName = "orderDetails.html";
	$pathToOrderDetails = $pathToUserDir . $fileName;
	// Create the Order Details file 
	file_put_contents($pathToOrderDetails, $output);
}

/**
 * Generate a table to put into OrderDetails file and confirmation emails
 */
function generateOrderDetailsTable($userInput, $attachment){
	// Get file size
	$fileSize = formatSizeUnits($attachment);
	$outputTable = "<table>";
	foreach ($userInput as $item) {
		$outputTable .= "<tr>                
							<td><div align='right'><strong>{$item[0]}: </strong></div></td>
							<td><div align='left'>{$item[1]}</div></td>
						</tr>";
	}
	// Add attachment link
	$outputTable .= "<tr>
						<td><div align='right'><strong>{$attachment['fieldTitle']}: </strong></div></td>
						<td><div align='left'><a href='{$attachment['name']}'>{$attachment['name']}</a>&nbsp;<em>(File size: {$fileSize})</div></td>
					</tr>";
	// Add submission timestamp
	date_default_timezone_set("America/Chicago");
	$now = new DateTime();
	// Choose format for the directory name
	$timestamp = $now->format('m/d/Y h:i:s');
	$outputTable .= "<tr>
						<td><div align='right'><strong>Submitted: </strong></div></td>
						<td><div align='left'>$timestamp</div></td>
					</tr>";	
	$outputTable .= "</table>";	
	return $outputTable;
}

/**
 * Send email message to Printing Services Staff
 * Since it is PHP 5.4 we cannot use array_search() 
*/
function emailRequestConfirmation($userInput, $attachment, $staffEmail) {
	foreach ($userInput as $item) {
		if ($item[0] == "First Name") {
			$userFirstName = $item[1];
		}
		if ($item[0] == "Last Name") {
			$userLastName = $item[1];
		}
		if ($item[0] == "Email") {
			$userEmail = $item[1];
		}
	}
	$emailto = $staffEmail;
    $subject = 'Madison College Printing Request';
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= "From: {$userFirstName} {$userLastName} <{$userEmail}>\r\n";
    //$headers .= "Cc: ";
    $message = generateOrderDetailsTable($userInput, $attachment);
    mail($emailto, $subject, $message, $headers);
} 