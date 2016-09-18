<?php 
/**
 * Duplicating Request Application
 * Developed for Madison College / Madison Area Technical College
 * @author Vladislav Gorbich
 * @version v2.0a
 *
 * TO DO: 1) Add and check the link to the file that was attached and put to the user's directory. The link is located in functions.php -> generateOrderDetailsTable().
 *		  2) Make sure that the path to uploads directory in settings.php -> $destination is set correctly.
 *        3) Make sure you have set the maximum size for file uploads in settings.php -> $maxFileSize.
 *        4) Make sure you have set all MIME types that are allowed to be uploaded in settings.php -> $fileTypesPermitted. Update file-types.html accordingly!
 *        5) Make sure that settings.php -> $staffEmail is correct.
 *		  6) Remove/comment system error handling below.
 */

// System Error Handling for debuggin
error_reporting(E_ALL);
ini_set('display_errors', 1);

// By default set errors to be shown
$no_errors = true;

// Get application settings
require_once("settings.php");

// Add all functions
require_once("functions.php");

// Check if the attachments directory is writable
 if (!is_dir($destination) || !is_writable($destination)) {
      echo("$destination must be a valid, writable directory");
}
							
// Get input from the user and check whether any errors occure
if (isset($_POST["submit"])) {	

	// Unset previous success message
	$successMessage = NULL;
	
	$firstName = array("First Name", trim($_POST['firstName']));
	$firstNameError = validateEmpty($firstName);	
	
	$lastName = array("Last Name", trim($_POST['lastName']));
	$lastNameError = validateEmpty($lastName);	
	
	$email = array("Email", trim($_POST['email']));
	$emailError = validateEmail($email);
	
	$phone = array("Phone Number", trim($_POST['phone']));
	$phoneError = validatePhone($phone);
	
	$program = array("Program / Division", trim($_POST['program']));	
	$programError = validateEmpty($program);
	
	$employeeNumber = array("Employee Number", trim($_POST['employeeNumber']));
	$employeeNumberError = validateNumberOfChars($employeeNumber, "numeric", 7, 7);	
	
	$mcCode = array("MC Code", trim($_POST['mcCode']));
	$mcCodeError = validateNumberOfChars($mcCode, "numeric", 10, 10);

	$grant = array("Project Grant", trim($_POST['grant']));
	
	$dateNeeded = array("Date Needed", trim($_POST['dateNeeded']));
	$dateNeededError = validateDate($dateNeeded);
	
	$priority = array("Priority", trim($_POST['priority']));
	$priorityError = validateEmpty($priority);
	
	$pickupTime = array("Pick-up Time", trim($_POST['pickupTime']));
	$pickupTimeError = validateEmpty($pickupTime);
	
	$numberOfPages = array("Number of Pages", trim($_POST['numberOfPages']));
	$numberOfPagesError = validateType($numberOfPages, "numeric");
	
	$quantity = array("Quantity", trim($_POST['quantity']));
	$quantityError = validateType($quantity, "numeric");
	
	$deliverTo = array("Deliver to", trim($_POST['deliverTo']));
	$deliverToError = validateEmpty($deliverTo);
	
	$exam = array("Exam", trim($_POST['exam']));
	$examError = validateEmpty($exam);
	
	$comments = array("Comments", trim($_POST['comments']));
	
	$attachment = $_FILES['attachment'];
	$attachment['fieldTitle'] = "Attachment";
	$attachmentError = validateAttachment($attachment, $maxFileSize, $fileTypesPermitted);

	$singleSide = array("Single-sided Printing", trim($_POST['singleSide']));
	$singleSideError = validateEmpty($singleSide);
	
	$colorPrinting = array("Color Printing", trim($_POST['colorPrinting']));
	$colorPrintingerror = validateEmpty($colorPrinting);
	
	$powerPoint = array("PowerPoint Handouts", trim($_POST['powerPoint']));
	$powerPointerror = validateEmpty($powerPoint);
	
	$paperSize = array("Paper Size", trim($_POST['paperSize']));
	$paperSizeError = validateEmpty($paperSize);
	
	$paperColor = array("Paper Color", trim($_POST['paperColor']));
	$paperColorError = validateEmpty($paperColor);
	
	$ncr = array("NCR", trim($_POST['ncr']));
	$ncrError = validateEmpty($ncr);
	
	$cardColor = array("Card Stock Color", trim($_POST['cardColor']));
	$cardColorError = validateEmpty($cardColor);
		
	$holes = array("Drill 3 Hole", trim($_POST['holes']));
	$holesError = validateEmpty($holes);
	
	$collating = array("Collating", trim($_POST['collating']));
	$collatingError = validateEmpty($collating);
	
	$cover = array("Covers", trim($_POST['cover']));
	$coverError = validateEmpty($cover);
	
	if(isset($_POST['coverFront'])) {
	    $coverFront = array("Cover Front", trim($_POST['coverFront']));
	} else {
		$coverFront = array("Cover Front", "no");		
	}
	if(isset($_POST['coverBack'])) {	
		$coverBack = array("Cover Back", trim($_POST['coverBack']));
	} else {
		$coverBack = array("Cover Back", "no");
	}

	$fold = array("Folding", trim($_POST['fold']));
	$foldError = validateEmpty($fold);
	
	$bind = array("Binding", trim($_POST['bind']));
	$bindError = validateEmpty($bind);
	
	$laminate = array("Laminate", trim($_POST['laminate']));
	$laminateError = validateEmpty($laminate);
    
	
	if ($no_errors) {		
		// Create user's folder and move the attached file to that directory
		$pathToUserDir = createUserDirectory($email, $destination);
		$success = move_uploaded_file($attachment['tmp_name'], $pathToUserDir . $attachment['name']);
		
		if ($success) {
			// Combine all user's input in one array
			$userInput = array($firstName, $lastName, $email, $phone, $program, $employeeNumber, $mcCode, $grant, $dateNeeded, $priority,
			$pickupTime, $numberOfPages, $quantity, $deliverTo, $exam, $comments, $singleSide, $colorPrinting, $powerPoint, 
			$paperSize, $paperColor, $ncr, $cardColor, $holes, $collating, $cover, $coverFront, $coverBack, $fold, $bind, $laminate); 	
			// Create a file to put together with attachment
            createOrderDetailsFile($pathToUserDir, $userInput, $attachment);			
			// Display success message to user
			$successMessage = "Your request was successfully submitted!";		
			// Send email to Printing Services Staff
			//emailRequestConfirmation($userInput, $attachment, $staffEmail);		
		}
	}
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=10" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <title>Madison Area Technical College, Duplicating/Printing Request</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/base-modified.css">
  <link rel="stylesheet" href="css/amazium.css">	
  <link rel="stylesheet" href="css/layout.css">
</head>
<body>
  <div id="headercontainer">
    <img src="images/mc-logo.png" id="mclogo" alt="Madison College" />
    <div id="header"><a href="http://madisoncollege.edu">Madison College</a></div>
    <div id="header2">
	  <a href="#">General Fund Duplicating Request</a>
	</div>
  </div>
  <div class="clear"></div>
   
  <div id="container">
  <div class="content rounded-corners row">
  
    <div class="navigation">
      <div class="content-navigation grid_3">
        <div class="content-navigation-lists">
          <span class="navigation-list-heading">Help</span>
          <ul class="menu-1-user">
              <li><a href="folding.html" target="new">Folding Options</a></li>
              <li><a href="binding.html" target="new">Binding Options</a></li>
			  <li><a href="file-types.html" target="new">File types allowed</a></li>
          </ul>
        </div>
      </div>
    </div>
	
    <div class="content-area grid_9">
      <div class="page-heading">
		<h1>General Fund Duplicating Request</h1>
	  </div>
	  <p>If you have questions in regards to filling out this form, you can request help from John Doe, Printing Specialist, 
      by calling (608) 246-6666 or by sending an <a href="mailto:duplicating@madisoncollege.edu">email to the Document Services Department.</a></p>
      <div class="content-body">
	  
		<?php 
			if (!isset($successMessage)) {
				include("form.php");
				echo '<div class="page-subheading">
						<p>If you have questions in regards to filling out this form, you can request help from John Doe, Printing Specialist, 
							by calling (608) 246-6666 or by sending an <a href="mailto:jdoe@madisoncollege.edu">email to the Document Services Department.</a>
						</p>
					 </div>';
			} else {
				echo "<div class=\"success-message\">$successMessage</div>";
				echo "<a href=\"index.php\"><button>Submit another request</button></a>";
			}
		?>
						
       </div>
    </div>
  </div>

</div>
</body>
</html>
<!--JS-->
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<script src="//cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
<script src="js/form-validation.js"></script>