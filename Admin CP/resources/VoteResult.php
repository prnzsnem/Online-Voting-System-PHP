<!------------------ This section is for shoing the messages------------------->
<div class="blackScreen" id="blackScreen"></div>
<div class="alertMessage" id="msgScrn">
	<div class="oneMore">
		<h3>Message</h3>
		<span class="alertMsg" id="newMsg"></span>
		<div class="userAction">
			<div class="okBtn" onclick="makeChanges(2)"><h4>Register New Election</h4></div>
		</div>		
	</div>
</div>
<div class="electionList" id="electionList">
	<h3>Election List</h3>	
		<div class="allEleList">
			
<?php 
	$listData = $connection -> query("SELECT * FROM elections");
	if (mysqli_num_rows($listData)>0){
		while ($rows = mysqli_fetch_assoc($listData)) {
			$eleImg = $rows['election_icon'];
			$eleType = $rows['election_type'];
			$eleName = $rows['election_name'];
			?>
				<div class="elelistItems" onclick="makeChanges('<?php echo $eleType; ?>')" title="<?php echo $eleType; ?> Election">
			<?php echo'
					<img src="'.$eleImg.'">
					<span>'.$eleName.'</span>
				</div>
			';
		}
	}
?>
		</div>

	<div class="buttonSection" title="Go back to home page" onclick="makeChanges(0)">
		<span>Home</span>
	</div>
</div>
<!-----------------------------FOR SHOWING MESSAGE------------------------------->
<?php 

$natEle = $connection -> query("SELECT * FROM elections WHERE election_type = 'National'");
if (mysqli_num_rows($natEle)>0) {
	while($row = mysqli_fetch_assoc($natEle)) {
		$nat_ele_type = $row['election_type'];
	    $nat_ele_name = $row['election_name'];
	    $nat_ele_start_time = $row['election_start_date'];
	    $nat_ele_end_time = $row['election_end_date'];
	}
}

$genEle = $connection -> query("SELECT * FROM elections WHERE election_type = 'General'");
if (mysqli_num_rows($genEle)>0) {
	while($row = mysqli_fetch_assoc($genEle)) {
		$gen_ele_type = $row['election_type'];
	    $gen_ele_name = $row['election_name'];
	    $gen_ele_start_time = $row['election_start_date'];
	    $gen_ele_end_time = $row['election_end_date'];
	}
}

$ofcEle = $connection -> query("SELECT * FROM elections WHERE election_type = 'Office'");
if (mysqli_num_rows($ofcEle)>0) {
	while($row = mysqli_fetch_assoc($ofcEle)) {
		$ofc_ele_type = $row['election_type'];
	    $ofc_ele_name = $row['election_name'];
	    $ofc_ele_start_time = $row['election_start_date'];
	    $ofc_ele_end_time = $row['election_end_date'];
	}
}

$clzEle = $connection -> query("SELECT * FROM elections WHERE election_type = 'College'");
if (mysqli_num_rows($clzEle)>0) {
	while($row = mysqli_fetch_assoc($clzEle)) {
		$clz_ele_type = $row['election_type'];
	    $clz_ele_name = $row['election_name'];
	    $clz_ele_start_time = $row['election_start_date'];
	    $clz_ele_end_time = $row['election_end_date'];
	}
}

$schEle = $connection -> query("SELECT * FROM elections WHERE election_type = 'School'");
if (mysqli_num_rows($schEle)>0) {
	while($row = mysqli_fetch_assoc($schEle)) {
		$sch_ele_type = $row['election_type'];
	    $sch_ele_name = $row['election_name'];
	    $sch_ele_start_time = $row['election_start_date'];
	    $sch_ele_end_time = $row['election_end_date'];
	}
}

$compEle = $connection -> query("SELECT * FROM elections WHERE election_type = 'Competition'");
if (mysqli_num_rows($compEle)>0) {
	while($row = mysqli_fetch_assoc($compEle)) {
		$comp_ele_type = $row['election_type'];
	    $comp_ele_name = $row['election_name'];
	    $comp_ele_start_time = $row['election_start_date'];
	    $comp_ele_end_time = $row['election_end_date'];
	}
}

