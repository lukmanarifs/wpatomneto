// Description: ATOM with wordpress ajax nonce
"use strict";
jQuery(document).ready(function($) {
	$(".likecountbox a").click(function(){
		var heart = jQuery(this);
		var post_id = heart.data("post_id");
		$('.post-like-waitting').remove();
		$('body').append('<div class="post-like-waitting"><i class="fa fa-spinner fa-spin fa-large"></i></div>');
		$.ajax({
			type: "post",
			url: ajax_var.url,
			data: "action=post-like&nonce="+ajax_var.nonce+"&post_like=&post_id="+post_id,
			success: function(count){
				if(count !== "already"){
					heart.parent().prepend('<span><i class=" fa fa-heart"></i></span>');
					heart.parent().find('.count').text(count);
					heart.remove();
				}else{
					alert('You already had rate it!');
				}
				$('.post-like-waitting').remove();
			}
		});
		return false;
	});
});