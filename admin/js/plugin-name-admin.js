(function( $ ) {
	'use strict';

	/**
	 * All of the code for your Dashboard-specific JavaScript source
	 * should reside in this file.
	 *
	 * Note that this assume you're going to use jQuery, so it prepares
	 * the $ function reference to be used within the scope of this
	 * function.
	 *
	 * From here, you're able to define handlers for when the DOM is
	 * ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * Or when the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and so on.
	 *
	 * Remember that ideally, we should not attach any more than a single DOM-ready or window-load handler
	 * for any particular page. Though other scripts in WordPress core, other plugins, and other themes may
	 * be doing this, we should try to minimize doing that in our own work.
	 */

function countCSSRules() {
    var results = '',
    	rules = '',
        log = '';
    if (!document.styleSheets) {
        return;
    }
    for (var i = 0; i < document.styleSheets.length; i++) {
        countSheet(document.styleSheets[i]);
    }
    function countSheet(sheet) {
        var count = 0,
        	rules = '';
        if (sheet && sheet.cssRules) {
            for (var j = 0, l = sheet.cssRules.length; j < l; j++) {
                var rule = sheet.cssRules[j];
                if (rule instanceof CSSImportRule) {
                    countSheet(rule.styleSheet);
                }
                if( !rule.selectorText ) {
                    continue;
                }
                rules += rule.selectorText;
                count += rule.selectorText.split(',').length;
            }
            // console.log(rules);

            log += '\nFile: ' + (sheet.href ? sheet.href : 'inline <style> tag');
            log += '\nRules: ' + sheet.cssRules.length;
            log += '\nSelectors: ' + count;
            log += '\n--------------------------';
            if (count >= 4096) {
                results += '\n********************************\nWARNING:\n There are ' + count + ' CSS rules in the stylesheet ' + sheet.href +  ' - IE will ignore the last ' + (count - 4096) + ' rules!\n';
                results += rules;
            }
        }
    }
    if( results ) {
        console.log(log);
        console.log(results);
    }

}
$('#').remove();

$(window).load(function() {
	countCSSRules();
	countStylesheets();
})


// countSheet(document.getElementById('iris-css')

function countStylesheets() {
	// $('style').remove();
    var totalSheets = $('link[rel="stylesheet"]').length;
    if( totalSheets > 30 ) {
    	console.log( 'Total sheets loaded ' + totalSheets );
    }
}


})( jQuery );
