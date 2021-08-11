const chatPopup = document.querySelector('.chat-popup');
const chatButton = document.querySelector('.chat-button');
const submitButton = document.querySelector('.submit');
const chatArea = document.querySelector('.chat-area');
const inputField = document.querySelector('input');

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
    

    let userDiv = document.createElement("div");
    userDiv.id = "outgoing-msg";
    userDiv.className = "outgoing-msg";
    userDiv.innerHTML = `<span class="user-msg">${userInput}</span>`;
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
    inputField.value = '';
    
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

const prompts = [
    ["hi", "hey", "hello", "good morning", "good afternoon"],
    ["how are you", "how is life", "how are things"],
    ["what are you doing", "what is going on", "what is up"],
    ["how old are you"],
    ["who are you", "are you human", "are you bot", "are you human or bot"],
    ["who created you", "who made you"],
    [
      "your name please",
      "your name",
      "may i know your name",
      "what is your name",
      "what call yourself"
    ],
    ["i love you"],
    ["happy", "good", "fun", "wonderful", "fantastic", "cool"],
    ["bad", "bored", "tired"],
    ["help me", "tell me story", "tell me joke"],
    ["ah", "yes", "ok", "okay", "nice"],
    ["bye", "good bye", "goodbye", "see you later"],
    ["what should i eat today"],
    ["bro"],
    ["what", "why", "how", "where", "when"],
    ["no","not sure","maybe","no thanks"],
    [""],
    ["haha","ha","lol","hehe","funny","joke"]
  ]
  
  // Possible responses, in corresponding order
  
  const replies = [
    ["Hello!", "Hi!", "Hey!", "Hi there!","Howdy"],
    [
      "Fine... how are you?",
      "Pretty well, how are you?",
      "Fantastic, how are you?"
    ],
    [
      "Nothing much",
      "About to go to sleep",
      "Can you guess?",
      "I don't know actually"
    ],
    ["I am infinite"],
    ["I am just a bot", "I am a bot. What are you?"],
    ["The one true God, JavaScript"],
    ["I am nameless", "I don't have a name"],
    ["I love you too", "Me too"],
    ["Have you ever felt bad?", "Glad to hear it"],
    ["Why?", "Why? You shouldn't!", "Try watching TV"],
    ["What about?", "Once upon a time..."],
    ["Tell me a story", "Tell me a joke", "Tell me about yourself"],
    ["Bye", "Goodbye", "See you later"],
    ["Sushi", "Pizza"],
    ["Bro!"],
    ["Great question"],
    ["That's ok","I understand","What do you want to talk about?"],
    ["Please say something :("],
    ["Haha!","Good one!"]
  ]
  
  // Random for any other user input
  
  const alternative = [
    "Same",
    "Go on...",
    "Bro...",
    "Try again",
    "I'm listening...",
    "I don't understand :/"
  ]
