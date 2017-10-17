/**
 * @uuthor - sergmoro1@ya.ru
 * @author - URI http://vorst.ru
 * @license - MIT
 *
 * Show current cost of order. Verify - is all inputs filled in.
 * 
 */
window.$ = jQuery;
$(document).ready(function() {
	var sumID = '#cost-calculator-sum #sum span';
	$('#cost-calculator .dependent').hide();
	
	var total = {};
	var coeff = {};
	var submit = $('#cost-calculator .btn-calculate');
	var errors;
    // User choice a radibutton item, click on it.
    // Change color of clicked item.
    // If item has dependent items then clear sum.
    // Hide all dependent items except clicked.
    // Calculate and show current sum.
	$('#questionnaire-form input:radio').click(function() { 
		var that = $(this);
		// change color to inherit because field was filled in
		that.closest('.question-answers').find('h3').css('color', 'inherit');
		// reduce errors
		if(errors > 0) {
			errors--;
			if(errors == 0)
				$('#questionnaire-form .error').text('');
		}
		var variable = that.attr('name');
		var i = that.attr('data-index');
		var value = that.attr('data-value');
		// find all dependents
		var dependents = $('#' + variable + ' .dependent');
		// if dependents more then 0 then init sum & remove result
		if(dependents.length) {
			total = {};
			coeff = {};
			$(sumID).text('0');
			$('#results').remove();
		}
		// hide all dependents except selected
		dependents.each(function( index ) {
			// all cheked to false
			$(this).find('input:radio').prop('checked', false);
			// show selected dependent block
			if($(this).attr('id') == (variable + '-' + i))
				$(this).show();
			// hide others
			else
				$(this).hide();
		});
		// show submit button after first selection
		if(submit.css('display') == 'none')
			submit.show();
		// change sum
		var sum = 0;
		if(value.substr(0,1) == '*')
			coeff[variable] = Number(value.substr(1));
		else
			total[variable] = Number(value);
		for(var j in total)
			sum += total[j];
		for(var j in coeff)
			sum *= coeff[j];
		$(sumID).text(sum);
	});
	// Verify - is really all field are filled in.
	// If not then mark not selected items by color.
	$('#questionnaire-form .btn-calculate').click(function() {
		errors = 0;
		var dependents = $('#questionnaire-form .dependent');
		dependents.each(function( index ) {
			// if block is visible
			if($(this).css('display') == 'block') {
				var that = $(this);
				// find all radio inputs
				var vars = {};
				that.find('input:radio').each(function( index ) {
					// accomulate values by all radio variables checking all variants for variable
					var name = $(this).prop('name');
					vars[name] = vars[name] || $(this).prop('checked');
				});
				// mark not filled in fields
				for(var name in vars) {
					if(!vars[name]) {
						that.find('#' + name + '.question-answers h3').css('color', '#a94442');
						errors++;
					}
				}
			}
		});
		
		if(errors)
			$('#questionnaire-form .error').text(lcc_message.selectAllOptions);
		
		return !errors;
	});
});
