<?php
    echo $html->css('forms', false, false, false);
	$javascript->codeBlock('
		$(function() {
			$("#NodeTitle").change(function() {
				var menuTitle = $("#NodeMenuTitle")
				if ( !menuTitle.attr("value") ) {
					menuTitle.attr("value", this.value);
				}
			});
		});
	', array('inline' => false));

	// Steal the flash message so it doesnt look gay with the tabs
	$session->flash();
	
	echo $advform->input('title', array('class' => 'textInput title'));
	echo $advform->input('menu_title');
	echo $advform->input('parent_id', array('empty' => '- No Parent -'));
	echo $advform->input('type');
	echo $advform->input('slug', array('after' => '<p class="formHint">Slug will be control what URL this content will be available from</p>'));
	echo $advform->input('url', array('after' => '<p class="formHint">Only for URL type</p>'));
	echo $advform->input('aliases', array('label' => 'Node Aliases', 'type' => 'textarea', 'after' => '<p class="formHint">Node aliases allow this node to be access from different URLs. One per line. Use a MySQL Regex</p>'));
	echo $advform->input('layout');
	echo $advform->input('template');
	echo $advform->input('enabled', array('checked' => isset($this->data['Node']['enabled']) ? $this->data['Node']['enabled'] : true ));
	echo $advform->input('visible', array('checked' => isset($this->data['Node']['visible']) ? $this->data['Node']['visible'] : true ));
	echo $advform->input('default');
?>