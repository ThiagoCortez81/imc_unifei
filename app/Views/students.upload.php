<div class="bg-contact2" style="background-image: url('<?php echo frontendPath(); ?>images/bg-01.jpg');">
    <div class="container-contact2">
        <div class="wrap-contact2">
            <span class="contact2-form-title" style="padding-bottom: 5px;">
                <img src="<?php echo frontendPath(); ?>images/efei.gif" alt="UNIFEI"
                     style="max-width: 10%; border-right: 1px solid #000; padding-right: 5px;">
                Submissão
                <h6>Logo IMC</h6>
            </span>
            <form action="/unifei/index.php/sendImage" id="uploadLogo" class="dropzone"
                  onsubmit="event.preventDefault()">
            </form>
            <div class="container-contact2-form-btn">
                <div class="wrap-contact2-form-btn">
                    <div class="contact2-form-bgbtn"></div>
                    <button class="contact2-form-btn" id="sendImg">
                        ENVIAR
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>