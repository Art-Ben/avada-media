<ul class="inspirationSocialLinks">
    <?php if (get_field('youtube', 'option')) : ?>
        <li>
            <a href="<?php the_field('youtube', 'option'); ?>" target="_blank">
                <svg class="svgIcon iconYoutube">
                    <use xlink:href="#iconYoutube"></use>
                </svg>
            </a>
        </li>
    <?php endif; ?>
    <?php if (get_field('facebook', 'option')) : ?>
        <li>
            <a href="<?php the_field('facebook', 'option'); ?>" target="_blank">
                <svg class="svgIcon iconFacebook">
                    <use xlink:href="#iconFacebook"></use>
                </svg>
            </a>
        </li>
    <?php endif; ?>
    <?php if (get_field('instagram', 'option')) : ?>
        <li>
            <a href="<?php the_field('instagram', 'option'); ?>" target="_blank">
                <svg class="svgIcon iconInstagram">
                    <use xlink:href="#iconInstagram"></use>
                </svg>
            </a>
        </li>
    <?php endif; ?>
    <?php if (get_field('linkedin', 'option')) : ?>
        <li>
            <a href="<?php the_field('linkedin', 'option'); ?>" target="_blank">
                <svg class="svgIcon iconLinkedIn">
                    <use xlink:href="#iconLinkedIn"></use>
                </svg>
            </a>
        </li>
    <?php endif; ?>
    <?php if (get_field('twitter', 'option')) : ?>
        <li>
            <a href="<?php the_field('twitter', 'option'); ?>" target="_blank">
                <svg class="svgIcon iconTwitter">
                    <use xlink:href="#iconTwitter"></use>
                </svg>
            </a>
        </li>
    <?php endif; ?>
</ul>
