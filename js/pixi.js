document.addEventListener("DOMContentLoaded", function () {
  const pixiContainer = document.querySelector(".pixi_container");
  const chatbox = document.querySelector(".chatbox");
  const minimizeButton = document.querySelector(".minimize-button");
  const messageBody = document.querySelector(".chatbox-body");
  const messageSound = new Audio("assets/ting.mp3");

  let hasShownGreeting = false;
  let buttonsDisabled = false;
  let userData = {};

  function generateTicketId() {
    const min = 10000000;
    const max = 99999999;
    return "#" + Math.floor(Math.random() * (max - min + 1) + min);
  }

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
      "Please select a service:",
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

      if (currentQuestionIndex === 3) {
        const buttonContainer = document.createElement("div");
        buttonContainer.classList.add("button-container");

        const maleButton = document.createElement("button");
        maleButton.classList.add("gender-button");
        maleButton.textContent = "Male";
        buttonContainer.appendChild(maleButton);

        const femaleButton = document.createElement("button");
        femaleButton.classList.add("gender-button");
        femaleButton.textContent = "Female";
        buttonContainer.appendChild(femaleButton);

        messageBody.appendChild(buttonContainer);

        maleButton.addEventListener("click", function () {
          userData[questions[currentQuestionIndex]] = "Male";
          sendUserMessage("Male");
          currentQuestionIndex++;
          askQuestion();
        });

        femaleButton.addEventListener("click", function () {
          userData[questions[currentQuestionIndex]] = "Female";
          sendUserMessage("Female");
          currentQuestionIndex++;
          askQuestion();
        });
      } else if (currentQuestionIndex === 4) {
        const selectContainer = document.createElement("div");
        selectContainer.classList.add("select-container");

        const selectInput = document.createElement("select");
        selectInput.classList.add("message-input");
        selectInput.innerHTML = `
          <option value="">Select a service...</option>
          <option value="Service 1">Service 1</option>
          <option value="Service 2">Service 2</option>
          <option value="Service 3">Service 3</option>
        `;
        selectContainer.appendChild(selectInput);

        const sendButton = document.createElement("button");
        sendButton.classList.add("send-button");

        messageBody.appendChild(selectContainer);

        sendButton.addEventListener("click", function () {
          const selectedService = selectInput.value;
          userData[questions[currentQuestionIndex]] = selectedService;
          sendUserMessage(selectedService);
          currentQuestionIndex++;
          askQuestion();
        });

        selectInput.addEventListener("change", function () {
          const selectedValue = selectInput.value;
          const inputField = document.querySelector(".message-input");
          inputField.value = selectedValue;
        });
      } else {
        const inputContainer = document.createElement("div");
        inputContainer.classList.add("input-container");

        const inputField = document.querySelector(".message-input");

        messageBody.appendChild(inputContainer);

        const sendButton = document.createElement("button");

        sendButton.addEventListener("click", function () {
          const userInput = inputField.value;
          inputField.value = "";

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
    }

    function createTicketWithData() {
      // Generate a unique ticket ID
      const ticketId = generateTicketId();
      userData["Ticket ID"] = ticketId;

      const xhr = new XMLHttpRequest();
      xhr.open("POST", "save_ticket.php");
      xhr.setRequestHeader("Content-Type", "application/json");

      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            // Display success message with ticket ID
            const successMessage = document.createElement("div");
            successMessage.classList.add("message", "incoming");
            successMessage.innerHTML = `
              <div class="message-content">
                Ticket created successfully!<br>Ticket ID: ${ticketId}
              </div>
            `;
            messageBody.appendChild(successMessage);
            playMessageSound();
          } else {
            console.log("Error: " + xhr.status);
          }
        }
      };

      xhr.send(JSON.stringify(userData));
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
