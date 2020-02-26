<?php namespace App\Models;

use CodeIgniter\Model;

    class UserModel extends Model
        {
            protected $table    = 'Tweeter';
            protected $primaryKey = 'tweetNum';
            protected $allowedFields = ['username', 'tweet'];

        }