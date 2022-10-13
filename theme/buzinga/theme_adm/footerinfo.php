<?php
include_once('_common.php');

$g5['title'] = '하단정보';
include_once('./head.php');

$save_file = G5_DATA_PATH.'/cache/theme/buzinga54/footerinfo.php';
if(is_file($save_file))
    include($save_file);
?>

<form name="ffooterinfo" id="ffooterinfo" method="post" action="./footerinfoupdate.php">
<div class="btn_confirm"><input type="submit" class="btn_save" value="저장"></div>

<div class="con_wr ftif">
    <h2>고객센터정보</h2>
    <ul>
        <li>
            <label for="tel">전화번호</label>
            <input type="text" name="tel" id="tel" required class="frm_input required" value="<?php if(isset($footerinfo['tel'])){echo get_text($footerinfo['tel']);} ?>">
        </li>
        <li>
            <label for="etc">기타정보</label>
            <textarea name="etc" id="etc" required class="required"><?php if(isset($footerinfo['etc'])){echo get_text($footerinfo['etc']);}?></textarea>
        </li>
    </ul>
</div>
<div class="con_wr ftif">
    <h2>무통장입금 정보</h2>
    <ul>
        <li>
            <label for="depositor">예금주</label>
            <input type="text" name="depositor" required class="frm_input required" value="<?php if(isset($footerinfo['depositor'])){echo get_text($footerinfo['depositor']);} ?>">
        </li>
        <li>
            <label for="account">계좌번호</label>
            <textarea name="account" id="account" required class="required"><?php if(isset($footerinfo['account'])){echo get_text($footerinfo['account']);} ?></textarea>
        </li>
    </ul>
</div>
</form>


<?php
include_once('./tail.php');
?>