<div class="messengers">
    <ul>
        <?php if (get_field('telegram', 'option')) : ?>
            <li>
                <a href="https://telegram.me/<?php the_field('telegram', 'option'); ?>" target="_blank" rel="nofollow" id="target-telegram">
                    <svg class="svgIcon iconTelegram">
                        <use xlink:href="#iconTelegram"></use>
                    </svg>
                </a>
                <span>Telegram</span>
            </li>
        <?php endif; ?>
        <?php if (get_field('whatsapp', 'option')) : ?>
            <li>
                <a href="https://api.whatsapp.com/send?phone=<?php the_field('whatsapp', 'option'); ?>" target="_blank" rel="nofollow" id="target-whatsapp">
                    <svg class="svgIcon iconWhatsapp">
                        <use xlink:href="#iconWhatsapp"></use>
                    </svg>
                </a>
                <span>Whatsapp</span>
            </li>
        <?php endif; ?>
        <?php if (get_field('viber', 'option')) : ?>
            <li>
                <a href="viber://chat?number=<?php the_field('viber', 'option'); ?>" target="_blank" rel="nofollow" id="target-viber">
                    <svg class="svgIcon iconViber">
                        <use xlink:href="#iconViber"></use>
                    </svg>
                </a>
                <span>Viber</span>
            </li>
        <?php endif; ?>
        <?php if (get_field('skype', 'option')) : ?>
            <li>
                <a href="skype:<?php the_field('skype', 'option'); ?>?chat" target="_blank" rel="nofollow" id="target-skype">
                    <svg class="svgIcon iconSkype">
                        <use xlink:href="#iconSkype"></use>
                    </svg>
                </a>
                <span>Skype</span>
            </li>
        <?php endif; ?>
        <?php if (get_field('fbmessenger', 'option')) : ?>
            <li>
                <a href="https://m.me/<?php the_field('fbmessenger', 'option'); ?>" target="_blank" rel="nofollow" id="target-fbmessenger">
                    <svg class="svgIcon iconMessenger">
                        <use xlink:href="#iconMessenger"></use>
                    </svg>
                </a>
                <span>Messenger</span>
            </li>
        <?php endif; ?>
    </ul>
</div>
