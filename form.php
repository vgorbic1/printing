<?php
/**
 * Form for the application
 */
if (!isset($no_errors)) die("No direct access please");
?>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'utf-8'); ?>" 
			  method="post" 
			  enctype="multipart/form-data"
			  id="duplicating_request"
			  name="duplicating_request">
		  
		  <div class="wrapper-block">
		    <p style="color:red">(*) Required fields.</p> 
            <label for="firstName">First Name<span class="small-label">Enter your first name.</span></label>
            <input type="text" name="firstName" id="firstName" placeholder="" value="<?php if (isset($firstName)) echo htmlspecialchars($firstName[1]); ?>" />
			<span class="required-field">*</span>
			<?php if (isset($firstNameError)) echo "<p class=\"error\">$firstNameError</p>" ?>
			<div class="clear"></div>
          </div>
          <div class="clear"></div>
		  
          <div class="wrapper-block">
            <label for="lastName">Last Name<span class="small-label">Enter your last name.</span></label>
            <input type="text" name="lastName" id="lastName" placeholder="" value="<?php if (isset($lastName)) echo htmlspecialchars($lastName[1]); ?>" />
			<span class="required-field">*</span>
			<?php if (isset($lastNameError)) echo "<p class=\"error\">$lastNameError</p>" ?>
			<div class="clear"></div>
          </div>
          <div class="clear"></div>		  
		  
          <div class="wrapper-block">
            <label for="email">Email<span class="small-label">Enter valid email address.</span></label>
            <input type="text" name="email" id="email" placeholder="" value="<?php if (isset($email)) echo htmlspecialchars($email[1]); ?>" />
			<span class="required-field">*</span>
			<?php if (isset($emailError)) echo "<p class=\"error\">$emailError</p>" ?>
			<div class="clear"></div>
          </div>
          <div class="clear"></div>	

          <div class="wrapper-block">
            <label for="phone">Phone Number<span class="small-label">Include area code</span></label>
            <input type="text" name="phone" id="phone" placeholder="" value="<?php if (isset($phone)) echo htmlspecialchars($phone[1]); ?>" />
			<span class="required-field">*</span>
			<?php if (isset($phoneError)) echo "<p class=\"error\">$phoneError</p>" ?>
			<div class="clear"></div>
          </div>
          <div class="clear"></div>	

		  <div class="wrapper-block">
            <label for="program">Program / Division<span class="small-label">Select program or division.</span></label>
            <select name="program" id="program">
                <option value="" <?php if (!isset($program)) echo "selected" ?>>-- Select a program --</option>
				<option value="Administration" <?php if (isset($program) && $program[1] == "Administration") echo "selected" ?>>Administration</option>
				<option value="Academic Advancement" <?php if (isset($program) && $program[1] == "Academic Advancement") echo "selected" ?>>Academic Advancement</option>
				<option value="Applied Science Engineering and Technology" <?php if (isset($program) && $program[1] == "Applied Science Engineering and Technology") echo "selected" ?>>Applied Science Engineering & Technology</option>
				<option value="Art Dept." <?php if (isset($program) && $program[1] == "Art Dept.") echo "selected" ?>>Art Dept.</option>
				<option value="Arts and Sciences" <?php if (isset($program) && $program[1] == "Arts and Sciences") echo "selected" ?>>Arts & Sciences</option>
				<option value="Athletics" <?php if (isset($program) && $program[1] == "Athletics") echo "selected" ?>>Athletics</option>
				<option value="BICS" <?php if (isset($program) && $program[1] == "BICS") echo "selected" ?>>BICS</option>
				<option value="Book Store" <?php if (isset($program) && $program[1] == "Book Store") echo "selected" ?>>Book Store</option>
				<option value="Business and Applied Arts" <?php if (isset($program) && $program[1] == "Business and Applied Arts") echo "selected" ?>>Business & Applied Arts</option>
				<option value="CETL" <?php if (isset($program) && $program[1] == "CETL") echo "selected" ?>>CETL</option>
				<option value="Community and Corporate Learning" <?php if (isset($program) && $program[1] == "Community and Corporate Learning") echo "selected" ?>>Community & Corporate Learning</option>
				<option value="CPAAC" <?php if (isset($program) && $program[1] == "CPAAC") echo "selected" ?>>CPAAC</option>
                <option value="Economic" <?php if (isset($program) && $program[1] == "Economic") echo "selected" ?>>Economic</option>
				<option value="Health Education/Sciences" <?php if (isset($program) && $program[1] == "Health Education/Sciences") echo "selected" ?>>Health Education/Sciences</option>
				<option value="Human and Protective Services" <?php if (isset($program) && $program[1] == "Human and Protective Services") echo "selected" ?>>Human & Protective Services</option>
				<option value="Learner Success Operations" <?php if (isset($program) && $program[1] == "Learner Success Operations") echo "selected" ?>>Learner Success Operations</option>
				<option value="Library" <?php if (isset($program) && $program[1] == "Library") echo "selected" ?>>Library</option>
				<option value="Marketing" <?php if (isset($program) && $program[1] == "Marketing") echo "selected" ?>>Marketing</option>
				<option value="Online and Accelerated Learning" <?php if (isset($program) && $program[1] == "Online and Accelerated Learning") echo "selected" ?>>Online & Accelerated Learning</option>
				<option value="Public Safety Services" <?php if (isset($program) && $program[1] == "Public Safety Services") echo "selected" ?>>Public Safety Services</option>
				<option value="Student Life" <?php if (isset($program) && $program[1] == "Student Life") echo "selected" ?>>Student Life</option>
				<option value="Student Services" <?php if (isset($program) && $program[1] == "Student Services") echo "selected" ?>>Student Services</option>
                <option value="Workforce Development" <?php if (isset($program) && $program[1] == "Workforce Development") echo "selected" ?>>Workforce Development</option>
            </select><span class="required-field">*</span>
			<?php if (isset($programError)) echo "<p class=\"error\">$programError</p>" ?>			
			<div class="clear"></div>
          </div>		  
		  
          <div class="wrapper-block">
            <label for="employeeNumber">Employee Number<span class="small-label">Enter 7-digit Employee Number.</span></label>
            <input type="text" name="employeeNumber" id="employeeNumber" maxlength="7" value="<?php if (isset($phone)) echo htmlspecialchars($employeeNumber[1]); ?>" />
			<span class="required-field">*</span>
			<?php if (isset($employeeNumberError)) echo "<p class=\"error\">$employeeNumberError</p>" ?>
			<div class="clear"></div>
          </div>
          <div class="clear"></div>		

          <div class="wrapper-block">
            <label for="mcCode">MC Code<span class="small-label">Enter 10-digit Mailing and Copier code.</span></label>
            <input type="text" name="mcCode" id="mcCode" maxlength="10" value="<?php if (isset($phone)) echo htmlspecialchars($mcCode[1]); ?>" />
			<span class="required-field">*</span>
			<?php if (isset($mcCodeError)) echo "<p class=\"error\">$mcCodeError</p>" ?>
			&nbsp;<a href="https://facstaff.madisoncollege.edu/in/worktags-mc-codes" target="new">view MC codes</a>
			<div class="clear"></div>
          </div>
          <div class="clear"></div>			  

          <div class="wrapper-block">
            <label for="grant">Project Grant<span class="small-label">Optional</span></label>
            <input type="text" name="grant" id="grant" value="<?php if (isset($phone)) echo htmlspecialchars($grant[1]); ?>" />
			<?php if (isset($grantError)) echo "<p class=\"error\">$grantError</p>" ?>
			<div class="clear"></div>
          </div>
          <div class="clear"></div>			  

          <div class="wrapper-block">
            <label for="dateNeeded">Date Needed<span class="small-label">Date Needed</span></label>
            <input type="text" name="dateNeeded" id="dateNeeded" value="<?php if (isset($phone)) echo htmlspecialchars($dateNeeded[1]); ?>" />
			<span class="required-field">*</span>
			<?php if (isset($dateNeededError)) echo "<p class=\"error\">$dateNeededError</p>" ?>			
			&nbsp;(mm/dd/yyyy)
			<div class="clear"></div>
          </div>
          <div class="clear"></div>			  

		  <div class="wrapper-block">
            <label for="priority">Priority</label>
            <select name="priority" id="priority">
                <option value="high" <?php if (isset($priority) && $priority[1] == "high") echo "selected" ?>>High</option>
				<option value="standard" <?php if (!isset($program) || (isset($program) && $program[1] == "standard")) echo "selected" ?>>Standard</option>
				<option value="low" <?php if (isset($program) && $program[1] == "low") echo "selected" ?>>Low</option>
            </select><span class="required-field">*</span>
			<?php if (isset($priorityError)) echo "<p class=\"error\">$priorityError</p>" ?>
			<div class="clear"></div>			
          </div>

		  <div class="wrapper-block">
            <label for="pickupTime">Pick-up Time</label>
            <select name="pickupTime" id="pickup">
				<option value="8:00am" <?php if (isset($pickupTime) && $pickupTime[1] == "8:00am") echo "selected" ?>>8:00am</option>
				<option value="8:30am" <?php if (isset($pickupTime) && $pickupTime[1] == "8:30am") echo "selected" ?>>8:30am</option>
				<option value="9:00am" <?php if (isset($pickupTime) && $pickupTime[1] == "9:00am") echo "selected" ?>>9:00am</option>
				<option value="9:30am" <?php if (isset($pickupTime) && $pickupTime[1] == "9:30am") echo "selected" ?>>9:30am</option>
				<option value="10:00am" <?php if (isset($pickupTime) && $pickupTime[1] == "10:00am") echo "selected" ?>>10:00am</option>
				<option value="10:30am" <?php if (isset($pickupTime) && $pickupTime[1] == "10:30am") echo "selected" ?>>10:30am</option>
				<option value="11:00am" <?php if (isset($pickupTime) && $pickupTime[1] == "11:00am") echo "selected" ?>>11:00am</option>
				<option value="11:30am" <?php if (isset($pickupTime) && $pickupTime[1] == "11:30am") echo "selected" ?>>11:30am</option>
				<option value="12:00pm" <?php if (isset($pickupTime) && $pickupTime[1] == "12:00pm") echo "selected" ?>>12:00pm</option>
				<option value="12:30pm" <?php if (isset($pickupTime) && $pickupTime[1] == "12:30pm") echo "selected" ?>>12:30pm</option>
				<option value="1:00pm" <?php if (isset($pickupTime) && $pickupTime[1] == "1:00pm") echo "selected" ?>>1:00pm</option>
				<option value="1:30pm" <?php if (isset($pickupTime) && $pickupTime[1] == "1:30pm") echo "selected" ?>>1:30pm</option>
				<option value="2:00pm" <?php if (isset($pickupTime) && $pickupTime[1] == "2:00pm") echo "selected" ?>>2:00pm</option>
				<option value="2:30pm" <?php if (isset($pickupTime) && $pickupTime[1] == "2:30pm") echo "selected" ?>>2:30pm</option>
				<option value="3:00pm" <?php if (isset($pickupTime) && $pickupTime[1] == "3:00pm") echo "selected" ?>>3:00pm</option>
				<option value="3:30pm" <?php if (isset($pickupTime) && $pickupTime[1] == "3:30pm") echo "selected" ?>>3:30pm</option>
				<option value="4:00pm" <?php if (isset($pickupTime) && $pickupTime[1] == "4:00pm") echo "selected" ?>>4:00pm</option>
				<option value="4:30pm" <?php if (isset($pickupTime) && $pickupTime[1] == "4:30pm") echo "selected" ?>>4:30pm</option>
				<option value="5:00pm" <?php if (isset($pickupTime) && $pickupTime[1] == "5:00pm") echo "selected" ?>>5:00pm</option>
            </select><span class="required-field">*</span>
			<?php if (isset($pickupTimeError)) echo "<p class=\"error\">$pickupTimeError</p>" ?>
			<div class="clear"></div>			
          </div>
		  
          <div class="wrapper-block">
            <label for="numberOfPages">Number of Pages<span class="small-label">in file being attached</span></label>
            <input type="text" name="numberOfPages" id="numberOfPages" value="<?php if (isset($numberOfPages)) echo htmlspecialchars($numberOfPages[1]); ?>" />
			<span class="required-field">*</span>
			<?php if (isset($numberOfPagesError)) echo "<p class=\"error\">$numberOfPagesError</p>" ?>
			<div class="clear"></div>
          </div>
          <div class="clear"></div>	

          <div class="wrapper-block">
            <label for="quantity">Quantity<span class="small-label">to be printed</span></label>
            <input type="text" name="quantity" id="quantity" value="<?php if (isset($quantity)) echo htmlspecialchars($quantity[1]); ?>" />
			<span class="required-field">*</span>
			<?php if (isset($quantityError)) echo "<p class=\"error\">$quantityError</p>" ?>
			<div class="clear"></div>
          </div>
          <div class="clear"></div>	

		  <div class="wrapper-block">
            <label for="deliverTo">Deliver to<span class="small-label">Select location to deliver.</span></label>
            <select name="deliverTo" id="deliverTo">
                <option value="">-- Select a location --</option>
				<option value="Truax" <?php if (!isset($deliverTo) || (isset($deliverTo) && $deliverTo[1] == "Truax")) echo "selected" ?> >Truax (on pick-up shelf)</option>
				<option value="Commercial Ave." <?php if (isset($deliverTo) && $deliverTo[1] == "Commercial Ave.") echo "selected" ?>>Commercial Ave.</option>
				<option value="Downtown" <?php if (isset($deliverTo) && $deliverTo[1] == "Downtown") echo "selected" ?>>Downtown</option>
				<option value="TEC 3" <?php if (isset($deliverTo) && $deliverTo[1] == "TEC 3") echo "selected" ?>>TEC 3</option>
				<option value="School of Human and Protective Services" <?php if (isset($deliverTo) && $deliverTo[1] == "School of Human and Protective Services") echo "selected" ?>>School of Human and Protective Services</option>
				<option value="Foundation Center / Finance Department" <?php if (isset($deliverTo) && $deliverTo[1] == "Foundation Center / Finance Department") echo "selected" ?>>Foundation Center / Finance Department</option>
				<option value="School of Health Education" <?php if (isset($deliverTo) && $deliverTo[1] == "School of Health Education") echo "selected" ?>>School of Health Education</option>
				<option value="Portage" <?php if (isset($deliverTo) && $deliverTo[1] == "Portage") echo "selected" ?>>Portage</option>
				<option value="Reedsburg" <?php if (isset($deliverTo) && $deliverTo[1] == "Reedsburg") echo "selected" ?>>Reedsburg</option>
				<option value="Fort Atkinson" <?php if (isset($deliverTo) && $deliverTo[1] == "Fort Atkinson") echo "selected" ?>>Fort Atkinson</option>
				<option value="Watertown" <?php if (isset($deliverTo) && $deliverTo[1] == "Watertown") echo "selected" ?>>Watertown</option>
				<option value="West Campus" <?php if (isset($deliverTo) && $deliverTo[1] == "West Campus") echo "selected" ?>>West Campus</option>
                <option value="South Campus" <?php if (isset($deliverTo) && $deliverTo[1] == "South Campus") echo "selected" ?>>South Campus</option>
            </select><span class="required-field">*</span>
			<?php if (isset($deliverToError)) echo "<p class=\"error\">$deliverToError</p>" ?>
			<div class="page-subheading">
				<p>&nbsp;All Jobs are to be picked up at TRUAX unless otherwise indicated here.</p>
			</div>		
          </div>
		  
		  <div class="wrapper-block">
			<label for="exam">Exam<span class="required-field">*</span><span class="small-label">&nbsp;</span></label>
			<input type="radio" value="yes" name="exam" <?php if (isset($exam) && $exam[1] == "yes") echo "checked"; ?> />Yes
            <input type="radio" value="no" name="exam" <?php if (!isset($exam) || (isset($exam) && $exam[1] == "no")) echo "checked"; ?> />No	
			<?php if (isset($examError)) echo "<p class=\"error\">$examError</p>" ?>
			<div class="clear"></div>
		  </div>	

		  <div class="wrapper-block">
			<label for="comments">Comment<span class="small-label">You can write your comments here.</span></label>
			<textarea id="comments" rows="5" name="comments" cols="20"><?php if (isset($comments)) echo htmlspecialchars($comments[1]); ?></textarea>
		  </div>
		  		
          <div class="wrapper-block">
              <label for="attachment">File to be Printed<span class="required-field">*</span><span class="small-label">Only one file per submission</span></label>
			  <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $maxFileSize; ?>" />
              <input type="file" name="attachment" id="attachment" />
			  <?php if (isset($attachmentError)) echo "<p class=\"error\">$attachmentError</p>" ?>			  
			  <div class="page-subheading">
				<p>&nbsp;&nbsp;<a href="file-types.html" target="new">View allowed file types and formats</a></p>				
			  </div>
          </div>
          <div class="clear"></div>		  
		  
		  <h2>Printing Options:</h2>
			
		  <div class="wrapper-block">
			<label>Single-sided Printing<span class="required-field">*</span><span class="small-label">&nbsp;</span></label>
			<input type="radio" name="singleSide" value="yes" <?php if (isset($singleSide) && $singleSide[1] == "yes") echo "checked"; ?> />Yes
			<input type="radio" name="singleSide" value="no" <?php if (!isset($singleSide) || (isset($singleSide) && $singleSide[1] == "no")) echo "checked"; ?> />No
			<?php if (isset($singleSideError)) echo "<p class=\"error\">$singleSideError</p>" ?>
			<div class="page-subheading">				
			  <p>&nbsp;If "No" is selected, all work will be two-sided printing.</p>	
			</div>
		  </div>
		  
		  <div class="wrapper-block">
			<label>Color Printing<span class="required-field">*</span><span class="small-label">&nbsp;</span></label>
			<input type="radio" name="colorPrinting" value="yes" <?php if (isset($colorPrinting) && $colorPrinting[1] == "yes") echo "checked"; ?> />Yes
			<input type="radio" name="colorPrinting" value="no" <?php if (!isset($colorPrinting) || (isset($colorPrinting) && $colorPrinting[1] == "no")) echo "checked"; ?> />No
			<?php if (isset($colorPrintingError)) echo "<p class=\"error\">$colorPrintingError</p>" ?>
			<div class="page-subheading">					
			  <p>&nbsp;If "No" is selected, all work will be black &amp; white printing.</p>
			</div>
		  </div>
		  
		  <div class="wrapper-block">
			<label for="powerPoint">PowerPoint Handouts<span class="small-label">&nbsp;</span></label>
			  <select name="powerPoint" id="powerPoint">
				<option value="None" <?php if (!isset($powerPoint) || (isset($powerPoint) && $deliverTo[1] == "None")) echo "selected" ?>>None</option>
				<option value="2-up" <?php if (isset($powerPoint) && $powerPoint[1] == "2-up") echo "selected" ?>>2-up</option>
				<option value="3-up" <?php if (isset($powerPoint) && $powerPoint[1] == "3-up") echo "selected" ?>>3-up</option>
				<option value="4-up" <?php if (isset($powerPoint) && $powerPoint[1] == "4-up") echo "selected" ?>>4-up</option>
				<option value="6-up" <?php if (isset($powerPoint) && $powerPoint[1] == "6-up") echo "selected" ?>>6-up</option>
				<option value="Notes pages" <?php if (isset($powerPoint) && $powerPoint[1] == "Notes pages") echo "selected" ?>>Notes pages</option>
				<option value="Outline view" <?php if (isset($powerPoint) && $powerPoint[1] == "Outline view") echo "selected" ?>>Outline view</option>
              </select><span class="required-field">*</span>
			  <?php if (isset($powerPointError)) echo "<p class=\"error\">$powerPointError</p>" ?>
		  </div>	
		  
		  <div class="wrapper-block">
			<label for="paperSize">Paper Size<span class="small-label">&nbsp;</span></label>
			  <select name="paperSize" id="paperSize">
				<option value="letter" <?php if (!isset($paperSize) || (isset($paperSize) && $paperSize[1] == "letter")) echo "selected" ?>>8.5" x 11" letter</option>
				<option value="legal" <?php if (isset($paperSize) && $paperSize[1] == "legal") echo "selected" ?>>8.5" x 14" legal</option>
				<option value="tabloid" <?php if (isset($paperSize) && $paperSize[1] == "tabloid") echo "selected" ?>>11" x 17" tabloid</option>
              </select><span class="required-field">*</span>
			  <?php if (isset($paperSizeError)) echo "<p class=\"error\">$paperSizeError</p>" ?>
		  </div>
		  <div class="clear"></div>
			
		  <div class="wrapper-block">
			<label for="paperColor">20 lb. Paper Color<span class="small-label">&nbsp;</span></label>
			<select name="paperColor" id="paperColor" class="colors">
			  <option value="White" <?php if (!isset($paperColor) || (isset($paperColor) && $paperColor[1] == "White")) echo "selected" ?>>White</option>
			  <option value="Blue" <?php if (isset($paperColor) && $paperColor[1] == "Blue") echo "selected" ?>>Blue</option>
			  <option value="Canary" <?php if (isset($paperColor) && $paperColor[1] == "Canary") echo "selected" ?>>Canary</option>
			  <option value="Salmon" <?php if (isset($paperColor) && $paperColor[1] == "Salmon") echo "selected" ?>>Salmon</option>
			  <option value="Grey" <?php if (isset($paperColor) && $paperColor[1] == "Grey") echo "selected" ?>>Grey</option>	
			  <option value="Orchid" <?php if (isset($paperColor) && $paperColor[1] == "Orchid") echo "selected" ?>>Orchid</option>	
			  <option value="Buff" <?php if (isset($paperColor) && $paperColor[1] == "Buff") echo "selected" ?>>Buff</option>	
			  <option value="Pink" <?php if (isset($paperColor) && $paperColor[1] == "Pink") echo "selected" ?>>Pink</option>	
			  <option value="Ivory" <?php if (isset($paperColor) && $paperColor[1] == "Ivory") echo "selected" ?>>Ivory</option>	
			  <option value="Green" <?php if (isset($paperColor) && $paperColor[1] == "Green") echo "selected" ?>>Green</option>	
			  <option value="Goldenrod" <?php if (isset($paperColor) && $paperColor[1] == "Goldenrod") echo "selected" ?>>Goldenrod</option>					
            </select><span class="required-field">*</span>	
			<?php if (isset($paperSizeError)) echo "<p class=\"error\">$paperSizeError</p>" ?>
		  </div>
			
		  <div class="wrapper-block">
			<label for="ncr">NCR<span class="small-label">Carbonless paper option. No color choice available.</span></label>
			<select name="ncr" id="ncr">
			  <option value="None" <?php if (!isset($ncr) || (isset($ncr) && $ncr[1] == "None")) echo "selected" ?>>None</option>
			  <option value="2-ply" <?php if (isset($ncr) && $ncr[1] == "2-ply") echo "selected" ?>>2 Ply (White &amp; Canary)</option>
			  <option value="3-ply" <?php if (isset($ncr) && $ncr[1] == "3-ply") echo "selected" ?>>3 Ply (White, Canary &amp; Pink)</option>
			  <option value="4-ply" <?php if (isset($ncr) && $ncr[1] == "4-ply") echo "selected" ?>>4 Ply (White, Canary, Pink &amp; Goldenrod)</option>
			</select><span class="required-field">*</span>
			<?php if (isset($ncrError)) echo "<p class=\"error\">$ncrError</p>" ?>
		  <div class="clear"></div>
		  
		  <div class="wrapper-block">
			<label for="cardColor">60 lb. Card Stock Color<span class="small-label">&nbsp;</span></label>
			<select name="cardColor" id="cardColor" class="colors">
			  <option value="None" <?php if (!isset($cardColor) || (isset($cardColor) && $cardColor[1] == "None")) echo "selected" ?>>None</option>
			  <option value="Buff" <?php if (isset($cardColor) && $cardColor[1] == "Buff") echo "selected" ?>>Buff</option>	
			  <option value="Pink" <?php if (isset($cardColor) && $cardColor[1] == "Pink") echo "selected" ?>>Pink</option>			  
			  <option value="Celestial Blue" <?php if (isset($cardColor) && $cardColor[1] == "Celestial Blue") echo "selected" ?>>Celestial Blue</option>
			  <option value="White" <?php if (isset($cardColor) && $cardColor[1] == "White") echo "selected" ?>>White</option>	
			  <option value="Bright Yellow" <?php if (isset($cardColor) && $cardColor[1] == "Bright Yellow") echo "selected" ?>>Bright Yellow</option>
			  <option value="Salmon" <?php if (isset($cardColor) && $cardColor[1] == "Salmon") echo "selected" ?>>Salmon</option>
			  <option value="Green" <?php if (isset($cardColor) && $cardColor[1] == "Green") echo "selected" ?>>Green</option>				  
			  <option value="Grey" <?php if (isset($cardColor) && $cardColor[1] == "Grey") echo "selected" ?>>Grey</option>	
			  <option value="Orange" <?php if (isset($cardColor) && $cardColor[1] == "Orange") echo "selected" ?>>Orange</option>	
			  <option value="Purple" <?php if (isset($cardColor) && $cardColor[1] == "Purple") echo "selected" ?>>Purple</option>	
			  <option value="Terra Green" <?php if (isset($cardColor) && $cardColor[1] == "Terra Green") echo "selected" ?>>Terra Green</option>	
			  <option value="Yellow" <?php if (isset($cardColor) && $cardColor[1] == "Yellow") echo "selected" ?>>Yellow</option>	
			  <option value="Red" <?php if (isset($cardColor) && $cardColor[1] == "Red") echo "selected" ?>>Red</option>				  
			  <option value="Blue" <?php if (isset($cardColor) && $cardColor[1] == "Blue") echo "selected" ?>>Blue</option>
			  <option value="Emerald Green" <?php if (isset($cardColor) && $cardColor[1] == "Emerald Green") echo "selected" ?>>Emerald Green</option>				  
            </select><span class="required-field">*</span>
			<?php if (isset($cardColorError)) echo "<p class=\"error\">$cardColorError</p>" ?>
				<div class="clear"></div>
			</div>	
		  <div class="clear"></div>			
		  
		  <h2>Finishing Options:</h2>
		  
		  <div class="wrapper-block">
			<label for="holes">Drill 3 Holes<span class="required-field">*</span><span class="small-label">&nbsp;</span></label>
			<input type="radio" value="yes" name="holes" <?php if (isset($holes) && $holes[1] == "yes") echo "checked"; ?> />Yes
            <input type="radio" value="no" name="holes" <?php if (!isset($holes) || (isset($holes) && $holes[1] == "no")) echo "checked"; ?> />No
			<?php if (isset($holesError)) echo "<p class=\"error\">$holesError</p>" ?>
			<div class="clear"></div>
		  </div>
			
		  <div class="wrapper-block">
			<label for="collating">Collating<span class="small-label">&nbsp;</span></label>
			<select name="collating" id="collating">
			  <option value="None" <?php if (!isset($collating) || (isset($collating) && $collating[1] == "None")) echo "selected" ?>>None</option>
			  <option value="Collate and staple" <?php if (isset($collating) && $collating[1] == "Collate and staple") echo "selected" ?>>Collate and staple.</option>	
			  <option value="Collate. Do not staple" <?php if (isset($collating) && $collating[1] == "Collate. Do not staple") echo "selected" ?>>Collate. Do not staple.</option>			  
			  <option value="No Collating" <?php if (isset($collating) && $collating[1] == "No Collating") echo "selected" ?>>No Collating. By page.</option>
			  <?php if (isset($collatingError)) echo "<p class=\"error\">$collatingError</p>" ?>
            </select><span class="required-field">*</span>
		  </div>	  
				  
		  <div class="wrapper-block">
			<label>Covers<span class="small-label">&nbsp;</span></label>
			<select name="cover" id="cover">
			  <option value="None" <?php if (!isset($cover) || (isset($cover) && $cover[1] == "None")) echo "selected" ?>>None</option>
			  <option value="20" <?php if (isset($cover) && $cover[1] == "20") echo "selected" ?>>20 lb.</option>	
			  <option value="65" <?php if (isset($cover) && $cover[1] == "65") echo "selected" ?>>65 lb.</option>			  	  
            </select><span class="required-field">*</span>
			<?php if (isset($coverError)) echo "<p class=\"error\">$coverError</p>" ?>
			
            <input type="checkbox" value="yes" name="coverFront" <?php if (isset($coverFront) && $coverFront[1] == "yes") echo "checked" ?> />Front
			<input type="checkbox" value="yes" name="coverBack" <?php if (isset($coverBack) && $coverBack[1] == "yes") echo "checked" ?> />Back
		  </div>	
		  <div class="clear"></div>
		  
		  <div class="wrapper-block">
			<label for="fold">Folding<span class="small-label">&nbsp;</span></label>		
			<select name="fold" id="fold">
			  <option value="None" <?php if (!isset($fold) || (isset($fold) && $fold[1] == "None")) echo "selected" ?>>None</option>
			  <option value="Half-fold" <?php if (isset($fold) && $fold[1] == "Half-fold") echo "selected" ?>>Half-fold</option>	
			  <option value="Tri-fold" <?php if (isset($fold) && $fold[1] == "Tri-fold") echo "selected" ?>>Tri-fold</option>	
			  <option value="Z-fold" <?php if (isset($fold) && $fold[1] == "Z-fold") echo "selected" ?>>Z-fold</option>			  	  
            </select><span class="required-field">*</span>
			<?php if (isset($foldError)) echo "<p class=\"error\">$foldError</p>" ?>
			&nbsp;<a href="folding.html" target="new">Folding Options</a>
			</div>
		  </div>
		  
		  <div class="wrapper-block">
			<label for="bind">Binding<span class="small-label">&nbsp;</span></label>
			<select name="bind" id="bind">
			  <option value="None" <?php if (!isset($bind) || (isset($bind) && $bind[1] == "None")) echo "selected" ?>>None</option>
			  <option value="Plastic Comb" <?php if (isset($bind) && $bind[1] == "Plastic Comb") echo "selected" ?>>Plastic Comb</option>	
			  <option value="Shrink Wrap" <?php if (isset($bind) && $bind[1] == "Shrink Wrap") echo "selected" ?>>Shrink Wrap</option>	
			  <option value="Unibind" <?php if (isset($bind) && $bind[1] == "Unibind") echo "selected" ?>>Unibind</option>			  	  
            </select><span class="required-field">*</span>	
			<?php if (isset($bindError)) echo "<p class=\"error\">$bindError</p>" ?>
			&nbsp;<a href="binding.html" target="new">Binding Options</a>
			</div>
		  </div>	

		  <div class="wrapper-block">
			<label for="laminate">Laminate<span class="required-field">*</span><span class="small-label">&nbsp;</span></label>
			<input type="radio" value="yes" name="laminate" <?php if (isset($laminate) && $laminate[1] == "yes") echo "checked"; ?> />Yes
            <input type="radio" value="no" name="laminate" <?php if (!isset($laminate) || (isset($laminate) && $laminate[1] == "no")) echo "checked"; ?>/>No
			<?php if (isset($laminateError)) echo "<p class=\"error\">$laminateError</p>" ?>
			<div class="clear"></div>
		  </div>	
		  <div class="clear"></div>
		  
		  <div class="row">
		    <div class="grid_9">
			  <p class="copyright_notice"><strong>Copyright Notice:</strong> Copyrighted material may not be duplicated without first receiving permission from the copyright holder, 
			  or unless it falls under the Fair Use guidelines of U.S. Copyright Law.</p>
			  <p>Printing Services staff have the right and the obligation to refuse requests which they have reason to believe are in violation of the law.</p>
		    </div>
          </div>		  
          <div class="clear"></div>    
		  
          <div class="submission-block">                     
            <input id="submit-button" type="submit" name="submit" value="Submit" /> 
			<input id="reset-button" type="reset" name="reset" value="Reset" />  			  
          </div>		  
        </form>