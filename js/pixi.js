document.addEventListener("DOMContentLoaded", function () {
  const pixiContainer = document.querySelector(".pixi_container");
  const chatbox = document.querySelector(".chatbox");
  const minimizeButton = document.querySelector(".minimize-button");
  const messageBody = document.querySelector(".chatbox-body");
  const messageSound = new Audio("assets/ting.mp3"); // Replace with the actual path to your sound file

  let hasShownGreeting = false;
  let buttonsDisabled = false;
  let userData = {};

  function greetUser() {
    if (!hasShownGreeting) {
      const greetingMessage = document.createElement("div");
      greetingMessage.classList.add("message", "incoming");
      greetingMessage.innerHTML = `
                    <div class="message-content">
                        Hello, how can I assist you?
                    </div>
                    <div class="message-buttons">
                        <button class="create-ticket-button chat_btn">Create Ticket</button>
                        <button class="track-ticket-button chat_btn">Track Ticket</button>
                    </div>
                `;
      messageBody.appendChild(greetingMessage);
      playMessageSound();
      hasShownGreeting = true;

      const buttons = document.querySelectorAll(".chat_btn");
      buttons.forEach((button) => {
        button.addEventListener("click", handleButtonClick);
      });
    }
  }

  function playMessageSound() {
    messageSound.play();
  }

  function sendUserMessage(message) {
    const outgoingMessage = document.createElement("div");
    outgoingMessage.classList.add("message", "outgoing");
    outgoingMessage.innerHTML = `
                <div class="message-content">
                    ${message}
                </div>
            `;
    messageBody.appendChild(outgoingMessage);
    playMessageSound();
    disableButtons();
  }

  function disableButtons() {
    const buttons = document.querySelectorAll(".chat_btn");
    buttons.forEach((button) => {
      button.disabled = true;
    });
    buttonsDisabled = true;
  }

  function handleButtonClick(event) {
    if (!buttonsDisabled) {
      const buttonText = event.target.textContent;
      sendUserMessage(buttonText);
    }
  }

  function createTicket() {
    const questions = [
      "Please enter your name:",
      "Please enter your email:",
      "Please enter your phone number:",
      "Please enter your gender:",
      "Please enter the service type:",
    ];
    let currentQuestionIndex = 0;

    function askQuestion() {
      const questionMessage = document.createElement("div");
      questionMessage.classList.add("message", "incoming");
      questionMessage.innerHTML = `
            <div class="message-content">
                ${questions[currentQuestionIndex]}
            </div>
          `;
      messageBody.appendChild(questionMessage);
      playMessageSound();
      disableButtons();
    }

    function createTicketWithData() {
      // Create ticket using the collected data
      // Replace the following console.log statement with your actual ticket creation logic
      console.log("Ticket created with data:", userData);

      // Display success message
      const successMessage = document.createElement("div");
      successMessage.classList.add("message", "incoming");
      successMessage.innerHTML = `
            <div class="message-content">
              Ticket created successfully!
            </div>
          `;
      messageBody.appendChild(successMessage);
      playMessageSound();
    }

    const createTicketButton = document.querySelector(".create-ticket-button");
    createTicketButton.addEventListener("click", function () {
      askQuestion();
    });

    const sendButton = document.querySelector(".send-button");
    sendButton.addEventListener("click", function () {
      const userInput = document.querySelector(".message-input").value;
      document.querySelector(".message-input").value = "";

      if (userInput.trim() !== "") {
        userData[questions[currentQuestionIndex]] = userInput;

        const userResponseMessage = document.createElement("div");
        userResponseMessage.classList.add("message", "outgoing");
        userResponseMessage.innerHTML = `
                <div class="message-content outgoing">
                  ${userInput}
                </div>
              `;
        messageBody.appendChild(userResponseMessage);
        playMessageSound();

        currentQuestionIndex++;
        if (currentQuestionIndex < questions.length) {
          askQuestion();
        } else {
          createTicketWithData();
        }
      }
    });
  }

  pixiContainer.addEventListener("click", function () {
    chatbox.classList.toggle("opened");
    pixiContainer.classList.toggle("hidden");
    greetUser();
  });

  minimizeButton.addEventListener("click", function () {
    chatbox.classList.remove("opened");
    pixiContainer.classList.remove("hidden");
  });

  greetUser();
  createTicket();
});
