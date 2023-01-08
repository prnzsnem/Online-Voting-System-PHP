<?php 

include_once './../Database/MainDatabase.php';

if (!isset($_SESSION['email'])) {
	header("location:./views/login/login.php");
}

?>

<html>
<head>
	<title>Online Voting System | Create New Election</title>
	<link rel="stylesheet" type="text/css" href="./../Looks/CreateNewElection.css">
</head>
<body>	
	<div class="seperator">Insert Election Detail Information</div>


	<form class="OuterLayer" action="./Validator/NewElectionValidator.php" method="post" enctype="multipart/form-data">
		
		<div class="newElectionInputForm">

			<div class="leftPart">
				<span>Election Details</span>
			</div>

			<div class="middlePart">
				<div class="electionFields">
					<label id="newElectionInputFields">Election Type</label><span id="colonSeperator">:</span>
					<select id="electionTypeSelector" name="electionType">
						<option value="National">National</option>
						<option value="General">General</option>
						<option value="Office">Office</option>
						<option value="College">College</option>
						<option value="School">School</option>
						<option value="Competition">Competition</option>
						<option value="Other">Other</option>
					</select>
				</div>
				<div class="electionFields">
					<label id="newElectionInputFields">Election Name</label><span id="colonSeperator">:</span><input type="text" name="electionName" required placeholder="Insert new Election name">
				</div>
				<div class="electionFields">
					<label id="newElectionInputFields">No.of Candidates</label><span id="colonSeperator">:</span><input type="number" name="noOfCandidates" maxlength="2" required placeholder="Insert No.of Candidates">
				</div>
				<div class="electionFields">
					<label id="newElectionInputFields">Election Start Date</label><span id="colonSeperator">:</span><input type="datetime-local" name="electionStartDate" id="unchangable" required value="2019-09-01T01:10:20.30">
				</div>
				<div class="electionFields">
					<label id="newElectionInputFields">Election End Date</label><span id="colonSeperator">:</span><input type="datetime-local" name="electionEndDate" id="unchangable" required value="2019-09-01T01:10:20.30">
				</div>
			</div>
		</div>		

		<div class="confirmPassword" id="confirmPassword"><br>			
				<div class="electionFields">
					<label id="passwordnewElectionInputFields">* Confirm your password</label><span id="colonSeperator">:</span><input type="password" name="conformationPassword" placeholder="Password" id="confirmPasswordField" required>
				</div>
			<button type="submit" name="createElection" id="addNewElectionBtn">Create Election</button>
		</div>
		<div class="rightPart">
			  <div id="uploadCandImg" title="Click here to add Voter picture">
			  	<img src="./../Uploads/election_image/default_ele_img.png" id="candImg">
			  	<input type="file" name="eleImg">
			  	<span id="uploadLink">Choose Election Icon</span>
			  </div><br>
		</div>
	</form>
	<button onclick="displayPasswordField()" id="CreateNewElectionBtn">Create New Election</button>

</body>
</html>