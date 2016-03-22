<?php
/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * @author		JLP
 * @copyright           2010-2013, James L. Parry
 * ------------------------------------------------------------------------
 */
class MY_Controller extends CI_Controller {
    protected $data = array();      // parameters for view components
    protected $id;                  // identifier for our content
    /**
     * Constructor.
     * Establish view parameters & load common helpers
     */
    function __construct() {
        parent::__construct();
        $this->data = array();
        $this->data['title'] = "Lab07";    // our default title
        $this->errors = array();
        $this->data['pageTitle'] = 'welcome';   // our default page
    }
    /**
     * Render this page
     */
    function render() {
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        // finally, build the browser page!
        $this->parser->parse('_template', $this->data);
    }
}