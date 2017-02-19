<div class="content" style="display: block; width: 100%; min-width: 400px; min-height: 200px; background-color: #534777; color: white; padding: 5% 10px 5% 10px;">
    <div class="main" style="display: block;
        width: 85%;
        height: 100%;
        margin-left: auto;
        margin-right: auto;
        background-color: #6B618A;">
        <h2 style="color: white;">
            {{ $name }} has reached out via the contact form!
        </h2>
        <h4 style="color: white;">
            Here is their message:
        </h4>
        <span class="message" style="display: block; padding-left: 10px;">
            <p>{!! $user_message !!}</p>
        </span>
    </div>
</div>