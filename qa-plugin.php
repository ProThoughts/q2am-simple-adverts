<?php

/*
	Plugin Name: Q2AM Simple Adverts
	Plugin URI: http://store.q2amarket.com/simple-advert/
	Plugin Update Check URI: https://raw.githubusercontent.com/q2amarket/q2am-simple-adverts/master/qa-plugin.php
	Plugin Description: Add recent questions widget on sidebar or template area
	Plugin Version: 1.3.1
	Plugin Date: 2016-03-07
	Plugin Author: Q2A Market
	Plugin Author URI: http://www.q2amarket.com
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version: 1.7
*/

if (!defined('QA_VERSION')){header('Location: ../../'); exit;}

qa_register_plugin_layer('qa-adverts-layer.php', 'Q2A Market - Simple Adverts');
qa_register_plugin_module('module', 'qa-adverts-options.php', 'qa_adverts', 'Q2A Market - Simple Adverts Options');
