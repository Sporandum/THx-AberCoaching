<?php

class MyPluginInit {
	/**
	 * @var \WPackio\Enqueue
	 */
	public $enqueue;

	public function __construct() {
		// It is important that we init the Enqueue class right at the plugin/theme load time
		$this->enqueue = new \WPackio\Enqueue( 'wpack', 'assets', '1.0.0', 'theme', __FILE__ );
		// Enqueue a few of our entry points
		add_action( 'wp_enqueue_scripts', [ $this, 'scripts_enqueue' ] );
	}


	public function scripts_enqueue() {
		// Enqueue the `main` entry from `reactapp` file entry.
		$this->enqueue->enqueue( 'js', 'scripts', [] );
		$this->enqueue->enqueue( 'css', 'styles', [] );
	}
}


// Init
new MyPluginInit();