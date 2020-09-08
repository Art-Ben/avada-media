<h2 style="padding:0; margin:0;">Контактные данные</h2>
<table >
    <?php foreach($post as $key=>$item): ?>
        <?php if(strpos($key, 'calculatorForm_') !== false): ?>
        <tr>
            <td>
                <?=str_replace('calculatorForm_', "", $key)?> -
            </td>
            <td>
                <?=$item?>
            </td>
        </tr>
        <?php endif; ?>
    <?php endforeach; ?>
</table>
<hr>
<h2 style="padding:0; margin:0;">
    Разработчики
</h2>
<table width="500px">
    <?php foreach ($post['developers'] as $spec=>$devs):  ?>
        <tr>
            <td colspan="1" style="font-weight: bold;"><?=$spec?></td>
        </tr>
        <?php foreach($devs as $tech => $dev): if($dev == 0) continue; ?>
            <tr>
                <td>
                    <?=$tech?> -
                </td>
                <td>
                    <?=$dev?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endforeach; ?>
</table>
<hr>
<h2 style="padding:0; margin:0;">
    Эксперты
</h2>
<table>
    <?php foreach ($post['experts'] as $spec=>$exps):  if($exps == 0) continue;?>
            <tr>
                <td>
                    <?=$spec?> -
                </td>
                <td>
                    <?=$exps?>
                </td>
            </tr>
    <?php endforeach; ?>
</table>
<hr>
<h2 style="padding:0; margin:0;">Общая информация</h2>
<table>
    <tr>
        <td>
            Domain
        </td>
        <td><?=$post['domain']?></td>
    </tr>
    <tr>
        <td>
            Discount
        </td>
        <td><?=$post['discount']?></td>
    </tr>
    <tr>
        <td>
            Time period
        </td>
        <td><?=$post['type']?></td>
    </tr>
</table>