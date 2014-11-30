$('.panel-body-chat').scrollTop($('.panel-body-chat')[0].scrollHeight);
/*
* Updates automatically the content of the Chat every 5 seconds
*/
setInterval(function(){
 	var chat    = $('#chat-body');
  	var chat_id = $('#chat_id');

	$.ajax({
		url: chat.attr("data-ajax-new"),
		type: 'GET',
		data:{
			chat_id: chat_id.val(),
			last_timestamp: chat.data("last-timestamp") 
		}
	})
	.done(function(data) {
		renderNewMessage(data);
	})
	.fail(function() {
		//console.log("error");
	})
	.always(function() {
		//console.log("complete");
	});
},2000);

function renderNewMessage(data) {
	messages      = data.messages;
	$chat         = $('#chat-body');
	$lastMessages = $('.chat');

	html  =  "<li class='left clearfix message'><span class='chat-img pull-left'>"
    html2 =  "<img src='http://ymcawellington.org.nz/wp-content/uploads/2013/07/person-placeholder-36x36.jpg' alt='User Avatar' class='img-circle' />"
    html3 =  "</span><div class='chat-body clearfix'><div class='header'><strong class='primary-font'>"
    html5 =  "</strong></div><p>"
    html7 =  "</p></div></li>"
    // html4 =  nombre 
    // html6 =  texto
                        

	for (index = 0; index < messages.length; ++index) {
		//console.log(messages[index]);
		html4 = messages[index].username;
		html6 = messages[index].text;
		allHtml = html+html2+html3+html4+html5+html6+html7;

		$lastMessages.append(allHtml);
		$chat.data("last-timestamp",messages[index].sent_date);
		$('.panel-body-chat').scrollTop($('.panel-body-chat')[0].scrollHeight);
	}
}
/*
* Send Messages 
*/
$("#btn-chat-sent").click(function(){
  	var chat     = $('#chat-body');
  	var chat_id  = $('#chat_id');
  	var username = $('#username');
  	var text     = $('#text');

	$.ajax({
		url: chat.attr("data-ajax"),
		type: 'POST',
		data:{
			chat_id:   chat_id.val(),
			username:  username.val(),
			text:      text.val()
		}
	})
	.done(function(data) {
		$("#text").val("");
	})
	.fail(function() {
		//console.log("error");
	})
	.always(function() {
		//console.log("complete");
	});
});