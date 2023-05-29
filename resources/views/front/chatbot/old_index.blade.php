@extends('layouts.front')
@section('after-css')
<style>
    .chat-content {
        margin-left: 0px;
        padding: 15px 15px 15px 15px;
        height: 450px;
    }

    .chat-footer {
        position: absolute;
        height: 70px;
        left: 0px;
        padding: 15px;
        background: #f8f9fa;
        border-top: 1px solid rgba(0, 0, 0, .125);
        border-bottom-right-radius: 0.25rem;
    }
    .chat-wrapper{
        height: 500px;
    }
</style>
@endsection
@section('content')
<div class="chat-wrapper">
    <div class="chat-content" id="chat-area">
    </div>
    <form id="ajaForm">
        <div class="chat-footer d-flex align-items-center">

            <div class="input-group">

                <input type="text" class="form-control" placeholder="Type a message" name="prompt" id="prompt" required>
                <button type="submit" class="btn btn-info" id="submit-btn">
                    <i class="fadeIn animated bx bx-right-arrow-alt"></i></button>
            </div>

        </div>
    </form>

    <!--start chat overlay-->
    <div class="overlay chat-toggle-btn-mobile"></div>
    <!--end chat overlay-->
</div>
@endsection
@section('page-scripts')
<script>
    new PerfectScrollbar('.chat-content');
</script>
<script>
    // $('#ajaForm').submit(function (e) {
    //     e.preventDefault();
    //     var url = $(this).attr('action');
    //     var param = new FormData(this);
    //     my_ajax(url, param, 'post', function(res) {

    //     },true);
    // });
</script>
<script>
    const submitBtn = $('#submit-btn');
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.querySelector('#ajaForm');
        form.addEventListener('submit', event => {
            event.preventDefault();
            submitBtn.prop('disabled',true);
            submitBtn.attr('disabled',true);
            submitBtn.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
            const messageInput = document.getElementById('prompt');
            const message = messageInput.value.trim();
            if (message !== '') {
                displayMessage(message, 'Human');
                sendMessage(message);
            }else{
                submitBtn.prop('disabled',false);
                submitBtn.attr('disabled',false);
                submitBtn.html('<i class="fadeIn animated bx bx-right-arrow-alt"></i>');
            }
            messageInput.value = '';

            $('#chat-area').scrollTop($('#chat-area')[0].scrollHeight);
        });
    });


    function sendMessage(message) {
        const apiKey = "{{ $key }}";
        const prompt = `Human: ${message}\nAI: `;
        let pop = {
            "prompt": prompt,
            "temperature": 0.9,
            "max_tokens": 150,
            "top_p": 1,
            "frequency_penalty": 0.0,
            "presence_penalty": 0.6,
            "stop": [" Human:", " AI:"],
        };

        $.ajax({
            url: "https://api.openai.com/v1/engines/text-davinci-003/completions",
            method: "POST",
            contentType: "application/json",
            beforeSend: function (xhr) {
                xhr.setRequestHeader("Authorization", `Bearer ${apiKey}`)
            },
            data: JSON.stringify(pop),
            success: function (x) {
                // console.log(x);
                const text = x.choices[0].text.trim();
                displayMessage(text, 'AI');

                submitBtn.prop('disabled',false);
                submitBtn.attr('disabled',false);
                submitBtn.html('<i class="fadeIn animated bx bx-right-arrow-alt"></i>');
            }
        });
    }

    function displayMessage(message, sender) {
        const chatArea = document.getElementById('chat-area');

        var dt = new Date();
        var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
        let html;
        if (sender == 'Human') {
            html = `<div class="chat-content-rightside">
                        <div class="d-flex ms-auto">
                            <div class="flex-grow-1 me-2">
                                <p class="mb-0 chat-time text-end">YOU, ${time}</p>
                                <p class="chat-right-msg">${message}</p>
                            </div>
                        </div>
                    </div>`;
        }else{
            html = `<div class="chat-content-leftside">
                        <div class="d-flex">
                            <div class="flex-grow-1 ms-2">
                                <p class="mb-0 chat-time">AI, ${time}</p>
                                <p class="chat-left-msg">${message}</p>
                            </div>
                        </div>
                    </div>`;
        }

        $(chatArea).append(html);
    }

</script>
@endsection
