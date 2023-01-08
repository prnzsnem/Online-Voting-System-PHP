<?php include_once './../Database/MainDatabase.php'; ?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
	function grantPermission() {
		var voteid = $("#voteid").val();
		var electionid = $("#electionid").val();
		var grantBtn = $("#grantBtn").val();
		$.post("Notification.php", { voteid: voteid, electionid: electionid, grantBtn: grantBtn },
			function(data){
				$('#results').html(data);
				$('#actGraDel')[0].reset();
			});
	}

	function deleteVoter() {
		var voteid = $("#voteid").val();
		var electionid = $("#electionid").val();
		var deleteBtn = $("#deleteBtn").val();
		$.post("Notification.php", { voteid: voteid, electionid: electionid, deleteBtn: deleteBtn },
			function(data){
				$('#results').html(data);
				$('#actGraDel')[0].reset();
			});
	}
</script>

<!------------------ This section is for shoing the messages------------------->
<?php 
$checkPermission = $connection -> query("SELECT * FROM vote_permission WHERE vote_permission = 'No'");
if (!mysqli_num_rows($checkPermission)>0) {
?>
<div class="blackScreen" id="blackScreen"></div>
<div class="newAlertMsg" id="msgScrn">
	<div class="oneMore">
		<h3>Message</h3>
		<span class="alertMsg" id="newMsg"></span>
		<div class="userAction">
			<div class="okBtn" onclick="showProcessResult(0)"><h4>Go back to home page</h4></div>
		</div>		
	</div>
</div>
<?php } ?>
<div class="allScreen" id="allScreen"></div>
<div class="alertMessage" id="alertScreen">
	<div class="oneMore">
		<h3>Message</h3>
		<span class="alertMsg" id="anyMsg"></span>
		<div class="userAction">
			<div class="cancelbtn" onclick="changeActivity(0)"><h4>Okay</h4>
			</div>
		</div>		
	</div>
</div>
<!-----------------------------FOR SHOWING MESSAGE------------------------------->
<?php 

if (isset($_POST['voteid']) AND isset($_POST['electionid']) AND isset($_POST['grantBtn'])) {
	$vid = $_POST['voteid'];
	$eid = $_POST['electionid'];
	 $approve = $connection -> query("UPDATE vote_permission SET vote_permission = 'Yes' WHERE voter_id = '$vid' AND election_id = '$eid'");
	 if ($approve) {
		echo '<script type="text/javascript">',
				'changeActivity(1,"Voter is now approved.");',
			 '</script>';
	 }else{
		echo '<script type="text/javascript">',
				'changeActivity(1,"Sorry! Voter could not be approved due to some technical problem. Please try again later.");',
			 '</script>';
	 }
}else if (isset($_POST['voteid']) AND isset($_POST['electionid']) AND isset($_POST['deleteBtn'])) {
	$vid = $_POST['voteid'];
	$eid = $_POST['electionid'];
	 $deletion = $connection -> query("DELETE FROM vote_permission WHERE voter_id = '$vid' AND election_id = '$eid' AND vote_permission = 'No'");
	 if ($deletion) {
		echo '<script type="text/javascript">',
				'changeActivity(1,"Voter is removed successfully.");',
			 '</script>';
	 }else{
		echo '<script type="text/javascript">',
				'changeActivity(1,"Sorry! Voter could not be removed. Please try again later.");',
			 '</script>';
	 }
}

$checkPermission = $connection -> query("SELECT * FROM vote_permission WHERE vote_permission = 'No'");
if (!mysqli_num_rows($checkPermission)>0) {
	echo '<script type="text/javascript">',
			'changeActivity(1,"You do not have any notifications.");',
		 '</script>';
}else{ ?>

<div class="nextLabelTitle" id="newDivider">
	<label>|</label>
	<label class="dividerImgLabel">Voter Photo</label>
	<label>|</label>
	<label class="dividerNameLabel">Voter Name</label>
	<label>|</label>
	<label class="dividerNameLabel">Election Name</label>
	<label>|</label>
	<label class="dividerStatusLabel">Vote Status</label>
	<label>|</label>
	<label class="dividerEleJoined">Election Joined Date</label>
	<label>|</label>
	<label class="dividerActionButton">Action Buttons</label>
	<label>|</label>
</div>

<?php

	?>
<div id="results">
   <!-- All data will display here  -->
   </div>
<div class="natEleDashBoard" id="dashBoardContent">
	<div class="topContainer">	
<?php 

	while($row = mysqli_fetch_assoc($checkPermission)) {
		$voterID = $row['voter_id'];
	    $voterName = $row['voter_name'];
	    $eleID = $row['election_id'];
	    $electionName = $row['election_name'];
	    $voterPhoto = $row['voter_photo'];
	    $voteStatus = $row['vote_status'];
	    $electionJoin = $row['election_join_date'];

	   echo '
   			<form id="actGraDel" method="post">
				<div class="notificationLists" id="newDivider">
					<input type="hidden" name="voteid" id="voteid" value="'.$voterID.'">
					<input type="hidden" name="electionid" id="electionid" value="'.$eleID.'">
					<div class="photoHolder"><img src="'.$voterPhoto.'"></div>
					<div class="nameLabel">'.$voterName.'</div>
					<label>'.$electionName.'</label>
					<div class="voteStat">'.$voteStatus.'</div>
					<div class="joinDate">'.$electionJoin.'</div>
					<div class="actionButtons">	
						<button type="button" class="grantBtn" id="grantBtn" name="grant" onclick="grantPermission();" value="grant"/><img src="./../Images/icons/shield.png">Allow</button>
						<button type="button" class="deleteBtn" id="deleteBtn" name="delete"onclick="deleteVoter();" value="delete"/><img src="./../Images/icons/delete.png">Delete</button>
					</div>
		   		</div>
			</form>';
	}
?>
	</div>	
</div>
<?php
}
?>
<br><br>