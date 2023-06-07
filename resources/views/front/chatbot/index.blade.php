@extends('layouts.front')
@section('after-css')
<style>
    .chat-content {
        margin-left: 0px;
        padding: 15px 15px 15px 15px;
        /* height: 450px; */
    }

    .chat-footer {
        position: absolute;
        height: 70px;
        left: 0px;
        padding: 15px;
        /* background: #f8f9fa; */
        background: transparent;
        /* border-top: 1px solid rgba(0, 0, 0, .125); */
        border-bottom-right-radius: 0.25rem;
    }

    .chat-wrapper {
        height: 470px;
    }

    .child-wrapper {
        width: 100%;
        padding: 5px;
    }

    .ai {
        /* background: #40414F; */
        background: transparent;
    }

    .chat {
        width: 100%;
        max-width: 100%;
        margin: 0 auto;
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        gap: 10px;
    }

    .profile {
        width: 47px;
        height: 47px;
        border-radius: 5px;

        background: #5436DA;

        /* margin-top: -10px; */

        display: flex;
        justify-content: center;
        align-items: center;
        display: none !important;
    }
    
    .profile img {
        width: 60%;
        height: 60%;
        object-fit: contain;
    }

    .ai .profile {
        /* background: #10a37f; */
        background: transparent;
        display: block !important;
    }

    .message {
        flex: 1;

        /* color: #dcdcdc;
        font-size: 20px; */

        /* max-width: 100%; */
        overflow-x: scroll;
        max-width: 80%;
        padding: 8.11497px 15.3449px;
        gap: 5.11px;
        background: #FFFFFF;
        border-radius: 15.3449px;
        font-weight: 400;
        font-size: 20px;
        color: #011627;

        /* 
   * white space refers to any spaces, tabs, or newline characters that are used to format the CSS code
   * specifies how white space within an element should be handled. It is similar to the "pre" value, which tells the browser to treat all white space as significant and to preserve it exactly as it appears in the source code.
   * The pre-wrap value allows the browser to wrap long lines of text onto multiple lines if necessary.
   * The default value for the white-space property in CSS is "normal". This tells the browser to collapse multiple white space characters into a single space, and to wrap text onto multiple lines as needed to fit within its container.
  */
        white-space: pre-wrap;

        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    /* hides scrollbar */
    .message::-webkit-scrollbar {
        display: none;
    }

    form {
        width: 100%;
        max-width: 1280px;
        margin: 0 auto;
        padding: 10px;
        /* background: #40414F; */
        background: transparent;
        display: flex;
        flex-direction: row;
        gap: 10px;
    }

    textarea {
        width: 100%;

        color: #fff;
        font-size: 18px;

        padding: 10px;
        background: transparent;
        border-radius: 5px;
        border: none;
        outline: none;
    }

    div#undefined {
        background: linear-gradient(90.04deg, #FFA200 0.68%, #F47300 99.99%);
        margin-left: 30%;

    }
</style>
@endsection
@section('content')
@include('components.flash-message')
<div class="row">
    <div class="col-lg-5 col-md-5 col-sm-4 col-4"></div>
    <div class="col-lg-7 col-md-7 col-sm-8 col-8" style="text-align: center;">
        <p class="nwcttoday">Today</p>
    </div>
</div>
<div class="chat-wrapper">
    <div class="chat-content" id="chat-area">
        <div class="child-wrapper ai">
            <div class="chat">
                <div class="profile">
                    <img
                      src="{{ asset('front/images/bot.png') }}"
                      alt="bot.png"
                    />
                </div>
                <div class="message" id="12">{{$text}}</div>
            </div>
        </div>
    </div>
    <form id="ajaForm">
        <input type="hidden" id="old_prompt" value="{{json_encode($old_prompt)}}" name="old_prompt">
        <div class="chat-footer d-flex align-items-center">
            <!-- <div class="input-group">
                <textarea class="form-control" placeholder="Type a message" name="prompt" id="prompt" required></textarea>
                {{-- <button type="submit" class="btn btn-info" id="submit-btn" {{
                    session()->has('package-error') ? 'disabled' : '' }}> --}}
                    <button type="submit" class="btn btn-info" id="submit-btn">
                    <i class="fadeIn animated bx bx-right-arrow-alt"></i></button>
            </div> -->
            <div class="input-group nwctinput-group chatform">
                <button class="btn btn-search nwctbtn-search" type="button"><i class="lni lni-emoji-smile"></i></button>
                <textarea type="text" name="prompt" id="prompt" class="form-control nwcttempsearchbar2" placeholder="Message" required></textarea>
                <button class="btn btn-search nwctbtn-search2" type="submit" id="submit-btn" {{
                    session()->has('package-error') ? 'disabled' : '' }}>
                    <img src="{{asset('admin_assets')}}/assets/images/chatsender.png" alt="">
                </button>
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
    var bot = "{{ asset('front/images/bot.png') }}";
    var user = "{{ asset('front/images/user.svg') }}";
    var apiUrl = "{{ route('user.chat.ai_response') }}";
    const token = "{{ csrf_token() }}"
</script>
<script src="{{ asset('front/js/chat.js') }}"></script>
{{-- <script>
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

</script> --}}
@endsection
