<!DOCTYPE html>
<?= $this->extend('Templates/Base') ?>

<?= $this->section('content') ?>

<div id="outermostDiv">
	<div>
		<div class="row">
			<div class="col">
			<div id="createTwitCard" class="card createATwit">
				<h3>Write a Twit</h3>
				<h6 id="username"><?php echo $user['username']; ?></h6>
				<label for="tweet">Your thoughts:</label>
				<textarea rows="3" class="form-control" placeholder="Your Twit Here" id="twit" type="text"></textarea>
				<button id="create" class="btn btn-primary">Create Twit</button>
			</div>
			</div>
		<div>
		</div>
		</div>
		<div class="row">
		<div class="col">

		<?php 
                
                $servername = "localhost";
                $username = "chagen";
                $password = "01695008";
                $dbname = "chagen";
                
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
				
				/**
				 * Query and loop to select all columns from Tweeter database
				 * 
				 * while loop then echos each row and displays it 
				 * @return rows
				 */
                $sql = "SELECT tweetNum,username,tweet FROM Tweeter ORDER BY tweetNum DESC";
                $result = $conn->query($sql);
                $data = array();
				
                while($row = $result->fetch_assoc()) {
                    echo '<div class="tweet">' .'<h3> @' . $row['username'] . '</h3>'. '<br> <p>'. $row['tweet'].'<p></div> <br>';
                }
                $conn->close();
                    
                //foreach ($tweet as $item) {
                    //echo '<div class="tweet">' .'<h3>' . $tweet[0] . '</h3>'. '<br> <p>'. $tweet[1].'<p></div> <br>';
                    //}
                ?>        
		<?php if (isset($providers)): ?>
			</div>
			<div class="row">
			<div class="col-sm-4">
				<b><?= lang('Account.homeLabelSocial') ?></b>
			</div>
			<div class="col-sm-8">
				<?php foreach ($providers as $provider => $state): ?>
					<?php if ($state): ?>
						<?= $provider ?> <br />
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>
<?= $this->endSection() ?>
