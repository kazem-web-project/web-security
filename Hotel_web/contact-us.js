    document.addEventListener("DOMContentLoaded", function () {
        const chatBox = document.getElementById("chat-box");
        const chatInput = document.getElementById("chat-input");
        const sendBtn = document.querySelector("button.btn-primary");
        const invoiceBtn = document.querySelector("button.btn-secondary");

        function addMessage(content, sender = "user") {
            const messageWrapper = document.createElement("div");
            messageWrapper.classList.add("mb-3");
            const time = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

            
            if (sender === "user") {
                messageWrapper.classList.add("text-end");
                messageWrapper.innerHTML = `
                    <div class="text-muted small">${time}</div>
                    <div class="p-2 bg-primary text-white rounded d-inline-block">${content}</div>
                `;
            } else {
                messageWrapper.innerHTML = `
                    <div class="text-muted small">${time}</div>
                    <div class="p-2 bg-light rounded d-inline-block">${content}</div>
                `;
            }

            chatBox.appendChild(messageWrapper);

            
            const scripts = messageWrapper.querySelectorAll("script");
            scripts.forEach(oldScript => {
                const newScript = document.createElement("script");
                if (oldScript.src) {
                    newScript.src = oldScript.src;
                } else {
                    newScript.textContent = oldScript.textContent;
                }
                document.body.appendChild(newScript); 
                oldScript.remove();
            });

            chatBox.scrollTop = chatBox.scrollHeight;
        }

        function handleSend(type) {
            const input = chatInput.value.trim();
            if (input === "" && type !== "invoice") return;

            if (type === "invoice") {
                addMessage("Please send me an invoice.", "user");
                simulateBotReply("Sure! An invoice has been sent to your registered email.");
            } else {
                addMessage(input, "user");
                simulateBotReply("Thank you for your message. We'll get back to you shortly.");
            }

            chatInput.value = "";
        }

        function simulateBotReply(response) {
            setTimeout(() => {
                addMessage(response, "bot");
            }, 1000);
        }

        sendBtn.addEventListener("click", () => handleSend("send"));
        // invoiceBtn.addEventListener("click", () => handleSend("invoice"));

        chatInput.addEventListener("keypress", function (e) {
            if (e.key === "Enter") {
                e.preventDefault();
                handleSend("send");
            }
        });
    });
