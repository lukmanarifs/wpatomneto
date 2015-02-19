jQuery(document).ready(function($) {
	
	$('#shortcode-select').change(function() {
        var shortcode_id = $('#shortcode-select').val();
		$('.shortcodes-element').removeClass('show');
		$('#shortcodes-element-'+shortcode_id).addClass('show');
		init();
    });
	
	$('.shortcodes-child-add').click(function() {
		var items = $(this).parent().children('.shortcodes-child-element');
		var element = $('<div class="shortcodes-child-element"><button class="btn btn-danger shortcodes-child-del"><i class="fa fa-times"></i></button>' + $(items[0]).html() + '</div>');
		removeChildElement($(element).find('.shortcodes-child-del'));
       $(this).parent().append(element);
	   $($(element).find('.color')).each(function(index, element) {
        	new jscolor.color(element);
    	});

    });
	
	function removeChildElement(element){
		$(element).click(function() {
			$(this).parent().remove();
		});
	}
});



function init() {
    tinyMCEPopup.resizeToInnerSize();
}

function insertatomcoreshortcode() {
    var tagtext;
	
    var shortcode_id = jQuery('#shortcode-select').val();
	var shortcode = '';
	var shortcode_name = '';
	var shortcode_end = true;
	var shortcode_content = '';
	
	if(shortcode_id != '0'){
		shortcode_name = jQuery('#shortcodes-element-'+shortcode_id).attr('data-shortcode');
		shortcode = '['+ shortcode_name;

		var items = jQuery('#shortcodes-element-'+shortcode_id).children('.atomcore-table-tr');
		
		for(var i=0;i<items.length;i++){
			
			if(jQuery(items[i]).attr('data-type') == 'input' && jQuery(items[i]).find('input').val() !== ""){
				shortcode += ' ' +jQuery(items[i]).attr('data-key') + '="' + jQuery(items[i]).find('input').val() + '"';
			}else if(jQuery(items[i]).attr('data-type') == 'select' && jQuery(items[i]).find('.atomcore-select').val() !='none' && jQuery(items[i]).find('.atomcore-select').val() !='default'){
				shortcode += ' ' +jQuery(items[i]).attr('data-key') + '="' + jQuery(items[i]).find('.atomcore-select').val() + '"';
			}else if(jQuery(items[i]).attr('data-type') == 'color' && jQuery(items[i]).find('.atomcore-color-picker').val() !=''){
				shortcode += ' ' +jQuery(items[i]).attr('data-key') + '="#' + jQuery(items[i]).find('.atomcore-color-picker').val() + '"';
			}else if(jQuery(items[i]).attr('data-type') == 'textarea'){
				shortcode_end = false;
				shortcode_content = jQuery(items[i]).find('.atomcore-textarea').val();
			}
		}
		
		shortcode += ']';
		
		var childs = jQuery('#shortcodes-element-'+shortcode_id).children('.shortcodes-child');
		if(childs.length > 0){
			shortcode_end = false;
			for(var j=0;j<childs.length;j++){
				var child_shortcode = jQuery(childs[j]).attr('data-shortcode');
				var child_items = jQuery(childs[j]).children('.shortcodes-child-element');
				for(var k=0;k<child_items.length;k++){
					shortcode += getShortcodeContent(jQuery(child_items[k]), child_shortcode);
				}
				
			}
		}
		
		if(!shortcode_end){
			if(shortcode_content != ''){
				shortcode += shortcode_content;
			}
			shortcode += '[/' + shortcode_name + ']';
		}
	}


    if (window.tinyMCE) {
		if (typeof(window.tinyMCE.execInstanceCommand) === "function") { 
       		window.tinyMCE.execInstanceCommand(window.tinyMCE.activeEditor.id, 'mceInsertContent', false, shortcode);
		}else{
			window.tinyMCE.get(window.tinyMCE.activeEditor.id).insertContent(shortcode);
		}
		
        //Peforms a clean up of the current editor HTML.
        //tinyMCEPopup.editor.execCommand('mceCleanup');
        //Repaints the editor. Sometimes the browser has graphic glitches.
        tinyMCEPopup.editor.execCommand('mceRepaint');
        tinyMCEPopup.close();
    }
    return;
}

function getShortcodeContent(target,shortcode_name){
	var shortcode_end = true;
	var shortcode_content = '';
	var shortcode = '['+ shortcode_name;

	var items = jQuery(target).children('.atomcore-table-tr');

	for(var i=0;i<items.length;i++){
		
		if(jQuery(items[i]).attr('data-type') == 'input' && jQuery(items[i]).find('input').val() !== ""){
			shortcode += ' ' +jQuery(items[i]).attr('data-key') + '="' + jQuery(items[i]).find('input').val() + '"';
		}else if(jQuery(items[i]).attr('data-type') == 'select' && jQuery(items[i]).find('.atomcore-select').val() !='none' && jQuery(items[i]).find('.atomcore-select').val() !='default'){
			shortcode += ' ' +jQuery(items[i]).attr('data-key') + '="' + jQuery(items[i]).find('.atomcore-select').val() + '"';
		}else if(jQuery(items[i]).attr('data-type') == 'color' && jQuery(items[i]).find('.atomcore-color-picker').val() !=''){
			shortcode += ' ' +jQuery(items[i]).attr('data-key') + '="#' + jQuery(items[i]).find('.atomcore-color-picker').val() + '"';
		}else if(jQuery(items[i]).attr('data-type') == 'textarea'){
			shortcode_end = false;
			shortcode_content = jQuery(items[i]).find('.atomcore-textarea').val();
		}
	}
	
	shortcode += ']';
	
	if(!shortcode_end){
		shortcode += shortcode_content;
		shortcode += '[/' + shortcode_name + ']';
	}
	return shortcode;
}



