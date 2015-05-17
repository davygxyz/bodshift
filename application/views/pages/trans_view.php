<!--Body Progress Page -->
<div class='small-12 columns'><div class="title text-centered"><h3>Body Progress</h3></div></div>
<?php 
	//conditional to see if either query is false.
	if($progress_pictures == FALSE || $before_pic == FALSE){
		//Messaged displayed to the viewer, that the user does not have any progress or before pictures.
			echo "<div class='small-12 columns text-centered'><p>User has not entered in any information at this time.</p></div>";
	}else{
?>
<div class='small-12 columns' id='trans-scroll'>
	<div class='slider'>
	    <div id='left1' class='left'>&lt;</div>
	    <div id='right1' class='right'>&gt;</div>
	    <div class='track' id='track1'>
	<?php 
		foreach ($before_pic as $result) {
			echo "
					<div class='progress-pic'>
						<div class='small-12 columns text-centered'>Before Picture</div>
			        	<img src='".base_url()."/uploads/transformations/".$result->before_pic."'/>
						<div class='small-12 columns text-centered'>Weight: ".$result->before_weight."</div>
						<div class='small-12 columns text-centered'>Date: ".$result->before_date."</div>
			        </div>
			";
		}
		foreach($progress_pictures as $result){
			if($user_id != $other_user_id){
				$links = '';
			}else{
			$links = "<div class='small-12 columns text-centered'><a href='#'>Update</a> | <a href='#'>Delete</a></div>";
			};
			echo "
			        <div class='progress-pic' style='margin-top:24px'>
			        	 <img src='".base_url()."/uploads/transformations/".$result->after_pic."'/>
						<div class='small-12 columns text-centered'>Weight: ".$result->after_weight."</div>
						<div class='small-12 columns text-centered'>Date: ".$result->after_date."</div>"
						.$links."
			        </div>
				";
		}
	?>
		</div>
	</div>
</div>
<?php }?>

<div class='small-12 columns'><a href=''>Upload Progress Photo</a></div>
<div class='small-12 columns'><a href='<? echo base_url()?>index.php/profile?user_id=<?php echo $other_user_id ?>' class="button expand">Back to Profile</a></div>
