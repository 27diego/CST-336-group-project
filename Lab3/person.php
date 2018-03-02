<?php
    require_once("card.php");
    
    class Person
    {
        private $name;
        private $hand;
        private $score;
        private $img;
        
        function __construct($n)
        {
            $this->name = $n;
            $this->hand=array();
            $this->score = 0;
            $this->img = NULL;
        }
        
        public function addCard($card)
        {
            $this->addPoints($card);
            array_push($this->hand, $card);
        }
        
        private function addPoints($card)
        {
            $this->score +=$card->getPoints();
        }
        
        
        public function returnImage()
        {
            $this->img = $this->name;
            $imgPath = "<img class = 'icon' src = './img/players/".$this->name.".png' alt = '".$this->name."' title = '".$this->name."' width = '110' height = '110' />";
            return $imgPath;
        }
        
        
        public function returnHand()
        {
            $imgLinks=array();
            $htmlStringArray = array();
            $htmlHand = '';
            
            foreach($this->hand as $acard)
            {
                $htmlString = "<img class = 'card' src = '".$acard->getImg()."' width = '80px' />";
                $htmlHand .= $htmlString;
            }
            return $htmlHand;
        }
        
        public function getScore()
        {
            return $this->score;
        }
        
        public function printPlayer()
        {
            echo $this->returnImage();
            echo $this->returnHand();
        }
        
        public function getName()
        {
            return $this->name;
        }
        
        
    }
?>