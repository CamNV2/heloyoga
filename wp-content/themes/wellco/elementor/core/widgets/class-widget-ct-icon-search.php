<?php

class CT_CtIconSearch_Widget extends Bravis_Theme_Core_Widget_Base{
    protected $name = 'ct_icon_search';
    protected $title = 'Bravis Search';
    protected $icon = 'eicon-search';
    protected $categories = array( 'bravis-theme-core' );
    protected $params = '{"sections":[{"name":"source_section","label":"Source Settings","tab":"content","controls":[{"name":"style","label":"Style","type":"select","default":"style1","options":{"style1":"Style 1 (Popup)","style2":"Style 2 (Form)","style3":"Style 3 (Form)"}},{"name":"text_placeholder","label":"Text Placeholder","type":"text","condition":{"style":["style2","style3"]}},{"name":"text_button","label":"Text Button","type":"text","condition":{"style":"style3"}},{"name":"quick_search","label":"Quick Search","type":"repeater","controls":[{"name":"content","label":"Content","type":"text","label_block":true}],"title_field":"{{{ content }}}","condition":{"style":"style3"}},{"name":"post_type","label":"Search Post Type","type":"select","default":"","options":{"":"All","page":"Page","post":"Post","lp_course":"Course","portfolio":"Portfolio","product":"Product"}},{"name":"input_border_radius","label":"Input Border Radius","type":"dimensions","size_units":["px"],"selectors":{"{{WRAPPER}} .ct-header-search-form .search-field":"border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"},"condition":{"style":"style2"}},{"name":"input_bg_color","label":"Input Box Color","type":"color","selectors":{"{{WRAPPER}} .ct-header-search-form .search-field":"background-color: {{VALUE}};"},"condition":{"style":"style2"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}