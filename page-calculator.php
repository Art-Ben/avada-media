<?php
// Template name: Calculator Form
get_header('inner'); the_post();
?>

<main>
    <section class="calculateHome section bgDark">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mainTitle lightTitle">
                        <span class="sectionTitle"><?php the_field('subtitle'); ?></span>
                        <h1 class="sectionSubTitle"><?php the_title(); ?>
                            <span class="shadowText"><?php the_title(); ?></span>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-6">
                    <div class="slogan">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
            <form action="#" class="calculator" autocomplete="off" method="post">
                <?php $team_block = get_field('team_block'); ?>
                <?php if (!empty($team_block)) : ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="mainTitle lightTitle">
                                <span class="sectionTitle"><?=$team_block['description']?></span>
                                <p class="sectionSubTitle"><?=$team_block['title']?></p>
                            </div>
                            <div class="calculatorBlock">
                                <div class="wrap">
                                    <?php foreach ($team_block['directions'] as $direction):?>
                                        <div class="wrapItem">
                                        <span class="title"><?=$direction['directions_block']['title']?></span>
                                        <ul>
                                            <?php foreach ($direction['directions_block']['technologies'] as $technology): ?>
                                            <li>
                                                <div class="name"><?=$technology['technology_name']?></div>
                                                <div class="counter">
                                                    <span class="minus">-</span>
                                                    <label>
                                                        <input name="developers[<?=$direction['directions_block']['title']?>][<?=$technology['technology_name']?>]" type="text" value="0" readonly>
                                                    </label>
                                                    <span class="plus">+</span>
                                                </div>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="formResetBtn">
                                    <button type="button" class="mainBtn">
                                        <svg class="svgIcon iconReset">
                                            <use xlink:href="#iconReset"></use>
                                        </svg>
                                        Обнулить<span class="decorUnderline"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php $expert_team_block = get_field('expert_team_block'); ?>
                <?php if (!empty($expert_team_block)) : ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="mainTitle lightTitle">
                                <span class="sectionTitle"><?=$expert_team_block['description']?></span>
                                <p class="sectionSubTitle"><?=$expert_team_block['title']?></p>
                            </div>
                            <div class="calculatorBlock">
                                <div class="wrap">
                                    <?php foreach ($expert_team_block['specs'] as $spec): ?>
                                    <div class="wrapItem">
                                        <ul>
                                            <li>
                                                <div class="name"><?=$spec['spec_name']?></div>
                                                <div class="counter">
                                                    <span class="minus">-</span>
                                                    <label>
                                                        <input name="experts[<?=$spec['spec_name']?>]" type="text" value="0" readonly>
                                                    </label>
                                                    <span class="plus">+</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="formResetBtn">
                                    <button type="button" class="mainBtn">
                                        <svg class="svgIcon iconReset">
                                            <use xlink:href="#iconReset"></use>
                                        </svg>
                                        Обнулить<span class="decorUnderline"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php $domains_block = get_field('domains_block'); ?>
                <?php if (!empty($domains_block)) : ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="mainTitle lightTitle">
                                <span class="sectionTitle"><?=$domains_block['description']?></span>
                                <p class="sectionSubTitle"><?=$domains_block['title']?></p>
                            </div>
                            <div class="calculatorBlock">
                                <div class="wrap">
                                    <?php foreach ($domains_block['domains'] as $iteration => $domain): ?>
                                    <div class="wrapItem">
                                        <ul>
                                            <li>
                                                <div class="controlWrapper">
                                                    <label class="controlRadio">
                                                        <input type="radio" name="domain" value="<?=$domain['domain_name']?>" <?=($iteration == 0)?'checked':''?>>
                                                        <span class="text"><i></i><?=$domain['domain_name']?></span>
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php $project_time_block = get_field('project_time_block'); ?>
                <?php if(!empty($project_time_block)): ?>
                <div class="row">
                    <div class="col-12">
                        <div class="mainTitle lightTitle">
                            <span class="sectionTitle"><?=$project_time_block['description']?></span>
                            <p class="sectionSubTitle"><?=$project_time_block['title']?></p>
                        </div>
                        <div class="calculatorBlock">
                            <input type="text" name="discount" value="0" class="hiddenInputDiscount" readonly hidden>
                            <input type="text" name="type" value="0" class="hiddenInputTime" readonly hidden>
                            <div class="projectTimeLine">
                                <div class="tooltip">
                                    <p class="discount"></p>
                                    <p class="time"></p>
                                </div>
                                <div class="grid">
                                    <?php foreach ($project_time_block['times'] as $iteration => $time):?>



                                    <?php if($time['type'] == 'bigDot'): ?>
                                            <div class="dot bigDot <?=($iteration==0)?'active':''?>" data-grid="<?=$time['dotDescription']?>" data-discount="<?=$time['deal']?>" data-time="<?=$time['time']?>"><i></i></div>
                                    <?php else: ?>
                                            <div class="dot" data-grid="" data-discount="<?=$time['deal']?>" data-time="<?=$time['time']?>"></div>
                                    <?php endif; ?>

                                    <?php endforeach; ?>

                                </div>
                                <div class="rocket">
                                    <div class="iconRocket">
                                        <svg class="svgIcon rocketSlider">
                                            <use xlink:href="#rocketSlider"></use>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php $contact_form = get_field('contact_form'); ?>
                <?php if(!empty($contact_form)): ?>
                <div class="row">
                    <div class="col-12">
                        <div class="link">
                            <a href="#" class="mainBtn calculatorPopup"><?=$contact_form['button_text']?><span class="decorUnderline"></span></a>
                        </div>
                    </div>
                </div>

                <!-- Popup calculator -->
                <div class="popupCalculator" id="popupCalculator">
                    <div style="display: none" id="textSentSuccess"><?=$contact_form['sent_success']?></div>
                    <div style="display: none" id="textSentFault"><?=$contact_form['sent_fail']?></div>
                    <div class="wrap" style="background: url('<?=$contact_form['background_image']?>') no-repeat center top/cover;">
                        <svg class="svgIcon iconClose closePopup">
                            <use xlink:href="#iconClose"></use>
                        </svg>
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mainTitle lightTitle">
                                        <span class="sectionTitle"><?=$contact_form['description']?></span>
                                        <p class="sectionSubTitle"><?=$contact_form['title']?>
                                            <span class="shadowText"><?=$contact_form['title']?></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="calculatorForm">
                                        <?php foreach($contact_form['fields'] as $field): ?>
                                        <?php if(in_array($field['type'], ['text', 'number', 'email'])): ?>
                                        <div class="controlWrapper">
                                            <input autocomplete="off" type="<?=$field['type']?>" class="controlForm" name="calculatorForm_<?=$field['title']?>" id="calculatorForm_<?=$field['title']?>" required>
                                            <label for="calculatorForm_<?=$field['title']?>" class="placeholder"><?=$field['title']?></label>
                                        </div>
                                        <?php endif; ?>

                                        <?php if($field['type'] == 'textarea'): ?>
                                        <div class="controlWrapper">
                                            <textarea autocomplete="off" class="controlForm" name="calculatorForm_<?=$field['title']?>" id="calculatorForm_<?=$field['title']?>" rows="3"></textarea>
                                            <label for="calculatorForm_<?=$field['title']?>" class="placeholder"><?=$field['title']?></label>
                                        </div>
                                        <?php endif; ?>

                                        <?php endforeach; ?>
                                        <div class="formFooter">
                                            <button type="submit" class="mainBtn"><?=$contact_form['submit_button_text']?><span class="decorUnderline"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Popup calculator -->
                <?php endif; ?>
            </form>
        </div>
        <svg class="svgIcon iconScrollNext scroll-next d-none d-xl-inline-block">
            <use xlink:href="#iconScrollNext"></use>
        </svg>
    </section>
    <?php get_template_part( 'partials/pt', 'footer' ); ?>
</main>

<?php //get_footer('inner'); ?>
