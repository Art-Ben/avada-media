<div class="socials">
    <ul>
        <?php if (get_field('youtube', 'option')) : ?>
            <li>
                <a href="<?php the_field('youtube', 'option'); ?>" target="_blank" rel="nofollow">
                    <svg class="svgIcon iconYoutube">
                        <use xlink:href="#iconYoutube"></use>
                    </svg>
                </a>
                <span>Youtube</span>
            </li>
        <?php endif; ?>
        <?php if (get_field('facebook', 'option')) : ?>
            <li>
                <a href="<?php the_field('facebook', 'option'); ?>" target="_blank" rel="nofollow">
                    <svg class="svgIcon iconFacebook">
                        <use xlink:href="#iconFacebook"></use>
                    </svg>
                </a>
                <span>Facebook</span>
            </li>
        <?php endif; ?>
        <?php if (get_field('instagram', 'option')) : ?>
            <li>
                <a href="<?php the_field('instagram', 'option'); ?>" target="_blank" rel="nofollow">
                    <svg class="svgIcon iconInstagram">
                        <use xlink:href="#iconInstagram"></use>
                    </svg>
                </a>
                <span>Instagram</span>
            </li>
        <?php endif; ?>
        <?php if (get_field('linkedin', 'option')) : ?>
            <li>
                <a href="<?php the_field('linkedin', 'option'); ?>" target="_blank" rel="nofollow">
                    <svg class="svgIcon iconLinkedIn">
                        <use xlink:href="#iconLinkedIn"></use>
                    </svg>
                </a>
                <span>LinkedIn</span>
            </li>
        <?php endif; ?>
        <?php if (get_field('twitter', 'option')) : ?>
            <li>
                <a href="<?php the_field('twitter', 'option'); ?>" target="_blank" rel="nofollow">
                    <svg class="svgIcon iconTwitter">
                        <use xlink:href="#iconTwitter"></use>
                    </svg>
                </a>
                <span>Twitter</span>
            </li>
        <?php endif; ?>
        <li>
            <a href="https://dribbble.com/Avada-Media" target="_blank" rel="nofollow">
                <svg class="svgIcon iconDribbble">
                    <use xlink:href="#iconDribbble"></use>
                </svg>
            </a>
            <span>Dribbble</span>
        </li>
        <li>
            <a href="https://www.behance.net/avada-media" target="_blank" rel="nofollow">
                <svg class="svgIcon iconBehance">
                    <use xlink:href="#iconBehance"></use>
                </svg>
            </a>
            <span>Behance</span>
        </li>
    </ul>
</div>
