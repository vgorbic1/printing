/** 
 * This script works in conjunction with jQuery Validation Plugin
 * https://jqueryvalidation.org/
 *
 */
$(function() {
	
  /* Add a custom method for date validation */ 
  $.validator.addMethod(
    "usaDate",
    function(value, element) {
        return value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
    }
  );	
	
  /* Initialize form validation on the submittion form */
  $("form[name='duplicating_request']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute of an input field. Validation rules are defined on the right side
      firstName: "required",
	  lastName: "required",
	  email: {
        required: true,
        email: true
      },
	  phone: {
		required: true,
		phoneUS: true
	  },
	  program: "required",
	  employeeNumber: {
		required: true,
		minlength: 7,
		maxlength: 7
	  },
	  mcCode: {
		required: true,
		minlength: 10,
		maxlength: 10
	  },
	  dateNeeded: {
		required: true,
		usaDate: true
	  },
	  priority: "required",
	  pickupTime: "required",
	  numberOfPages: {
        required: true,
        digits: true		 
	  },
	  quantity: {
        required: true,
        digits: true		 
	  },
	  deliverTo: "required",
	  exam: "required",
	  powerPoint: "required",
	  paperSize: "required",
	  paperColor: "required",
	  ncr: "required",
	  cardColor: "required",
	  holes: "required",
	  collating: "required",
	  cover: "required",
	  fold: "required",
	  bind: "required",
	  laminate: "required"
    },
    // Specify validation error messages
    messages: {
      firstName: "Please enter your first name",
	  lastName: "Please enter your last name",
	  email: "Please enter a valid email address",
	  phone: "Please enter a valid phone number",
	  program: "Please select a program or division",
	  employeeNumber: "Please enter 7 digits",
	  mcCode: "Please enter 10 digits",
	  dateNeeded: "Please enter a date, for example 10/20/2016",
	  priority: "Please select priority",
	  pickupTime: "Please select pick-up time",
	  numberOfPages: "Please enter number of pages",
	  quantity: "Please enter quantity",	
      deliverTo: "Please select location",	 
	  exam: "Please enter if needed for an exam",
	  powerPoint: "Please select PowerPoint handout type",
	  paperSize: "Please select paper size",
	  paperColor: "Please select paper color",
	  ncr: "Please select carbonless paper option",
	  cardColor: "Please select card stock color",
	  holes: "Please select if holes are needed",
	  collating: "Please select collating",
	  cover: "Please select cover",
	  fold: "Please select folding",
	  bind: "Please select binding",
	  laminate: "Please select laminating"		  
    },
    // Make sure the form is submitted to the destination defined in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    } 
  });
});