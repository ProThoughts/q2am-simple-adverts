<?php

if (!defined('QA_VERSION')) {
	header('Location: ../../');
	exit;
}

qa_register_plugin_layer('qa-adverts-layer.php', 'Q2A Market - Simple Adverts');
qa_register_plugin_module('module', 'qa-adverts-options.php', 'qa_adverts', 'Q2A Market - Simple Adverts Options');
