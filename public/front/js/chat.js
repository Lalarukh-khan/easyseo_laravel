
const form = document.querySelector('#ajaForm')
const chatContainer = document.querySelector('#chat-area')

let loadInterval;

var first_conversation;

var coversation_count = 0;

function loader(element) {
    element.textContent = ''

    loadInterval = setInterval(() => {
        // Update the text content of the loading indicator
        element.textContent += '.';

        // If the loading indicator has reached three dots, reset it
        if (element.textContent === '....') {
            element.textContent = '';
        }
    }, 300);
}

function typeText(element, text) {
    let index = 0

    let interval = setInterval(() => {
        if (index < text.length) {
            element.innerHTML += text.charAt(index)
            index++
            chatContainer.scrollTop = chatContainer.scrollHeight;
        } else {
            clearInterval(interval)
        }
    }, 20)
}

// generate unique ID for each message div of bot
// necessary for typing text effect for that specific reply
// without unique ID, typing text will work on every element
function generateUniqueId() {
    const timestamp = Date.now();
    const randomNumber = Math.random();
    const hexadecimalString = randomNumber.toString(16);

    return `id-${timestamp}-${hexadecimalString}`;
}

function chatStripe(isAi, value, uniqueId) {
    return (
        `
        <div class="child-wrapper ${isAi ? 'ai' : 'user'}">
            <div class="chat">
                <div class="profile">
                    <img
                      src=${isAi ? bot : user}
                      alt="${isAi ? 'bot' : 'user'}"
                    />
                </div>
                <div class="message" id=${uniqueId}>${value}</div>
            </div>
        </div>
    `
    )
}


const handleSubmit = async (e) => {
    e.preventDefault()

    const data = new FormData(form)

    // user's chatstripe
    chatContainer.innerHTML += chatStripe(false, data.get('prompt'))

    // to clear the textarea input
    form.reset()

    // bot's chatstripe
    const uniqueId = generateUniqueId()
    chatContainer.innerHTML += chatStripe(true, " ", uniqueId)

    // to focus scroll to the bottom
    chatContainer.scrollTop = chatContainer.scrollHeight;

    // specific message div
    const messageDiv = document.getElementById(uniqueId)

    // messageDiv.innerHTML = "..."
    loader(messageDiv)

    const response = await fetch(apiUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            _token: token,
            prompt: data.get('prompt'),
            old_prompt: data.get('old_prompt')
        })
    })

    clearInterval(loadInterval)
    messageDiv.innerHTML = " "

    if (response.ok) {
        const data = await response.json();
        
        if (data.error !== undefined) {
            $_html = alertMessage(data.error,false);
            $('.error-msg-div').html($_html);
            return false;
        }
        const parsedData = data.bot.trim() // trims any trailing spaces/'\n'
        $('#old_prompt').val(data.old_prompt)
        typeText(messageDiv, parsedData)
    } else {
        const err = await response.text()

        messageDiv.innerHTML = "Something went wrong"
        alert(err)
    }
}

form.addEventListener('submit', handleSubmit)

form.addEventListener('keyup', (e) => {
    if (e.keyCode === 13) {
        handleSubmit(e)
    }
})


// window.onload = async function () {
//     // bot's chatstripe
//     const uniqueId = generateUniqueId()
//     chatContainer.innerHTML += chatStripe(true, " ", uniqueId)

//     // to focus scroll to the bottom
//     chatContainer.scrollTop = chatContainer.scrollHeight;

//     // specific message div
//     const messageDiv = document.getElementById(uniqueId)

//     // messageDiv.innerHTML = "..."
//     loader(messageDiv)

//     const data = new FormData(form)


//     const response = await fetch(apiUrl, {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json',
//         },
//         body: JSON.stringify({
//             _token: token,
//             prompt: 'hi',
//             firstattempt: true,
//         })
//     })

//     clearInterval(loadInterval)
//     messageDiv.innerHTML = " "

//     if (response.ok) {
//         const data = await response.json();
//         const parsedData = data.bot.trim() // trims any trailing spaces/'\n'
//         $('#old_prompt').val(data.old_prompt)
//         typeText(messageDiv, parsedData)
//     } else {
//         const err = await response.text()

//         messageDiv.innerHTML = "Something went wrong"
//         alert(err)
//     }
// };
