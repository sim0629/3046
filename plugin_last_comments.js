plugin_last_comments_update = function(arg, callback){
	$.ajax({
		type: 'POST',
		url: resolvedRootPath + 'Comment/List.aspx',
		data: 'parent_uid=' + commentScriptInformation.parentUid + '&ajax=true&' + arg,
		dataType: 'xml',
		success: function(xml){
			$('div#Comment div.CommentList ul.Comment').html('');
			addProcess(xml);
			callback();
		}
	});
};

$(document).ready(function(){
	plugin_last_comments_update('tail=true', function(){
		$('div#CommentMoreLink').append(
			$('<a></a>').attr('href', '#')
			.html('Show old comments')
			.click(function(){
				plugin_last_comments_update('comment_page=1', function(){});
			})
		);
	});
});
