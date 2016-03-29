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
        
        $this->load->helper('directory');
        $this->data['pagebody'] = 'homepage';
       
        

        // Build a list of orders
        
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

        
        //homepage validation
        $doc = new DOMDocument();
        $doc->load('./data/Timetable.xml');
        //$doc->schemaValidate('./data/Master.xsd');
        $result = ''; 
        libxml_use_internal_errors(true);
        if ($doc->schemaValidate('./data/Master.xsd'))         
        {
          
           $result = "Validated against schema successfully";       
        }
            
        else {
            $result = "<b>Oh nooooo...</b><br/>";
            foreach (libxml_get_errors() as $error) {
                $result .= $error->message . '<br/>';
            }
        }
        //Show the result
        $this->data['message'] = $result;
        libxml_clear_errors();
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
