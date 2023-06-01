@extends('layouts.front')
@section('after-css')
@endsection
@section('content')
@include('components.flash-message')

<div class="container">
	<div class="row">
		<!-- <div class="col-lg-4 col-md-4 col-sm-12 col-12">
			<div class="card radius-10">
				<div class="card-body">
					<h3 class="edtrtrgtrp">Target Keyword Report</h3>
					<p class="edtrp">Type in the primary keyword the content needs to rank for, and get SEO score and AI recommendations based on:</p>
					<ul>
						<li class="edtrp">Semantic Keywords</li>
						<li class="edtrp">Search Intents</li>
						<li class="edtrp">Title and heading recommendations</li>
						<li class="edtrp">Word count target</li>
					</ul>
					<div style="text-align: center;">
						<input type="text" placeholder="Enter Target Keyword..." class="edtrinp" autocomplete="off">
						<button class="edtrrptbtn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Create report</button>
					</div>
					<p class="text-center">Use 1 audit credit to generate</p>
				</div>
			</div>
		</div> -->
		<div class="col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="card radius-10" style="height: 450px;">
				<div class="card-body">
					<div id="resultkeywords"></div>
				</div>
			</div>
		</div>
	</div>
</div>
  <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
	  	<h3 class="edtrtrgtrp">Target Keyword Report</h3>
		<p class="edtrp">Type in the primary keyword the content needs to rank for, and get SEO score and AI recommendations based on:</p>
		<ul>
			<li class="edtrp">Semantic Keywords</li>
			<li class="edtrp">Search Intents</li>
			<li class="edtrp">Title and heading recommendations</li>
			<li class="edtrp">Word count target</li>
		</ul>
		<form id="ajaForm">
			<div style="text-align: center;">
				<input type="text" placeholder="Enter Target Keyword..." class="edtrinp" name="prompt" autocomplete="off" class="form-control" required>
				<button class="edtrrptbtn" type="submit" id="hidemodal">Create report</button>
			</div>
			<p class="text-center">Use 1 audit credit to generate</p>
		</form>
      </div> 
    </div>
  </div>
</div>
@endsection
@section('page-scripts')
<script>
    $(window).on('load', function() {
        $('#exampleModalCenter').modal('show');
    });
	const newform = document.getElementById("ajaForm");
	newform.addEventListener("submit", submitForm);
	const modal = document.getElementById("exampleModalCenter");
	function closeModal() {
		modal.style.display = "none";
	}
	function submitForm(event) {
		event.preventDefault();
		// $('#exampleModalCenter').hide();
		$('#exampleModalCenter').modal("hide")
	}
	// $('#hidemodal').submit(function(e) {
	// 	$('#hidemodal').attr("data-bs-dismiss","modal");
	// });
	// const impscore = document.querySelector('#hidemodal');
	// impscore.addEventListener('click', function() {
    // $('#exampleModalCenter').hide();
	// });

</script>
<script>
    var apiUrl = "{{ route('user.editor.ai_response') }}";
    const token = "{{ csrf_token() }}"

    const form = document.querySelector('#ajaForm')
    const chatContainer = document.querySelector('#resultkeywords')

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
    function generateUniqueId() {
        const timestamp = Date.now();
        const randomNumber = Math.random();
        const hexadecimalString = randomNumber.toString(16);

        return `id-${timestamp}-${hexadecimalString}`;
    }

    function chatStripe(isAi, value, uniqueId) {
        return (
            `<div class="message" id=${uniqueId}>${value}</div>`
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
                prompt: 'write 9 questions and 21 semantic keywords about ' + data.get('prompt'),
                old_prompt: data.get('old_prompt')
            })
        })

        clearInterval(loadInterval)
        messageDiv.innerHTML = " "

        if (response.ok) {
            const data = await response.json();
            const parsedData = data.bot.trim() // trims any trailing spaces/'\n'
            $('#old_prompt').val(data.old_prompt)
            // const div = document.getElementById(newval);
            const content = String(parsedData);
			const startWord1 = "1.";
			const endWord1 = "9.";
			const startWord2 = "1.";
			const endWord2 = "21.";
            const startIndex1 = content.indexOf(startWord1);
			const endIndex1 = content.indexOf(endWord1, startIndex1 + startWord1.length);

			const startIndex2 = content.indexOf(startWord2, endIndex1);
			const endIndex2 = content.indexOf(endWord2, startIndex2 + startWord2.length);

			if (
				startIndex1 !== -1 &&
				endIndex1 !== -1 &&
				startIndex2 !== -1 &&
				endIndex2 !== -1 &&
				startIndex1 < endIndex1 &&
				endIndex1 < startIndex2 &&
				startIndex2 < endIndex2
			) {
				const trimmedContent1 = content.substring(startIndex1, endIndex1);
				const trimmedContent2 = content.substring(startIndex2, endIndex2);
				const final_text = trimmedContent1 + trimmedContent2;
				typeText(messageDiv, final_text);
			}
            // if (index !== -1) {
            // 	const trimmedContent = content.substring(index);
            // 		typeText(messageDiv, trimmedContent)
            // 	// div.innerHTML = trimmedContent;
            // }
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
</script>
@endsection
