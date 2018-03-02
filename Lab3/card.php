<?php
    class Card
    {
        private $imgLink;
        private $points;
        
        function __construct($dir, $num)
        {
            $this -> imgLink = $dir;
            $this -> points = $num;
        }
        
        public function getPoints()
        {
            return $this->points;
        }
        
        public function getImg()
        {
            return $this->imgLink;
        }
    }
?>