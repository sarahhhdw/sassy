<html>
<head>
	<title> CHAT ROOM</title>
</head>
<body>

<a id="chat-link">Go to chatroom</a>



<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="jquery.cookie.js"></script>

<script>
	var userID = "<?php echo uniqid(); ?>";
	
	$.cookie("user_id", userID);

	$('#chat-link').click(function() {
		// TODO: Some kind of stalling function so that it doesn't send you to a chatroom by yourself.
		$.ajax({
		    type: 'GET',
		    url: 'getroom.php',
		    success: function(room){
			if (room == '') { // No chatroom exists
				var chatroomID = "<?php echo uniqid('chat_'); ?>";
				var link = 'chat.php?id=' + chatroomID;
				$.ajax({
				    type: 'POST',
				    url: 'writeroom.php',
				    data: { 
					'chatroom_id': chatroomID
				    },
				    success: function(msg){
					window.location = link;
				    }
				});
			} else { // chatroom exists already
				var link = 'chat.php?id=' + room;
				window.location = link;
			}
		    }
		});
	});

</script>
</body>
</html>
