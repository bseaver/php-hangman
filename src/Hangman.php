<?php
    class Hangman
    {
        private $word_to_guess;
        private $guessed_letters;
        private $max_wrong_guess_count;

        function __construct($new_word_to_guess, $new_max_guess_count)
        {
            $this->word_to_guess = $new_word_to_guess;
            $this->guessed_letters = array();
            $this->max_wrong_guess_count = $new_max_guess_count;
        }

        function wordGuessedSoFar()
        {
            $word_letters = str_split($this->word_to_guess);
            $output = "";
            foreach ($word_letters as $letter) {
                if (in_array($letter, $this->guessed_letters)) {
                    $output .= $letter . " ";
                } else {
                    $output .= "_ ";
                }
            }
            return $output;
        }

        function guessALetter($new_letter)
        {
            array_push($this->guessed_letters, $new_letter);
        }

        function wrongGuessCount()
        {
            $unique_guesses = array_unique($this->guessed_letters);
            $word_letters = str_split($this->word_to_guess);
            $wrong_score = 0;
            foreach ($unique_guesses as $letter) {
                if (!in_array($letter, $word_letters)) {
                    $wrong_score += 1;
                }
            }
            return $wrong_score;
        }

        function isLastGuessADuplicate()
        {
            $guessed_letters_count = count($this->guessed_letters);
            if ($guessed_letters_count < 2) {
                return false;
            } else {
                $last_letter = $this->guessed_letters[$guessed_letters_count - 1];
                $counts = array_count_values($this->guessed_letters);
                return $counts[$last_letter] > 1;
            }
        }

        function didIWin()
        {
            $word_letters = str_split($this->word_to_guess);
            return !array_diff($word_letters, $this->guessed_letters);
        }

        function didILose()
        {
            return $this->wrongGuessCount() >= $this->max_wrong_guess_count;
        }

        function save() {
            $_SESSION[HANGMAN_SESSION_KEY] = $this;
        }

        static function restore() {
            return $_SESSION[HANGMAN_SESSION_KEY];
        }
    }
?>
