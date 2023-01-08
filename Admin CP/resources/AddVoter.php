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

<script type="text/javascript">
	$(document).ready(function(){
	$("#electiontype").change(function(){
		switch($(this).val()){
			case 'National':	
				$("#citzNum").css("display", "block");
				$("#colzID").css("display", "none");
				$("#schID").css("display", "none");
				$("#vPwd").css("display", "none");
				$("#ofcID").css("display", "none");
				$('#newSeperator').css("margin-left", "38px");
				$('#inputField').css("margin-left", "36px");
				break;
			case 'General': case 'Other':
				$("#citzNum").css("display", "none");
				$("#colzID").css("display", "none");
				$("#schID").css("display", "none");
				$("#vPwd").css("display", "block");
				$("#ofcID").css("display", "none");
				$('#newpwSeperator').css("margin-left", "44px");
				$('#pwInput').css("margin-left", "36px");
				break;
			case 'College':
				$("#citzNum").css("display", "none");
				$("#colzID").css("display", "block");
				$("#schID").css("display", "none");
				$("#vPwd").css("display", "none");
				$("#ofcID").css("display", "none");
				$('#cidSep').css("margin-left", "74px");
				$('#cidInp').css("margin-left", "36px");
				break;		
			case 'School':
				$("#citzNum").css("display", "none");
				$("#colzID").css("display", "none");
				$("#schID").css("display", "block");
				$("#vPwd").css("display", "none");
				$("#ofcID").css("display", "none");
				$('#schSep').css("margin-left", "80px");
				$('#schoolID').css("margin-left", "36px");
				break;		
			case 'Office':
				$("#citzNum").css("display", "none");
				$("#colzID").css("display", "none");
				$("#schID").css("display", "none");
				$("#vPwd").css("display", "none");
				$("#ofcID").css("display", "block");
				$('#ofcSep').css("margin-left", "80px");
				$('#ofcInp').css("margin-left", "36px");
				break;	
		}
	});
});
</script>

</head>
<body>	
	<div class="seperator">Insert Voter Detail Information</div>

	<form class="OuterLayer" action="./Validator/AddVoterValidator.php" method="post" enctype="multipart/form-data">
		
		<div class="newElectionInputForm">

			<div class="leftPart">
				<span>Voter information</span>
			</div>

			<div class="middlePart">
			
				<div class="electionFields">
					<label id="newElectionInputFields">First Name</label><span id="colonSeperator">:</span><input type="text" name="voterFN" required placeholder="Voter First Name" maxlength="14" title="Voter First Name">
				</div>
				<div class="electionFields">
					<label id="newElectionInputFields">Middle Name</label><span id="colonSeperator">:</span><input type="text" name="voterMN" placeholder="Voter middle Name if any" maxlength="14" title="Voter middle name">
				</div>
				<div class="electionFields">
					<label id="newElectionInputFields">Last Name</label><span id="colonSeperator">:</span><input type="text" name="voterLN" required placeholder="Voter Last Name" maxlength="14" title="Voter Last Name">
				</div>
				<div class="electionFields">
					<label id="newElectionInputFields">Choose Election Type</label><span id="colonSeperator">:</span>
					<select name="electionType" id="electiontype" required>						
						<?php 
							$eleTypeSel = $connection -> query("SELECT * FROM elections");
							if (mysqli_num_rows($eleTypeSel)>0) {
								echo '<option value="">----Select Election Type----</option>';
								while ($eleData = mysqli_fetch_assoc($eleTypeSel)) {
									$eleType = $eleData['election_type'];
									echo '<option value="'.$eleType.'">'.$eleType.'</option>';
								}
							}
						?>
					</select>
				</div>
				<div class="electionFields">
					<label id="newElectionInputFields">Choose Election Name</label><span id="colonSeperator">:</span>
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
				<div class="electionFields" id="citzNum">
					<label id="newElectionInputFields">Citizenship Number</label><span id="newSeperator">:</span><input type="text" name="vCitzNum" placeholder="Voter Citizenship Certificate Number" maxlength="14" title="Voter Citizenship certificate Number" id="inputField">
				</div>
				<div class="electionFields" id="colzID">
					<label id="newElectionInputFields">College ID No.</label><span id="cidSep">:</span><input type="text" name="vColzIDNo" placeholder="Voter College ID Number" maxlength="14" title="Voter College ID Number" id="cidInp">
				</div>
				<div class="electionFields" id="schID">
					<label id="newElectionInputFields">School ID No.</label><span id="schSep">:</span><input type="text" name="vSchID" placeholder="Voter School ID Number" maxlength="14" title="Voter School ID Number" id="schoolID">
				</div>
				<div class="electionFields" id="ofcID">
					<label id="newElectionInputFields">Office ID No.</label><span id="ofcSep">:</span><input type="text" name="vOfcID" placeholder="Voter Office ID Number" maxlength="14" title="Voter Office ID Number" id="ofcInp">
				</div>
				<div class="electionFields">
					<label id="newElectionInputFields">Gender</label><span id="colonSeperator">:</span>
					<select id="genderSel" name="gender" title="Voter gender">
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						<option value="Other">Other</option>
						<option value="N/A">Better not to specify</option>
					</select>
				</div>
				<div class="electionFields">
					<label id="newElectionInputFields">Age</label><span id="colonSeperator">:</span><input type="text" name="voterAge" id="voterAge" placeholder="Voter current Age" max="100" title="Voter current Age">
				</div>
				<div class="electionFields">
					<label id="newElectionInputFields">Address</label><span id="colonSeperator">:</span><input type="text" name="voterAddress" id="updateAddress" placeholder="Voter Birth Place Address" title="Voter Birth Place Address">
				</div>
				<div class="electionFields" id="vPwd">
					<label id="newElectionInputFields">Confirm Password</label><span id="newpwSeperator">:</span><input type="password" name="conformationPassword" placeholder="Confirm your password" title="Confirm your password" id="pwInput">
				</div>
			</div>
			<div class="rightPart">
				  <div id="uploadCandImg" title="Click here to add Voter picture">
				  	<img src="./../Uploads/user_images/user.jpg" id="candImg">
				  	<input type="file" name="userImg">
				  	<span id="uploadLink">Upload Voter image</span>
				  </div><br>
			</div>
		</div>
			<button type="submit" name="addVoter" id="addNewVoterBtn">Add Voter</button>
	</form>
</body>
</html>