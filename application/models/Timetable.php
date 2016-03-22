<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Timetable extends CI_Model {

    protected $xml = null;
    protected $courses = array();
    protected $time = array();
    protected $weekday = array();

    //constructor
    function __construct() {
        parent::__construct();
        $this->xml = simplexml_load_file(DATAPATH . 'Master.xml', "SimpleXMLElement", LIBXML_NOENT);

        //build one complete booking from the weekday perspective
        foreach ($this->xml->days as $weekday) {
            $record = new Booking($weekday);
//            $record->day = (string) $weekday['bookingday'];
//            foreach ($this->xml->days->booking as $booking) {
//                $record->time = (String) $booking['slot'];
//                $record->courseName = (String) $coursename;
//                $record->instructor = (String) $instructor;
//                $record->type = (String) $type;
//                $record->room = (String) $room;
//            }
            $this->weekday[$record->day] = $record;
        }

        //build one complete booking from the time perspective
        foreach ($this->xml->times as $time) {
            $record = new Booking();
            $record->time = (string) $time['slot'];
            foreach ($this->xml->time->day as $day) {
                $record->day = (string) $day['bookingday'];
                
            }
            $this->time[$record->slot] = $record;
        }


        //build one complete booking from the course perspective
        foreach ($this->xml->courses as $course) {
            $record = new Booking();
            $record->courseName = (string) $course['title'];
            foreach ($this->xml->course->coursetype as $coursetype) {
                $record->type = (string) $coursetype['activity'];
                
            }
            $this->courses[$record->title] = $record;
        }
    }

    function getWeekday($bookingday) {
        if (isset($this->weekday[$bookingday]))
            return $this->weekday[$bookingday];
            
        else
            return null;
    }

    function getTime($slot) {
        if (isset($this->booking[$slot]))
            return $this->booking[$slot];
        else
            return null;
    }

    function getCourse($title) {
        if (isset($this->course[$title]))
            return $this->course[$title];
        else
            return null;
    }

}

class Booking {

    public $time = null;
    public $room = null;
    public $courseName = null;
    public $instructor = null;
    public $type = null;
    public $day = null;

    function __construct($xmlElement) {
        $this->day = (string) $xmlElement['bookingday'];
        foreach ($this->xml->$xmlElement as $booking) {
        $this->courseName = (string) $coursename;
        $this->instructor = (string) $instructor;
        $this->type = (string) $type;
        $this->room = (string) $room;
        }
        $this->time = (string) $booking['slot'];
        
        
    }

}
