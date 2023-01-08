// From here it starts user dashboard
function onscrl() {
	    if (document.body.scrollTop < 50 || document.documentElement.scrollTop < 50) {
			document.getElementById("newDivider").style.position = "relative";
			document.getElementById("newDivider").style.width = "98%";	
			document.getElementById("newDivider").style.marginTop = "0px";
	    }
	    if (document.body.scrollTop > 90 || document.documentElement.scrollTop > 90) {
			document.getElementById("newDivider").style.position = "fixed";	
			document.getElementById("newDivider").style.width = "78.4%";	
			document.getElementById("newDivider").style.marginTop = "-76px";
	    }
}

function makeChanges(option) {

	var mainTitle = ("Online Voting System");
	var changeTitle = document.getElementById("divider");
	var changeMainTitle = document.getElementById("pageTitle");
	var one = document.getElementById("dashBoardContent");
	var notify = document.getElementById("notificationpage");
	var two = document.getElementById("profilesetting");
	var three = document.getElementById("createNewElection");
	var four = document.getElementById("addNewCandidate");
	var five = document.getElementById("addVoter");
	var six = document.getElementById("voteResult");

	var nat = document.getElementById("nation");
	var gen = document.getElementById("genrl");
	var offic = document.getElementById("offc");
	var scool = document.getElementById("schol");
	var compe = document.getElementById("comp");
	var collz = document.getElementById("clz");
	var resu = "Election Results"

	if (option == 0) { location.reload(); 
	document.getElementById("msgScrn").style.display = "none";	
	document.getElementById("blackScreen").style.display = "none";} 
	else if (option == 1) { displayProfile(mainTitle+" | Admin Profile"); }
	else if (option == 2) { createNewElection(mainTitle+" | Create New election"); }
	else if (option == 3) { addNewCandidate(mainTitle+" | Add New Candidate"); }
	else if (option == 4) { displayAddVoter(mainTitle+" | Add new voter"); }
	else if (option == 5) { showVoteResult(mainTitle+" | Displaying Vote Result"); }
	else if (option == 6) { displayNotification(mainTitle+" | Notifications"); }
	else if (option == 99) { removeTitleLabel(mainTitle+" | No Result to display"); }
	else if (option == "Competition") { showCompetition(mainTitle+" | Competition "+resu); }
	else if (option == "National") { showNational(mainTitle+" | National "+resu); }
	else if (option == "General") { showGeneral(mainTitle+" | General "+resu); }
	else if (option == "College") { showCollege(mainTitle+" | College "+resu); }
	else if (option == "School") { showSchool(mainTitle+" | School "+resu); }
	else if (option == "Office") { showOffice(mainTitle+" | Office "+resu); }
	else if (option == "Other") { showOther(mainTitle+" | Other "+resu); }

function displayNotification(title) {
	one.style.display = "none"; 
	two.style.display = "none";
	three.style.display = "none";
	four.style.display = "none";
	five.style.display = "none";
	six.style.display = "none";
	changeTitle.innerHTML = "Notifications";
	changeMainTitle.innerHTML = title;
	notify.style.display = "block";
}

function displayProfile(title) {
	one.style.display = "none";
	notify.style.display = "none";
	three.style.display = "none";
	four.style.display = "none";
	five.style.display = "none";
	six.style.display = "none";
	changeTitle.innerHTML = "My Profile";
	changeMainTitle.innerHTML = title; 
	two.style.display = "block";
}

function createNewElection(title) {
	one.style.display = "none";
	notify.style.display = "none";
	two.style.display = "none";
	four.style.display = "none";
	five.style.display = "none";
	six.style.display = "none";
	changeTitle.innerHTML = "Create New Election";
	changeMainTitle.innerHTML = title; 
	three.style.display = "block";
}

function addNewCandidate(title) {
	one.style.display = "none";
	notify.style.display = "none";
	two.style.display = "none";
	three.style.display = "none";
	five.style.display = "none";
	six.style.display = "none";
	changeTitle.innerHTML = "Add New Candidate";
	changeMainTitle.innerHTML = title; 
	four.style.display = "block";	
}

function displayAddVoter(title) {
	one.style.display = "none";
	notify.style.display = "none";
	two.style.display = "none";
	three.style.display = "none";
	four.style.display = "none"; 
	six.style.display = "none";
	changeTitle.innerHTML = "Add New Voter";
	changeMainTitle.innerHTML = title; 
	five.style.display = "block";
}

function showVoteResult(title) {
	one.style.display = "none";
	notify.style.display = "none";
	two.style.display = "none";
	three.style.display = "none";
	four.style.display = "none";
	five.style.display = "none";
	changeTitle.innerHTML = "Displaying Vote Results";
	changeMainTitle.innerHTML = title; 
	six.style.display = "block";
}

function removeTitleLabel(title) {
	one.style.display = "none";
	notify.style.display = "none";
	two.style.display = "none";
	three.style.display = "none";
	four.style.display = "none";
	five.style.display = "none";
	six.style.display = "none";
	changeTitle.innerHTML = "No Results to display";
	changeMainTitle.innerHTML = title; 
}

function showNational(title) {
	nat.style.display = "block";
	gen.style.display = "none";
	offic.style.display = "none";
	scool.style.display = "none";
	compe.style.display = "none";
	collz.style.display = "none";
	changeTitle.innerHTML = "National Election Results";
	changeMainTitle.innerHTML = title; 
}
function showGeneral(title) {
	nat.style.display = "none";
	gen.style.display = "block";
	offic.style.display = "none";
	scool.style.display = "none";
	compe.style.display = "none";
	collz.style.display = "none";
	changeTitle.innerHTML = "General Election Results";
	changeMainTitle.innerHTML = title; 
}
function showOffice(title) {
	nat.style.display = "none";
	gen.style.display = "none";
	offic.style.display = "block";
	scool.style.display = "none";
	compe.style.display = "none";
	collz.style.display = "none";
	changeTitle.innerHTML = "Office Election Results";
	changeMainTitle.innerHTML = title; 
}
function showSchool(title) {
	nat.style.display = "none";
	gen.style.display = "none";
	offic.style.display = "none";
	scool.style.display = "block";
	compe.style.display = "none";
	collz.style.display = "none";
	changeTitle.innerHTML = "School Election Results";
	changeMainTitle.innerHTML = title; 
}
function showCompetition(title) {
	nat.style.display = "none";
	gen.style.display = "none";
	offic.style.display = "none";
	scool.style.display = "none";
	compe.style.display = "block";
	collz.style.display = "none";
	changeTitle.innerHTML = "Competition Election Results";
	changeMainTitle.innerHTML = title; 
}
function showCollege(title) {
	nat.style.display = "none";
	gen.style.display = "none";
	offic.style.display = "none";
	scool.style.display = "none";
	compe.style.display = "none";
	collz.style.display = "block";
	changeTitle.innerHTML = "College Election Results";
	changeMainTitle.innerHTML = title; 
}
}

