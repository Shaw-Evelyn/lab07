<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Timetable extends CI_Model {
    
    protected $xml = null;
    protected $courses = array();
    protected $times = array();
    protected $weekly = array();
    
    
    //constructor
    function __construct() {
        parrent::__construct();
        $this->xml = simplexml_load_file(DATAPATH . 'Master.xml');
    
    
    //build one complete booking from the weekday perspective
    foreach ($this->xml->weekday as $weekday){
        $record = new Booking();
        $record->day = (string) $weekday['bookingday'];
        foreach ($this->xml->weekday->booking as $booking){
            $record->time = (string) $booking['slot'];
            $record->courseName = (string) $coursename;
            $record->room = (string) $room;
            $record->instructor = (string) $instructor;
            $record->type = (string) $type;
        }
    }
    
    //build one complete booking from the time perspective
    foreach ($this->xml->time as $time){
        $record = new Booking();
        $record->time = (string) $time['slot'];
        foreach ($this->xml->time->day as $day){
            $record->day = (string) $day['bookingday'];
            $record->courseName = (string) $coursename;
            $record->instructor = (string) $instructor;
            $record->type = (string) $type;
            $record->room = (string) $room;
        }
    }
    
    
    //build one complete booking from the course perspective
    foreach ($this->xml->course as $course){
        $record = new Booking();
        $record->courseName = (string) $time['title'];
        foreach ($this->xml->course->coursetype as $coursetype){
            $record->type = (string) $day['activity'];
            $record->time = (string) $timeslot;
            $record->day = (string) $dayofweek;
            $record->instructor = (string) $instructor;
            $record->room = (string) $room;
        }
    }
    }
}

class Booking{
    public $time = null;
    public $room = null;
    public $courseName = null;
    public $instructor = null;
    public $type = null;
    public $day = null;
    
    function __construct($booking, $bookingday)
    {
        $this->time = (string) $booking['slot'];
        $this->day = (string) $bookingday;
    }
         
}