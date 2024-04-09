function sendMessage() {
    var message = document.getElementById("message").value;
    $.post("chat.php", {message: message});
    document.getElementById("message").value = "";
}

function fetchMessages() {
    $.get("chat.php", function(data) {
        var messages = JSON.parse(data);
        var chatBox = document.getElementById("chat-box");
        chatBox.innerHTML = "";
        messages.forEach(function(msg) {
            chatBox.innerHTML += "<p>" + msg + "</p>";
        });
    });
}

// Fetch messages every 1 second
setInterval(fetchMessages, 1000);
