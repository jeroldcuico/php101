<?php

require 'functions.php';

use PHPUnit\Framework\TestCase;

class ExerciseTest extends TestCase{

    public function testCheckLetter(){
        $letterVowel = CheckLetter('a');
        $this->assertEquals('The Letter a declared is a Vowel' ,$letterVowel);

        $letterConsonant = CheckLetter('b');
        $this->assertEquals('The Letter b declared is a Consonant' ,$letterConsonant);
    }
    public function testconverttoWord(){
         
        $digit1 = converttoWord(123);
        $this->assertEquals('ONE TWO THREE ' , $digit1);

        $digit2 = converttoWord(746859);
        $this->assertEquals('SEVEN FOUR SIX EIGHT FIVE NINE ' , $digit2);
    }

    public function testDivisiblebyThree(){
        
        $isdivisible = DivisiblebyThree(9);
        $this->assertEquals('9 is Divisible 3' , $isdivisible);
        
        $isnotdivisible = DivisiblebyThree(145);
        $this->assertEquals('145 is Not Divisible by 3' , $isnotdivisible);
    }
    public function testUnique(){
        
        $unique = Unique(array('jet', 'jetlag', 'jetlag', 'lag', 'laggers', 'jets', 'lag', 'where'));
        $this->assertEquals('jet, jetlag, lag, laggers, jets, where' , $unique);
               
    }
     


    public function testisArmstrong(){

        $isArmstrong = isArmstrong(370);
        $this->assertEquals('370 and 370 are Armstrong value' , $isArmstrong);

        $isnotArmstrong = isArmstrong(315);
        $this->assertEquals('153 and 315 are not Armstrong value' , $isnotArmstrong);
    }

}

?>