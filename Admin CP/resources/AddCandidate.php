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
	<div class="seperator">Insert Candidate Detail Information</div>

	<form class="OuterLayer" action="./Validator/AddCandidateValidator.php" method="post" enctype="multipart/form-data">
		
		<div class="newElectionInputForm">

			<div class="leftPart">
				<span>Candidate information</span>
			</div>

			<div class="middlePart">


				<div class="electionFields">
					<label id="newElectionInputFields">Election Type</label><span id="colonSeperator">:</span>
					<select id="electionName" name="electionType">
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
					<label id="newElectionInputFields">Election Name</label><span id="colonSeperator">:</span>
					<select name="electionName" id="electionName" required>						
						<?php 
							$eleNameSel = $connection -> query("SELECT * FROM elections");
							if (mysqli_num_rows($eleNameSel)>0) {
								echo '<option value="">----Select Election Name----</option>';
								while ($eleData = mysqli_fetch_assoc($eleNameSel)) {
									$eleName = $eleData['election_name'];
									echo '<option value="'.$eleName.'">'.$eleName.'</option>';
								}
							}
						?>
					</select>
				</div>
				<div class="electionFields">
					<label id="newElectionInputFields">Party Title</label><span id="colonSeperator">:</span><input type="text" name="partyName" required placeholder="Enter party name" maxlength="40" title="Candidate Party Name">
				</div>
				<div class="electionFields">
					<label id="newElectionInputFields">First Name</label><span id="colonSeperator">:</span><input type="text" name="candFN" required placeholder="Candidate First Name" maxlength="20" title="Candidate First Name">
				</div>
				<div class="electionFields">
					<label id="newElectionInputFields">Middle Name</label><span id="colonSeperator">:</span><input type="text" name="candMN" placeholder="Candidate middle Name if any" maxlength="20" title="Candidate middle name">
				</div>
				<div class="electionFields">
					<label id="newElectionInputFields">Last Name</label><span id="colonSeperator">:</span><input type="text" name="candLN" required placeholder="Candidate Last Name" maxlength="20" title="Candidate Last Name">
				</div>
				<div class="electionFields">
					<label id="newElectionInputFields">Gender</label><span id="colonSeperator">:</span>
					<select id="electionName" name="gender" title="Candidate gender">
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						<option value="Other">Other</option>
						<option value="N/A">Better not to specify</option>
					</select>
				</div>
				<div class="electionFields">
					<label id="newElectionInputFields">Age</label><span id="colonSeperator">:</span><input type="text" name="candAge" id="candAge" placeholder="Candidate current Age" max="100" title="Candidate current Age">
				</div>
				<div class="electionFields">
					<label id="newElectionInputFields">Address of Birth Place</label><span id="colonSeperator">:</span><input type="text" name="candAddress" id="updateAddress" placeholder="Candidate Birth Place Address" title="Candidate Birth Place Address">
				</div>
			</div>
			<div class="rightPart">
				  <input type="hidden" name="MAX_FILE_SIZE" value="99999999" />
				  <div id="uploadCandImg" title="Click here to add candidate picture">
				  	<img src="./../Uploads/user_images/user.jpg" id="candImg">
				  	<input type="file" name="candidateImage">
				  	<span id="uploadLink">Upload candidate image</span>
				  </div><br>

				  <input type="hidden" name="MAX_FILE_SIZE" value="99999999" />
				  <div id="uploadPartyLogo" title="Click here to add vote symbol">
				  	<img src="./../Uploads/party_logo/vote_stamp.png" id="candImg">
				  	<input type="file" name="partySymbol">
				  	<span id="uploadLink">Upload vote symbol</span>
				  </div>
			</div>
		</div>
		<div class="addCandidateDetail" id="addCandidateDetail"><br>			
				<div class="electionFields">
					<label id="passwordnewElectionInputFields">* Confirm your password</label><span id="colonSeperator">:</span><input type="password" name="conformationPassword" placeholder="Password" id="confirmPasswordField" required>
				</div>
			<button type="submit" name="addCandidate" id="addNewElectionBtn">Add Candidate</button>
		</div>
	</form>
	<button onclick="showAddCandidate()" id="addCandidateBtn">Add New Candidate</button>

</body>
</html>