<?php

class CT_CtCountdown_Widget extends Bravis_Theme_Core_Widget_Base{
    protected $name = 'ct_countdown';
    protected $title = 'Bravis Countdown';
    protected $icon = 'eicon-countdown';
    protected $categories = array( 'bravis-theme-core' );
    protected $params = '{"sections":[{"name":"countdown_section","label":"Content","tab":"content","controls":[{"name":"date","label":"Date","type":"text","label_block":true,"description":"Set date count down (Date format: yy\/mm\/dd)"},{"name":"style","label":"Style","type":"select","options":{"style1":"Style 1","style2":"Style 2"},"default":"style1"}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'ct-countdown' );
}