<?php

class CT_CtIconHiddenSidebar_Widget extends Bravis_Theme_Core_Widget_Base{
    protected $name = 'ct_icon_hidden_sidebar';
    protected $title = 'Bravis Icon Hidden Sidebar';
    protected $icon = 'eicon-menu-bar';
    protected $categories = array( 'bravis-theme-core' );
    protected $params = '{"sections":[{"name":"source_section","label":"Source Settings","tab":"content","controls":[{"name":"wg_align","label":"Alignment","type":"choose","control_type":"responsive","options":{"flex-start":{"title":"Left","icon":"fa fa-align-left"},"center":{"title":"Center","icon":"fa fa-align-center"},"flex-end":{"title":"Right","icon":"fa fa-align-right"}},"selectors":{"{{WRAPPER}} .ct-icon-hidden-sidebar":"justify-content: {{VALUE}};"}},{"name":"style","label":"Style","type":"select","default":"style1","options":{"style1":"Style 1"}},{"name":"icon_color","label":"Icon Color","type":"color","selectors":{"{{WRAPPER}} .ct-icon-hidden-sidebar .item--inner span, {{WRAPPER}} .ct-icon-hidden-sidebar .item--inner::before, {{WRAPPER}} .ct-icon-hidden-sidebar .item--inner::after":"background-color: {{VALUE}};"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}