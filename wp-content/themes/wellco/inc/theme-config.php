<?php
if(!function_exists('wellco_configs')){
    function wellco_configs($value){

        $t_primary_color = wellco_get_opt('primary_color', '#4b83fc');
        $p_primary_color = wellco_get_page_opt('p_primary_color');
        if(!empty($p_primary_color)) {
           $t_primary_color = $p_primary_color;
        }

        $t_secondary_color = wellco_get_opt('secondary_color', '#66cea9');
        $p_secondary_color = wellco_get_page_opt('p_secondary_color');
        if(!empty($p_secondary_color)) {
           $t_secondary_color = $p_secondary_color;
        }
         
        $configs = [
            'theme_colors' => [
                'primary'   => [
                    'title' => esc_html__('Primary', 'wellco').' ('.wellco_get_opt('primary_color', '#4b83fc').')', 
                    'value' => $t_primary_color
                ],
                'secondary'   => [
                    'title' => esc_html__('Secondary', 'wellco').' ('.wellco_get_opt('secondary_color', '#66cea9').')', 
                    'value' => $t_secondary_color
                ],
                'third'   => [
                    'title' => esc_html__('Third', 'wellco').' ('.wellco_get_opt('third_color', '#ffbd40').')', 
                    'value' => wellco_get_opt('third_color', '#ffbd40')
                ]
            ],
            'link' => [
                'color' => wellco_get_opt('link_color', ['regular' => '#4b83fc'])['regular'],
                'color-hover'   => wellco_get_opt('link_color', ['hover' => '#66cea9'])['hover'],
                'color-active'  => wellco_get_opt('link_color', ['active' => '#66cea9'])['active'],
            ],
               
        ];
        return $configs[$value];
    }
}
if(!function_exists('wellco_inline_styles')) {
    function wellco_inline_styles() {  
        
        $theme_colors      = wellco_configs('theme_colors');
        $link_color        = wellco_configs('link');
        ob_start();
        echo ':root{';
            
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
            }
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color-rgb: %2$s;', str_replace('#', '',$color),  wellco_hex_rgb($value['value']));
            }
            foreach ($link_color as $color => $value) {
                printf('--link-%1$s: %2$s;', $color, $value);
            }
        echo '}';

        return ob_get_clean();
         
    }
}
 