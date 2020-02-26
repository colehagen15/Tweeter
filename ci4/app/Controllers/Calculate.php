<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Calculate extends BaseController
{
        /**
         * Example dblock 
         * 
         * @return JSON HTML View
         */
        
        public function getSession() {

                $firstNum = $this->session->get("num1");
                $secondNum = $this->session->get("num2");
                $operator = $this->session->get("operator");

                //$firstNum = 7;
                //$secondNum = 7;
                //$operator = "+";

                $returnData['num1'] = $firstNum;
                $returnData['num2'] = $secondNum;
                $returnData['operator'] = $operator;

                return json_encode($returnData);
        }
        /**
         * Saves data into session library for user to access later
         * 
         * @return JSON for debugging purposes
         */
        public function saveSession() {
                $num1 = $_POST['firstNum'];
                $num2 = $_POST['secondNum'];
                $operator = $_POST['operator'];

                $userData = [
                        'num1' => $num1,
                        'num2' => $num2,
                        'operator' => $operator
                ];
                $this->session->set("num1", $num1);
                $this->session->set("num2", $num2);
                $this->session->set("operator", $operator);
                //$this->session->set($userData);

                return json_encode($userData);

        }

        /**
         * Takes in AJAX paramaters
         * 
         * @return JSON containing answer, num1, num2, operator 
         */
        public function calculate()
        {
                $num1 = $_POST['firstNum'];
                $num2 = $_POST['secondNum'];
                $operator = $_POST['operator'];


                if ($operator == "+") {
                        $returnData['answer'] = $num1 + $num2;
                }
                elseif ($operator == "-") {
                        $returnData['answer'] = $num1 - $num2;
                }
                elseif ($operator == '/') {
                        $returnData['answer'] = $num1 / $num2;
                }
                elseif ($operator == '*') {
                        $returnData['answer'] = $num1 * $num2;
                }

                $returnData['num1'] = $num1;
                $returnData['num2'] = $num2;
                $returnData['operator'] = $operator;


                return json_encode($returnData);
        }

        public function comments()
        {
                echo 'Look at this!';
        }
}
