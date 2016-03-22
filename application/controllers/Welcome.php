<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();
        $this->load->model('Timetable');
        //$this->load->view('homepage');
    }

    function index() {
        // Build a list of orders
        $this->data['pagebody'] = 'homepage';
        $this->load->helper('directory');
        $candidates = directory_map(DATAPATH);
        sort($candidates);
        foreach ($candidates as $file) {
            if (substr_compare($file, XMLSUFFIX, strlen($file) - strlen(XMLSUFFIX), strlen(XMLSUFFIX)) === 0)
             //exclude our menu
                if ($file != 'Master.xml')
                 //trim the suffix
                    $orders[] = array('filename' => substr($file, 0, -4));
        }
        $this->data['orders'] = $orders;
        // Present the list to choose from
        
        $this->render();
    }

    //-------------------------------------------------------------
    //  Show the "receipt" for a specific order
    //-------------------------------------------------------------

    
    
    function order($filename) {
        // Build a receipt for the chosen order
        $timetable = new Timetable($filename);
        $this->data['filename'] = $filename;
        $this->data['perspective'] = $timetable->getWeekday("Monday");
        //$this->data['perspective'] = $timetable->getSomething("2");
              
        $this->data['pagebody'] = 'justone';
        $this->render();
    }
}
