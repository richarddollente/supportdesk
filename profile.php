<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
        <link href="design/style.css" rel="stylesheet">
        <title>Chat Window</title>
    </head>
    <body>
        <section>
            <button class="chat-button">
                <i class="material-icons">comment</i>
            </button>
            <div class="chat-popup">
                <div class="chat-area" id="chat-area">
                    <div class="incoming-msg">
                        <span class="ai-msg">Hi welcome to SupportDesk, how can I help you?</span>
                    </div>
                </div>
                <div class="input-area">
                    <input id="user-input" type="text" placeholder="Say something..." autofocus="true"/>
                    <button class="submit"><i class="material-icons">send</i></button>
                </div>
            </div>
        </section>

        <script src="resource/chatbox.js"></script>
    </body>
</html>