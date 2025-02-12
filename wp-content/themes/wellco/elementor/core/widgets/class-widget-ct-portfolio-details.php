<?php

class CT_CtPortfolioDetails_Widget extends Bravis_Theme_Core_Widget_Base{
    protected $name = 'ct_portfolio_details';
    protected $title = 'Bravis Portdolio Details';
    protected $icon = 'eicon-library-upload';
    protected $categories = array( 'bravis-theme-core' );
    protected $params = '{"sections":[{"name":"section_content","label":"Content","tab":"content","controls":[{"name":"wg_title","label":"Widget Title","type":"text"},{"name":"portfolio_content","label":"Content","type":"repeater","controls":[{"name":"label","label":"Label","type":"text","label_block":true},{"name":"content_type","label":"Content Type","type":"select","options":{"text":"Text","date":"Date","category":"Category","social":"Social Share"},"default":"text"},{"name":"content","label":"Content","type":"text","condition":{"content_type":["text"]}}],"title_field":"{{{ label }}}"}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}