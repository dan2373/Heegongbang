<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.G5_SHOP_SKIN_URL.'/style.css">', 0);
?>

<!-- 상품진열 10 시작 { -->
<?php
$i=0;
foreach((array) $list as $row){

    if( empty($row) ) continue;
    $i++;

    $item_link_href = shop_item_url($row['it_id']);
    $star_score = $row['it_use_avg'] ? (int) get_star($row['it_use_avg']) : '';

    if ($this->list_mod >= 2) { // 1줄 이미지 : 2개 이상
        if ($i%$this->list_mod == 0) $sct_last = 'sct_last'; // 줄 마지막
        else if ($i%$this->list_mod == 1) $sct_last = 'sct_clear'; // 줄 첫번째
        else $sct_last = '';
    } else { // 1줄 이미지 : 1개
        $sct_last = 'sct_clear';
    }
    
    if ($i == 1) {
        if ($this->css) {
            echo "<ul class=\"{$this->css}\">\n";
        } else {
            echo "<ul class=\"sct smt_40 owl-carousel\">\n";
        }
    }

    echo "<li class=\"sct_li {$sct_last}\" style=\"width:{$this->img_width}px\">\n";

    echo "<div class=\"sct_img\">\n";

    if ($this->href) {
        echo "<a href=\"{$item_link_href}\">\n";
    }

    if ($this->view_it_img) {
        echo get_it_image($row['it_id'], $this->img_width, $this->img_height, '', '', stripslashes($row['it_name']))."\n";
    }

    if ($this->href) {
        echo "</a>\n";
    }

    echo "</div>\n";

    if ($this->view_it_id) {
        echo "<div class=\"sct_id\">&lt;".stripslashes($row['it_id'])."&gt;</div>\n";
    }
	
	// 사용후기 평점표시
	if ($this->view_star && $star_score) {
        echo "<div class=\"sct_star\"><span class=\"sound_only\">고객평점</span><img src=\"".G5_SHOP_URL."/img/s_star".$star_score.".png\" alt=\"별점 ".$star_score."점\" class=\"sit_star\"></div>\n";
    }
	
    if ($this->href) {
        echo "<div class=\"sct_txt\"><a href=\"{$item_link_href}\">\n";
    }

    if ($this->view_it_name) {
        echo stripslashes($row['it_name'])."\n";
    }

    if ($this->href) {
        echo "</a></div>\n";
    }

	if ($this->view_it_price || $this->view_it_price) {
        echo "<div class=\"sct_cost\">\n";
        if ($this->view_it_cust_price&&$row['it_cust_price']){
            $discount_rate = round(($row['it_cust_price']-$row['it_price']) / $row['it_cust_price']*100);
            echo "(".$discount_rate."%할인)\n";
        }
        if($this->view_it_cust_price && $row['it_cust_price']){
            echo "<strike>".display_price($row['it_cust_price'])."</strike>\n";
        }

    }
    if($this->view_it_price){
        echo "<div class=\"sct_cost\">\n";
        echo display_price(get_price($row), $row['it_tel_inq'])."\n";
        echo "</div>\n";
    }


    echo "</li>\n";
}

if ($i >= 1) echo "</ul>\n";

if($i == 0) echo "<p class=\"sct_noitem\">등록된 상품이 없습니다.</p>\n";
?>
<!-- } 상품진열 10 끝 -->