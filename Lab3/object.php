<?php
    require_once("card.php");
    require_once("deck.php");
    require_once("person.php");
    
    class SilverjackHandler
    {
        private $players = array(); 
        private $playerno;
        private $decks = array();
        private $win;
        
        function __construct() 
        {
            array_push($this->players, new Person("Diego"));
            array_push($this->players, new Person("Josh"));
            array_push($this->players, new Person("Noah"));
            array_push($this->players, new Person("Darren"));
            
            shuffle($this->players);
            
            array_push($this->decks, new Deck("clubs"));
            array_push($this->decks, new Deck("diamonds"));
            array_push($this->decks, new Deck("hearts"));
            array_push($this->decks, new Deck("spade"));
            

            $this->playerno = 0;
            $this->win = FALSE;
        }
        
        public function dealCard()
        {
            $max = count($this->decks)-1;
            $randomDeck = rand(0,$max);
            $card = array_values($this->decks)[$randomDeck]->getCard();
            array_values($this->players)[$this->playerno]->addCard($card);
            $this->nextPlayer();
        }
        
        private function nextPlayer()
        {
            if($this->playerno == 3)
            {
                $this->playerno=0;
            }
            else
            {
                $this->playerno++;
            }
        }
        
        public function printGame()
        {
            echo "<div class = 'main'>";
            $max = count($this->players);
            foreach($this->players as $player)
            {
                $this->printRow($player);
            }
            echo"</div>";
        }
        
        public function printRow($player)
        {
            echo "<div class='playrow'>";
            echo "<p>".$player->getName()." - ".$player->getScore()."</p>";
            $player->printPlayer();
            
            echo"</div>";
        }
        
       public function checkWin(){  /* The programming in this function is kind of sloppy.  it took me a long time to fix this.  If i had more time i would have completely rewriten it */
            $scores = array();
            foreach ($this->players as $player){
                $ps = $player->getScore();
                
                if ($ps > 42)
                {
                    $this->win = TRUE;
                    for ($playerid = 0; $playerid < count($this->players); $playerid++)
                    {
                        if ($this->players[$playerid]->getScore() <= 42)
                        {
                            array_push($scores, $this->players[$playerid]->getScore());
                        }
                        else
                        {
                            array_push($scores, 0);
                        }
                    }
                    
                    //print_r($scores);
                    
                    $winningvalue = max($scores);
                    
                   // echo $winningvalue;
                    
                    for ($playerid = 0; $playerid < count($scores); $playerid++)
                    {
                        if ($scores[$playerid] == $winningvalue)
                        {
                            echo "<div class = 'victory'>";
                            echo " ".$this->players[$playerid]->getName()." won with a score of ".$this->getScores($playerid). " ";
                            echo "</div>";
                        }
                    }
                    return;
                }
                
            }
            
            
        }
        
        public function getScores($i){
            $scores = 0;
            $medArray = array();
            
            for ($playertoadd = 0; $playertoadd < count($this->players); $playertoadd++)
            {
                 if ($i != $playertoadd)
                {
                $medArray[$playertoadd]= $this->players[$playertoadd]->getScore();
                    //$scores += $this->players[$playertoadd]->getScore();
                    //echo $medArray[$playertoadd]."<br/>";
                }
            }
            sort($medArray);
            if(($medArray[1]-42)>(42-$medArray[3]))
            {
                $scores=$medArray[2]+$medArray[3];
            }
            else {
                $scores=$medArray[1]+$medArray[2];
            }
            
            return $scores;
        }
        
        public function getWin(){
            return $this->win;
        }
    }


?>