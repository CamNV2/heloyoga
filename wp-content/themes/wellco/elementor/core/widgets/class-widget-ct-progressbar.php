<?php

class CT_CtProgressbar_Widget extends Bravis_Theme_Core_Widget_Base{
    protected $name = 'ct_progressbar';
    protected $title = 'Bravis Progress Bar';
    protected $icon = 'eicon-skill-bar';
    protected $categories = array( 'bravis-theme-core' );
    protected $params = '{"sections":[{"name":"source_section","label":"Source Settings","tab":"content","controls":[{"name":"progressbar_list","label":"Progress Bar Lists","type":"repeater","controls":[{"name":"title","label":"Title","type":"text","label_block":true},{"name":"percent","label":"Percentage","type":"slider","default":{"size":50,"unit":"%"},"label_block":true}],"title_field":"{{{ title }}}"}]},{"name":"section_title","label":"Style","tab":"style","controls":[{"name":"title_color","label":"Title Color","type":"color","selectors":{"{{WRAPPER}} .ct-progressbar .ct-progress-title":"color: {{VALUE}};"}},{"name":"typography","label":"Title Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .ct-progressbar .ct-progress-title"},{"name":"percent_color","label":"Percentage Color","type":"color","selectors":{"{{WRAPPER}} .ct-progressbar .ct-progress-percentage":"color: {{VALUE}};"}},{"name":"percentage_typography","label":"Percentage Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .ct-progressbar .ct-progress-percentage"},{"name":"bar_color","label":"Bar Color","type":"color","selectors":{"{{WRAPPER}} .ct-progressbar .ct-progress-bar":"background-color: {{VALUE}};","{{WRAPPER}} .ct-progressbar .ct-progress-line":"border-color: {{VALUE}};"}},{"name":"line_color","label":"Line Wrap Color","type":"color","selectors":{"{{WRAPPER}} .ct-progressbar .ct-progress-line":"border-color: {{VALUE}};"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'progressbar','ct-progressbar-widget-js','ct-inline-css-js' );
}