<div class="popupCV" id="popupCV">
    <svg class="svgIcon iconClose closePopup">
        <use xlink:href="#iconClose"></use>
    </svg>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mainTitle lightTitle">
                    <span class="sectionTitle"><?php string_translate('Join us', 'Присоединяйся к нам'); ?></span>
                    <p class="sectionSubTitle"><?php string_translate('Send CV', 'Отправить резюме'); ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-xl-6 offset-xl-1">
                <!-- <form action="#" class="cvForm" autocomplete="off"></form> -->
                <?php echo do_shortcode( '[contact-form-7 id="385" title="Send CV"]' ); ?>
            </div>
        </div>
    </div>
</div>
