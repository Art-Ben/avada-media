<section class="blogContacts section bgDark bgFixed">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mainTitle lightTitle">
                    <span class="sectionTitle"><?php the_field('footer_form_title', 'option'); ?></span>
                    <p class="sectionSubTitle"><?php the_field('footer_form_subtitle', 'option'); ?>
                        <span class="shadowText"><?php the_field('footer_form_title', 'option'); ?></span>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <?php echo do_shortcode( '[contact-form-7 id="117" title="Contact form"]' ); ?>
            </div>
            <div class="col-12 col-lg-6">
                <ul class="contactLinks">
                    <li>
                        <div class="linksInfo">
                            <div class="wrap">
                                <svg class="svgIcon iconPhone">
                                    <use xlink:href="#iconPhone"></use>
                                </svg>
                                <span><?php string_translate('Phone:', 'Телефон:'); ?></span>
                            </div>
                            <a href="tel:<?php $rplsSrc = array('(', ')', ' '); echo str_replace($rplsSrc, '', get_field('phone', 'option')); ?>" id="target-phone"><?php the_field('phone', 'option'); ?></a>
                        </div>
                    </li>
                    <li>
                        <div class="linksInfo">
                            <div class="wrap">
                                <svg class="svgIcon iconMail">
                                    <use xlink:href="#iconMail"></use>
                                </svg>
                                <span>E-mail:</span>
                            </div>
                            <a href="mailto:<?php the_field('email', 'option'); ?>"><?php the_field('email', 'option'); ?></a>
                        </div>
                    </li>
                    <li>
                        <div class="linksInfo">
                            <div class="wrap">
                                <svg class="svgIcon iconAddress">
                                    <use xlink:href="#iconAddress"></use>
                                </svg>
                                <span><?php string_translate('Address:', 'Адрес:'); ?></span>
                            </div>
                            <a href="<?php the_field('map', 'option'); ?>" target="_blank"><?php string_translate(get_field('address', 'option'), get_field('address_ru', 'option')); ?></a>
                        </div>
                    </li>
                    <li>
                        <div class="linksInfo">
                            <div class="wrap">
                                <svg class="svgIcon iconMessengers">
                                    <use xlink:href="#iconMessengers"></use>
                                </svg>
                                <span>Messengers:</span>
                            </div>
                            <div class="linksList">
                                <?php if (get_field('telegram', 'option')) : ?>
                                    <a href="https://telegram.me/<?php the_field('telegram', 'option'); ?>" target="_blank" rel="nofollow" id="target-telegram-footer">
                                        <svg class="svgIcon iconTelegram">
                                            <use xlink:href="#iconTelegram"></use>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                                <?php if (get_field('whatsapp', 'option')) : ?>
                                    <a href="https://api.whatsapp.com/send?phone=<?php the_field('whatsapp', 'option'); ?>" target="_blank" rel="nofollow" id="target-whatsapp-footer">
                                        <svg class="svgIcon iconWhatsapp">
                                            <use xlink:href="#iconWhatsapp"></use>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                                <?php if (get_field('viber', 'option')) : ?>
                                    <a href="viber://chat?number=<?php the_field('viber', 'option'); ?>" target="_blank" rel="nofollow" id="target-viber-footer">
                                        <svg class="svgIcon iconViber">
                                            <use xlink:href="#iconViber"></use>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                                <?php if (get_field('skype', 'option')) : ?>
                                    <a href="skype:<?php the_field('skype', 'option'); ?>?chat" target="_blank" rel="nofollow" id="target-skype-footer">
                                        <svg class="svgIcon iconSkype">
                                            <use xlink:href="#iconSkype"></use>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                                <?php if (get_field('fbmessenger', 'option')) : ?>
                                    <a href="https://m.me/<?php the_field('fbmessenger', 'option'); ?>" target="_blank" rel="nofollow" id="target-fbmessenger-footer">
                                        <svg class="svgIcon iconMessenger">
                                            <use xlink:href="#iconMessenger"></use>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="linksInfo">
                            <div class="wrap">
                                <svg class="svgIcon iconSocials">
                                    <use xlink:href="#iconSocials"></use>
                                </svg>
                                <span>Socials:</span>
                            </div>
                            <div class="linksList">
                                <?php if (get_field('youtube', 'option')) : ?>
                                    <a href="<?php the_field('youtube', 'option'); ?>" target="_blank" rel="nofollow">
                                        <svg class="svgIcon iconYoutube">
                                            <use xlink:href="#iconYoutube"></use>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                                <?php if (get_field('facebook', 'option')) : ?>
                                    <a href="<?php the_field('facebook', 'option'); ?>" target="_blank" rel="nofollow">
                                        <svg class="svgIcon iconFacebook">
                                            <use xlink:href="#iconFacebook"></use>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                                <?php if (get_field('instagram', 'option')) : ?>
                                    <a href="<?php the_field('instagram', 'option'); ?>" target="_blank" rel="nofollow">
                                        <svg class="svgIcon iconInstagram">
                                            <use xlink:href="#iconInstagram"></use>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                                <?php if (get_field('linkedin', 'option')) : ?>
                                    <a href="<?php the_field('linkedin', 'option'); ?>" target="_blank" rel="nofollow">
                                        <svg class="svgIcon iconLinkedIn">
                                            <use xlink:href="#iconLinkedIn"></use>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                                <?php if (get_field('twitter', 'option')) : ?>
                                    <a href="<?php the_field('twitter', 'option'); ?>" target="_blank" rel="nofollow">
                                        <svg class="svgIcon iconTwitter">
                                            <use xlink:href="#iconTwitter"></use>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                                    <a href="https://dribbble.com/Avada-Media" target="_blank" rel="nofollow">
                                        <svg class="svgIcon iconDribbble">
                                            <use xlink:href="#iconDribbble"></use>
                                        </svg>
                                    </a>
                                    <a href="https://www.behance.net/avada-media" target="_blank" rel="nofollow">
                                        <svg class="svgIcon iconBehance">
                                            <use xlink:href="#iconBehance"></use>
                                        </svg>
                                    </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
