const chatPopup = document.querySelector('.chat-popup');
const chatButton = document.querySelector('.chat-button');
const submitButton = document.querySelector('.chat-submit');
const chatArea = document.querySelector('.chat-area');
const inputField = document.querySelector('.chat-input');

//Chat box toggler

chatButton.addEventListener('click', () => {
    chatPopup.classList.toggle('show');
    inputField.value = '';
})

//Send message
submitButton.addEventListener('click', () => {
    messageHandler();
});

document.addEventListener("DOMContentLoaded", () => {
    const inputField = document.getElementById("user-input");
    inputField.addEventListener("keydown", (e) => {
        if (e.code === "Enter") {
            messageHandler();
        }
    });
});


function messageHandler(){
    let userInput = inputField.value;
    let userOutMessage = inputField.value;
    messageOutput(userInput, userOutMessage);
    inputField.value = '';    
}

function messageOutput(userInput, userOutMessage) {
    let optionalReply;

    let inputText = userInput.toLowerCase().replace(/[^\w\s]/gi, "").replace(/[\d]/gi, "").trim();
    inputText = inputText
        .replace(/ a /g, " ")   // 'tell me a story' -> 'tell me story'
        .replace(/i feel /g, "")
        .replace(/whats/g, "what is")
        .replace(/please /g, "")
        .replace(/ please/g, "")
        .replace(/r u/g, "are you");

    if (textCompare(prompts, replies, inputText)){
        optionalReply = textCompare(prompts, replies, inputText);
    }
    else if (inputText.match(/thank/gi)){
        optionalReply = "You're welcome!";
    }
    else{
        optionalReply = alternative[Math.floor(Math.random() * alternative.length)];
    }

    addChat(userOutMessage, optionalReply);
}

function textCompare(promptsArray, repliesArray, string){
    let aiReply;
    let replyFound = false;
    for(let a = 0; a < promptsArray.length; a++){
        for(let b = 0; b < promptsArray[a].length; b++){
            if(promptsArray[a][b] === string){
                let aiReplies = repliesArray[a];
                aiReply = aiReplies[Math.floor(Math.random() * aiReplies.length)];
                replyFound = true;
                break;
            }
        }
        if(replyFound){
            break;
        }
    } 
    return aiReply;
}

function addChat(userOutMessage, optionalReply){
    let userDiv = document.createElement("div");
    userDiv.id = "outgoing-msg";
    userDiv.className = "outgoing-msg";
    userDiv.innerHTML = `<span class="user-msg">${userOutMessage}</span>`;
    chatArea.appendChild(userDiv);

    let aiDiv = document.createElement("div");
    let aiText = document.createElement("span");
    aiDiv.className = "incoming-msg";
    aiDiv.id = "incoming-msg";
    aiText.className = "ai-msg";
    aiText.innerText = "Typing...";
    aiDiv.appendChild(aiText);
    chatArea.appendChild(aiDiv);
    chatArea.scrollTop = chatArea.scrollHeight - chatArea.clientHeight;

    setTimeout(() => {
        aiText.innerText = `${optionalReply}`;
    }, 2000
    )
}

const prompts = [
    ["network"],
    ["lan network"],
    ["mobile"],
    ["application"],
    ["hardware"],
    ["still not working", "not working"],
    ["its working", "working", "all good"],
    ["hello","hi", "good morning", "good afternoon", "good evening"]
]
  
  // Possible responses, in corresponding order
  
  const replies = [
    ["Are you using LAN Network or Mobile?"],
    [
      "For LAN network, try restarting the router by unplugging it from the power source for 10 seconds. If the issue isn't resolve, try submitting a ticket for further assistance."
    ],
    [
      "For mobile, try turning Airplane Mode ON and OFF, or restart your phone. If the issue isn't resolve, try submitting a ticket for further assistance."
    ],
    ["If you are having problem with an application, try restarting the device, or uninstalling and reinstalling the application could help. If the issue isn't resolve, try submitting a ticket for further assistance."],
    ["On hardware issues, restart the device. If the issue isn't resolve, try submitting a ticket for further assistance"],
    ["We apologize for the inconvenience. If the issue isn't resolve, try submitting a ticket for further assistance"],
    ["I am happy that I could help.", "That is good to hear!", "I am glad that I could help!", "That is wonderful news!"],
    ["Hi, please type 'network', 'application', or 'hardware' for help!"]
]
  
  // Random for any other user input
  
  const alternative = [
    "I don't understand. Try typing 'network', 'application', or 'hardware' for help!",
    "Sorry, let's try again. Try typing 'network', 'application', or 'hardware' for help!"
]
