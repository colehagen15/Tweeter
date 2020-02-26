<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Tweeter extends BaseController
{
        /**
         * Example dblock 
         * 
         * @return JSON HTML View
         */

        /**
         * createPost()
         * Takes in username and tweet
         * Stores the tweet in the Tweeter database to be displayed later
         * 
         */
        public function createPost() {
                                
                $tweet = $_POST['twit'];
                $tweeterUser = $_POST['username'];
                $data = [
                        'tweet' => $tweet,
                        'username' => $tweeterUser
                ];

                $this->userModel->insert($data);
        }
        

        public function comments()
        {
                echo 'Look at this!';
        }
}
