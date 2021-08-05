const chatPopup = document.querySelector('.chat-popup');
const chatButton = document.querySelector('.chat-button');
const submitButton = document.querySelector('.submit');
const chatArea = document.querySelector('.chat-area');
const inputElement = document.querySelector('input');

//Chat box toggler

chatButton.addEventListener('click', () => {
    chatPopup.classList.toggle('show');
})

//Send message
submitButton.addEventListener('click', () => {
    let userInput = inputElement.value;
    console.log(userInput);      
    let temp = `<div class="outgoing-msg"><span class="user-msg">${userInput}</span></div>`;
    console.log(temp);
    chatArea.insertAdjacentHTML("beforeend", temp);
    inputElement.value = '';
});