<?php
    require_once('card.php');
    
    class Deck
    {
        private $deckType;
        private $deck= array();
        
        function __construct($type)
        {
            $this -> deckType = $type;
            $this -> deck = array();
            
            for($i = 1; $i<14; $i++)
            {
                array_push($this->deck, new Card("./img/".$this->deckType."/".$i.".png", $i));
            }
            shuffle($this -> deck);
        }
        
        public function getCard()
        {
            $card = array_pop($this -> deck);
            return $card;
        }
        
        public function getSize()
        {
            $counting = sizeof($deck);
            return $counting;
        }
    }
?>