<?php
session_start();
$myid = $_SESSION['id_num'];
$recieverid = $_GET['reciever'];
include_once '../Class/User.php';
$u = new User();
$chat = $u->chatprofile($recieverid);
while($row = $chat->fetch_assoc()){
    $chatpic = '../images/'.$row['profile_image'];
    $fullname = $row['first_name'].' '. $row['last_name'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .chat-container {
            display: flex;
            flex-direction: column;
            height: 90vh;
            width: 500px;
            background-color: #fff;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .chat-header {
            background-color: #007bff;
            color: #fff;
            padding: 15px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            border-bottom: 2px solid #0056b3;
            position: relative;
        }
        .chat-box {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
        }
        .chat-message {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 80%;
            word-wrap: break-word;
            position: relative;
            font-size: 16px;
            line-height: 1.5;
        }
        .chat-message.sender {
            align-self: flex-end;
            background-color: #dcf8c6;
            text-align: right;
        }
        .chat-message.receiver {
            align-self: flex-start;
            background-color: #e2e2e2;
            text-align: left;
        }
        .chat-message .timestamp {
            font-size: 0.75em;
            color: #888;
            margin-top: 10px;
            display: block;
        }
        .chat-input-container {
            display: flex;
            padding: 15px;
            background-color: #fff;
            border-top: 2px solid #ccc;
        }
        .chat-input-container textarea {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
            resize: none;
            margin-right: 15px;
            height: 50px;
            box-sizing: border-box;
            font-size: 16px;
        }
        .chat-input-container button {
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
        }
        .chat-input-container button:hover {
            background-color: #0056b3;
        }
        img{
            position: absolute;
            left: 10px;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <div class="chat-header"><img src="<?= $chatpic;?>" alt="" width="40px" height="40px"><span><?=$fullname?></span></div>
        <div class="chat-box" id="chat-box"></div>
        <div class="chat-input-container">
            <textarea id="message" rows="1" placeholder="Type a message"></textarea>
            <button onclick="sendMessage()">Send</button>
        </div>
    </div>

    <input type="hidden" id="sender_id" value="<?=$myid?>">
    <input type="hidden" id="receiver_id" value="<?=$recieverid?>">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function loadMessages() {
            const sender_id = $('#sender_id').val();
            const receiver_id = $('#receiver_id').val();

            $.get('get_messages.php', { sender_id, receiver_id }, function(data) {
                const messages = JSON.parse(data);
                $('#chat-box').empty();
                messages.forEach(message => {
                    const className = message.sender_id == sender_id ? 'sender' : 'receiver';
                    const timestamp = new Date(message.timestamp).toLocaleString();
                    $('#chat-box').append(`
                        <div class="chat-message ${className}">
                            ${message.message}
                            <span class="timestamp">${timestamp}</span>
                        </div>
                    `);
                });
                $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);
            });
        }

        function sendMessage() {
            const sender_id = $('#sender_id').val();
            const receiver_id = $('#receiver_id').val();
            const message = $('#message').val();

            $.post('send_message.php', { sender_id, receiver_id, message }, function() {
                $('#message').val('');
                loadMessages();
            });
        }

        $(document).ready(function() {
            loadMessages();
            setInterval(loadMessages, 2000); // Refresh messages every 2 seconds

            $('#message').on('keypress', function (e) {
                if (e.which == 13 && !e.shiftKey) {
                    e.preventDefault();
                    sendMessage();
                }
            });
        });
    </script>
</body>
</html>
