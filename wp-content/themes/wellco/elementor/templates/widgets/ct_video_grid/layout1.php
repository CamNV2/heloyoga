<?php
$default_settings = [
    'col_xl' => '4',
    'col_lg' => '4',
    'col_md' => '3',
    'col_sm' => '2',
    'col_xs' => '1',
    'imgs_size' => '',
    'content_list' => '',
    'ct_animate' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$col_xl = 12 / intval($col_xl);
$col_lg = 12 / intval($col_lg);
$col_md = 12 / intval($col_md);
$col_sm = 12 / intval($col_sm);
$col_xs = 12 / intval($col_xs);
$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$image_size = '600x644';
if(!empty($imgs_size)) {
    $image_size = $imgs_size;
}
?>
<?php if(isset($content_list) && !empty($content_list) && count($content_list)): ?>
    <div class="ct-grid ct-video-grid1">
        <div class="grid-filter-wrap">
            <span class="filter-item active" data-filter="*"><?php echo esc_html__('All', 'wellco'); ?></span>
            <?php $cat_list = array();
            foreach ( $content_list as $item ) {
                $g_category = isset($item['category']) ? $item['category'] : '';
                $c_a = explode(',', $g_category);
                foreach ( $c_a as $c){
                    $r_c = str_replace(' ', '-', strtolower(trim($c)));
                    $cat_list[$r_c] = $c;
                }
            } ?>
            <?php foreach ($cat_list as $key => $value):
                $key_result = preg_replace('#[&]*#', '', $key); ?>
                    <?php if(!empty($value)) : ?>
                        <span class="filter-item" data-filter="<?php echo esc_attr('.' . $key_result); ?>">
                            <?php echo esc_attr($value); ?>
                        </span>
                    <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="ct-grid-inner ct-grid-masonry row animate-time" data-gutter="7">
            <?php foreach ($content_list as $key => $value):
    			$category = isset($value['category']) ? $value['category'] : '';
                $title = isset($value['title']) ? $value['title'] : '';
                $author = isset($value['author']) ? $value['author'] : '';
                $image = isset($value['image']) ? $value['image'] : '';
                $img_size = isset($value['img_size']) ? $value['img_size'] : '';
                $video_link = isset($value['video_link']) ? $value['video_link'] : '';
                $price = isset($value['price']) ? $value['price'] : '';
                if(!empty($img_size)) {
                    $image_size = $img_size;
                }
                $item_col_xs = isset($value['item_col_xs']) ? $value['item_col_xs'] : '';
                $item_col_sm = isset($value['item_col_sm']) ? $value['item_col_sm'] : '';
                $item_col_md = isset($value['item_col_md']) ? $value['item_col_md'] : '';
                $item_col_lg = isset($value['item_col_lg']) ? $value['item_col_lg'] : '';
                $item_col_xl = isset($value['item_col_xl']) ? $value['item_col_xl'] : '';
                if($item_col_xl !== 'default') {
                    $col_xl = 12 / intval($item_col_xl);
                }
                if($item_col_lg !== 'default') {
                    $col_lg = 12 / intval($item_col_lg);
                }
                if($item_col_md !== 'default') {
                    $col_md = 12 / intval($item_col_md);
                }
                if($item_col_sm !== 'default') {
                    $col_sm = 12 / intval($item_col_sm);
                }
                if($item_col_xs !== 'default') {
                    $col_xs = 12 / intval($item_col_xs);
                }
                $item_class = "grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
                $c_l = explode(',',$category);
                $filter_class_a = array();
                foreach ( $c_l as $c_c ) {
                    $filter_class_a[] = str_replace(' ','-',trim(strtolower($c_c)));
                }
                $filter_class = implode(' ',$filter_class_a);
                $filter_class_result = preg_replace('#[&]*#', '', $filter_class);
                if(!empty($image['id'])) {  ?>
                    <div class="<?php echo esc_attr($item_class.' '.$filter_class_result); ?>">
                        <div class="item--inner <?php echo esc_attr($ct_animate); ?>" data-wow-duration="1.2s">
                            <div class="item--holder">
                                <?php if(!empty($image['id'])) { 
                                    $img = ct_get_image_by_size( array(
                                        'attach_id'  => $image['id'],
                                        'thumb_size' => $image_size,
                                    ));
                                    $thumbnail = $img['thumbnail']; 
                                    ?>
                                    <div class="item--image">
                                        <?php echo wp_kses_post($thumbnail); ?>
                                    </div>
                                <?php } ?>
                                <?php if(!empty($price)) : ?>
                                    <div class="item--price"><?php echo esc_attr($price); ?></div>
                                <?php endif; ?>
                                <?php if(!empty($video_link)) : ?>
                                    <a class="item--play btn-video" href="<?php echo esc_url($video_link); ?>">
                                        <i class="fa fa-play"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="item--meta">
                                <h4 class="item--title">    
                                    <?php echo esc_attr($title); ?>
                                </h4>
                                <div class="item--author"><?php echo esc_attr($author); ?></div>
                            </div>
                        </div>
                    </div>
                <?php }  ?>
            <?php endforeach; ?>
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        </div>
    </div>
<?php endif; ?>