function shoNatEleScrn() {
	document.getElementById("shoNatEleScr").style.display = "block";
}

function showProcessResult(result, message) {
	if (result == 1) {
		document.getElementById("alertScreen").style.display = "block";
		document.getElementById("allScreen").style.display = "block";
		document.getElementById("anyMsg").innerHTML = message;
	}else{
		document.getElementById("alertScreen").style.display = "none";	
		document.getElementById("allScreen").style.display = "none";
		window.location.href = "Home.php";
	}
}

function changeActivity(result, message) {
	if (result == 1) {
		document.getElementById("msgScrn").style.display = "block";
		document.getElementById("blackScreen").style.display = "block";
		document.getElementById("newMsg").innerHTML = message;
	}else{
		document.getElementById("msgScrn").style.display = "none";	
		document.getElementById("blackScreen").style.display = "none";		
	}
}

function showNameEditField() {
	document.getElementById("infoUpdateBtn").style.display = "none";
	document.getElementById("infoUpdater").style.display = "block";
	document.getElementById("updateName").disabled = false;
	document.getElementById("updateEmail").disabled = false;
	document.getElementById("genderSelector").disabled = false;
	document.getElementById("updateAge").disabled = false;
	document.getElementById("updateContact").disabled = false;
	document.getElementById("updateAddress").disabled = false;
	document.getElementById("updateTempAddress").disabled = false;
	document.getElementById("updateCity").disabled = false;
	document.getElementById("updateHomeTown").disabled = false;

	document.getElementById("updateName").style.border = "1px solid green";
	document.getElementById("updateEmail").style.border = "1px solid green";
	document.getElementById("genderSelector").style.border = "1px solid green";
	document.getElementById("updateAge").style.border = "1px solid green";
	document.getElementById("updateContact").style.border = "1px solid green";
	document.getElementById("updateAddress").style.border = "1px solid green";
	document.getElementById("updateTempAddress").style.border = "1px solid green";
	document.getElementById("updateCity").style.border = "1px solid green";
	document.getElementById("updateHomeTown").style.border = "1px solid green";
	document.getElementById("updateInfoField").style.border = "1px solid green";
}
function hideWindow() {
	document.getElementById("changeInfo").style.display = "none";
	// document.getElementById("infoUpdateBtn").style.display = "block";
}

function displayDropDownMenu() {
	document.getElementById("userDrowdownMenu").style.display = "block";
}
function hideDropDownMenu() {
	document.getElementById("userDrowdownMenu").style.display = "none";
}

function showPostBtn() {
	document.getElementById("usrImg").style.background = "cPP";
	document.getElementById("uploadBtn").style.display = "block";
}

function displayPasswordField() {
	document.getElementById("confirmPassword").style.display = "block";
	document.getElementById("CreateNewElectionBtn").style.display = "none";
}

function showAddCandidate() {
	document.getElementById("addCandidateDetail").style.display = "block";
	document.getElementById("addCandidateBtn").style.display = "none";
}

function showAddVoter() {
	document.getElementById("addCandidateDetail").style.display = "block";
	document.getElementById("addCandidateBtn").style.display = "none";
}

function showEcho() {
	alert("This is now echowing");
}
setTimeOut(function () {
	document.getElementById("uploadMsg").style.display = "none";
}, 4000);