$other_Ele = $connection -> query("SELECT * FROM elections WHERE election_type = 'Other'");
if (mysqli_num_rows($other_Ele)>0) {
	while($row = mysqli_fetch_assoc($other_Ele)) {
		$other_ele_type = $row['election_type'];
	    $other__ele_name = $row['election_name'];
	    $other__ele_start_time = $row['election_start_date'];
	    $other__ele_end_time = $row['election_end_date'];
	}
}

$issetCandList = $connection -> query("SELECT * FROM elections");
if (!mysqli_num_rows($issetCandList)>0) {
	echo '<script type="text/javascript">',
			'changeActivity(1,"No any election Registered yet.<br><br><br>&emsp;&emsp;&emsp;&emsp;Would you like to register one?");',
		 '</script>';
}else{ ?>

<div class="labelTitle" id="newDivider">
	<label>|</label>
	<label>Candidate Photo</label>
	<label>|</label>
	<label>Candidate Name</label>
	<label>|</label>
	<label>Party Name</label>
	<label>|</label>
	<label>Vote Symbol</label>
	<label>|</label>
	<label>Total Obtained Votes</label>
	<label>|</label>
</div>

<div class="nationalElectionResult" id="nation">

<?php
if (isset($nat_ele_name)) {
	?>
<div class="natEleseperator" id="divider">
	<label style="color: yellow;">Election Type: </label>
	<label><?php echo $nat_ele_type;?></label>
	<label style="color: yellow;">Election Name: </label>
	<label><?php echo $nat_ele_name; ?></label>
	<label style="color: yellow;">Start Time: </label>
	<label><?php echo $nat_ele_start_time; ?></label>
	<label style="color: yellow;">End Time: </label>
	<label><?php echo $nat_ele_end_time; ?></label>
</div>

<div class="natEleDashBoard" id="dashBoardContent">
	<div class="topContainer">	
<?php 
	$nat_candidate_information = $connection -> query("SELECT * FROM election_candidates WHERE election_type = 'National'");
	if (mysqli_num_rows($nat_candidate_information)>0) {
		while($row = mysqli_fetch_assoc($nat_candidate_information)) {
		    $natCandidateName = $row['cand_name'];
		    $natPartyTitle = $row['party_name'];
		    $natCandPhoto = $row['cand_photo'];
		    $natVoteSign = $row['vote_symbol'];
		    $natObtainVotes = $row['obtained_votes'];

		   echo '		   
				<div class="listLabelTitle" id="newDivider">
					<div class="imgHolder"><img src="'.$natCandPhoto.'"></div>
					<label>'.$natCandidateName.'</label>
					<h4>'.$natPartyTitle.'</h4>
					<div class="imgHolder"><img src="'.$natVoteSign.'"></div>
		   ';
		   if ($natObtainVotes>0) {
		   		echo '<span id="totalPosts">'.$natObtainVotes.'</span>';
		   }else{
		   		echo '<span id="totalPosts" style="color:red;">0</span>';
		   }
		   echo '</div>';
		}
	}
?>
	</div>	
</div>
		<?php
	}
?>
</div>



<div class="generalElectionResult" id="genrl">
<?php 
if (isset($gen_ele_name)) {
	?>
<div class="seperator" id="divider">
	<label style="color: yellow;">Election Type: </label>
	<label><?php echo $gen_ele_type;?></label>
	<label style="color: yellow;">Election Name: </label>
	<label><?php echo $gen_ele_name; ?></label>
	<label style="color: yellow;">Start Time: </label>
	<label><?php echo $gen_ele_start_time; ?></label>
	<label style="color: yellow;">End Time: </label>
	<label><?php echo $gen_ele_end_time; ?></label>
</div>
<div class="dashBoardContent" id="dashBoardContent">
	<div class="topContainer">	

<?php 
	$gen_candidate_information = $connection -> query("SELECT * FROM election_candidates WHERE election_type = 'General'");
	if (mysqli_num_rows($gen_candidate_information)>0) {
		while($row = mysqli_fetch_assoc($gen_candidate_information)) {
		    $candidateName = $row['cand_name'];
		    $partyTitle = $row['party_name'];
		    $candPhoto = $row['cand_photo'];
		    $voteSign = $row['vote_symbol'];
		    $obtainVotes = $row['obtained_votes'];

		   echo '		   
				<div class="listLabelTitle" id="newDivider">
					<div class="imgHolder"><img src="'.$candPhoto.'"></div>
					<label>'.$candidateName.'</label>
					<h4>'.$partyTitle.'</h4>
					<div class="imgHolder"><img src="'.$voteSign.'"></div>
		   ';
		   if ($obtainVotes>0) {
		   		echo '<span id="totalPosts">'.$obtainVotes.'</span>';
		   }else{
		   		echo '<span id="totalPosts" style="color:red;">0</span>';
		   }
		   echo '</div>';
		}
	}

?>
	</div>	
</div>
		<?php
	}
?>
</div>



<div class="officeElectionResult" id="offc">
<?php 
if (isset($ofc_ele_name)) {
	?>
<div class="seperator" id="divider">
	<label style="color: yellow;">Election Type: </label>
	<label><?php echo $ofc_ele_type;?></label>
	<label style="color: yellow;">Election Name: </label>
	<label><?php echo $ofc_ele_name; ?></label>
	<label style="color: yellow;">Start Time: </label>
	<label><?php echo $ofc_ele_start_time; ?></label>
	<label style="color: yellow;">End Time: </label>
	<label><?php echo $ofc_ele_end_time; ?></label>
</div>
<div class="dashBoardContent" id="dashBoardContent">
	<div class="topContainer">	

<?php 

	$ofc_candidate_information = $connection -> query("SELECT * FROM election_candidates WHERE election_type = 'Office'");
	if (mysqli_num_rows($ofc_candidate_information)>0) {
		while($row = mysqli_fetch_assoc($ofc_candidate_information)) {
		    $officeCandidateName = $row['cand_name'];
		    $ofcPartyTitle = $row['party_name'];
		    $ofcCandPhoto = $row['cand_photo'];
		    $ofcVoteSign = $row['vote_symbol'];
		    $ofcObtainVotes = $row['obtained_votes'];

		   echo '		   
				<div class="listLabelTitle" id="newDivider">
					<div class="imgHolder"><img src="'.$ofcCandPhoto.'"></div>
					<label>'.$officeCandidateName.'</label>
					<h4>'.$ofcPartyTitle.'</h4>
					<div class="imgHolder"><img src="'.$ofcVoteSign.'"></div>
		   ';
		   if ($ofcObtainVotes>0) {
		   		echo '<span id="totalPosts">'.$ofcObtainVotes.'</span>';
		   }else{
		   		echo '<span id="totalPosts" style="color:red;">0</span>';
		   }
		   echo '</div>';
		}
	}

?>
	</div>	
</div>
		<?php
	}
?>
</div>



<div class="schoolElectionResult" id="schol">
<?php 
if (isset($sch_ele_name)) {
	?>
<div class="seperator" id="divider">
	<label style="color: yellow;">Election Type: </label>
	<label><?php echo $sch_ele_type;?></label>
	<label style="color: yellow;">Election Name: </label>
	<label><?php echo $sch_ele_name; ?></label>
	<label style="color: yellow;">Start Time: </label>
	<label><?php echo $sch_ele_start_time; ?></label>
	<label style="color: yellow;">End Time: </label>
	<label><?php echo $sch_ele_end_time; ?></label>
</div>
<div class="dashBoardContent" id="dashBoardContent">
	<div class="topContainer">	

<?php 

	$sch_candidate_information = $connection -> query("SELECT * FROM election_candidates WHERE election_type = 'School'");
	if (mysqli_num_rows($sch_candidate_information)>0) {
		while($row = mysqli_fetch_assoc($sch_candidate_information)) {
		    $schCandidateName = $row['cand_name'];
		    $schPartyTitle = $row['party_name'];
		    $schCandPhoto = $row['cand_photo'];
		    $schVoteSign = $row['vote_symbol'];
		    $schObtainVotes = $row['obtained_votes'];

		   echo '		   
				<div class="listLabelTitle" id="newDivider">
					<div class="imgHolder"><img src="'.$schCandPhoto.'"></div>
					<label>'.$schCandidateName.'</label>
					<h4>'.$schPartyTitle.'</h4>
					<div class="imgHolder"><img src="'.$schVoteSign.'"></div>
		   ';
		   if ($schObtainVotes>0) {
		   		echo '<span id="totalPosts">'.$schObtainVotes.'</span>';
		   }else{
		   		echo '<span id="totalPosts" style="color:red;">0</span>';
		   }
		   echo '</div>';
		}
	}

?>
	</div>	
</div>
		<?php
	}
?>
</div>



<div class="compElectionResult" id="comp">
<?php 
if (isset($comp_ele_name)) {
	?>
<div class="seperator" id="divider">
	<label style="color: yellow;">Election Type: </label>
	<label><?php echo $comp_ele_type;?></label>
	<label style="color: yellow;">Election Name: </label>
	<label><?php echo $comp_ele_name; ?></label>
	<label style="color: yellow;">Start Time: </label>
	<label><?php echo $comp_ele_start_time; ?></label>
	<label style="color: yellow;">End Time: </label>
	<label><?php echo $comp_ele_end_time; ?></label>
</div>
<div class="dashBoardContent" id="dashBoardContent">
	<div class="topContainer">	

<?php 

	$comp_candidate_information = $connection -> query("SELECT * FROM election_candidates WHERE election_type = 'Competition'");
	if (mysqli_num_rows($comp_candidate_information)>0) {
		while($row = mysqli_fetch_assoc($comp_candidate_information)) {
		    $compCandidateName = $row['cand_name'];
		    $compPartyTitle = $row['party_name'];
		    $compCandPhoto = $row['cand_photo'];
		    $compVoteSign = $row['vote_symbol'];
		    $compObtainVotes = $row['obtained_votes'];

		   echo '		   
				<div class="listLabelTitle" id="newDivider">
					<div class="imgHolder"><img src="'.$compCandPhoto.'"></div>
					<label>'.$compCandidateName.'</label>
					<h4>'.$compPartyTitle.'</h4>
					<div class="imgHolder"><img src="'.$compVoteSign.'"></div>
		   ';
		   if ($compObtainVotes>0) {
		   		echo '<span id="totalPosts">'.$compObtainVotes.'</span>';
		   }else{
		   		echo '<span id="totalPosts" style="color:red;">0</span>';
		   }
		   echo '</div>';
		}
	}

?>
	</div>	
</div>
		<?php
	}

?>
</div>




<div class="clzElectionResult" id="clz">
<?php 

if (isset($clz_ele_name)) {
	?>

<div class="seperator" id="divider">
	<label style="color: yellow;">Election Type: </label>
	<label><?php echo $clz_ele_type;?></label>
	<label style="color: yellow;">Election Name: </label>
	<label><?php echo $clz_ele_name; ?></label>
	<label style="color: yellow;">Start Time: </label>
	<label><?php echo $clz_ele_start_time; ?></label>
	<label style="color: yellow;">End Time: </label>
	<label><?php echo $clz_ele_end_time; ?></label>
</div>
<div class="dashBoardContent" id="dashBoardContent">
	<div class="topContainer">	

<?php 

	$clz_candidate_information = $connection -> query("SELECT * FROM election_candidates WHERE election_type = 'College'");
	if (mysqli_num_rows($clz_candidate_information)>0) {
		while($row = mysqli_fetch_assoc($clz_candidate_information)) {
		    $clzCandidateName = $row['cand_name'];
		    $clzPartyTitle = $row['party_name'];
		    $clzCandPhoto = $row['cand_photo'];
		    $clzVoteSign = $row['vote_symbol'];
		    $clzObtainVotes = $row['obtained_votes'];

		   echo '		   
				<div class="listLabelTitle" id="newDivider">
					<div class="imgHolder"><img src="'.$clzCandPhoto.'"></div>
					<label>'.$clzCandidateName.'</label>
					<h4>'.$clzPartyTitle.'</h4>
					<div class="imgHolder"><img src="'.$clzVoteSign.'"></div>
		   ';
		   if ($clzObtainVotes>0) {
		   		echo '<span id="totalPosts">'.$clzObtainVotes.'</span>';
		   }else{
		   		echo '<span id="totalPosts" style="color:red;">0</span>';
		   }
		   echo '</div>';
		}
	}

?>
	</div>	
</div>
		<?php
	}
}// This last curly braces ends the program here
?>
</div>
<br><br>