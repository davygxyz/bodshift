<div class='row'>
	<!--Users Tranformation Photos -->
	<div class='small-12 columns' id='transformation'>
		<?php 
			if($trans_query != FALSE){
				foreach ($trans_query as $result) {
					echo "
					<div class='small-4 columns text-centered' >
						<img src='../uploads/transformations/".$result->before_pic."'/>
						<ul class='trans-info'>
							<li> Weight: ".$result->before_weight."</li>
							<li> Date: ".$result->before_date."</li>
						</ul>
					</div>
					<div class='small-4 columns text-centered' >
					<img src='".base_url()."/assets/img/logo/bodshift-logo.png' alt='logo'/>
					<div class='small-12 columns text-centered' ><a href='".base_url()."index.php/transformation/view?user_id=".$result->user_id."'>View Progress</a></div>
					<div class='small-12 columns text-centered' ><a href='".base_url()."index.php/transformation/update?user_id=".$result->user_id."'>Update Tranformation</a></div>
					</div>
					<div class='small-4 columns text-centered' >
						<img src='../uploads/transformations/".$result->after_pic."'/>
						<ul class='trans-info'>
							<li> Weight: ".$result->after_weight."</li>
							<li> Date: ".$result->after_date."</li>
						</ul>
					</div>

					";
				}
			}else{
				if($other_user_id != $user_id){
				echo "<div class='small-12 columns text-centered' id='trans-message'>".ucfirst($profile_query[0]->first_name).", does not have a transformation at this time.</div>";
				}else{
					echo"<a href='".base_url()."/index.php/create/transformation?user_id=".$user_id."' class='button'>Create Tranformation</a>";
				}
			}
		?>
	</div>
	<!--Users Tranformation Photos END-->

	<!--Users Profile Info -->
	<div class='small-12 large-5 columns'>
		<div class='small-6 columns' id='profile-pic'>
			<h5><?php echo strtoupper($profile_query[0]->user_name)?></h5>
			<img src='<?php echo base_url() ?>/assets/img/content/default-profile-picture.jpg'/>
		</div>

		<div class='small-12 columns' id='profile-info'>
			<ul>
				<li>Name: <?php echo ucfirst($profile_query[0]->first_name)?> <?php echo ucfirst($profile_query[0]->last_name)?></li>
				<li>Email: <?php echo ucfirst($profile_query[0]->email)?></li>
				<li>Age: <?php echo ucfirst($profile_query[0]->age)?></li>
				<li>Height: <?php echo ucfirst($profile_query[0]->height)?></li>
				<li>Weight: <?php echo ucfirst($profile_query[0]->weight)?></li>
				<li>Sex: <?php echo ucfirst($profile_query[0]->sex)?></li>
				<li>Member Since: <?php echo ucfirst($profile_query[0]->created_date)?></li>
			</ul>
		</div>
		<div class='small-12 columns' id='profile-settings'>
			<a href='#'>Edit Profile</a>
		</div>
		<div class='small-12 columns' id='photo-gallery'>
			<a href='#'>Photo Gallery</a>
		</div>
		
	</div>
	<!--Users Profile Info END-->

	<div class='small-12 large-7 columns'>
		<div class='small-12 columns' id='news-feed'>
			<h5>Feed</h5>
			<div class='small-8 columns'>
				<form>
					<input type='text' name='init-comment'/>
				</form>
			</div>
			<div class='small-12 columns'>
				<input type='submit' name='submit' value='submit' class="button tiny"/>
			</div>

			<div class='small-12 columns' id='feed-wrapper'>
				<?php 
				if($comment_query != FALSE){
				foreach ($comment_query as $result) {
					echo "
						<div class='small-12 columns feeds'>
						<div class='small-4 columns'>
							<a href='".base_url()."index.php/profile?user_id=".$result->user_id."'>".$result->user_name."</a>
							<img src='".base_url()."/assets/img/content/default-profile-picture.jpg'/>
						</div>
						<div class='small-8 columns'>
							<div>".$result->date."</div>
							<div>".$result->content."</div>
						</div>
						</div>
					";
				}}else{
					echo "You have no feeds available.";
				}?>
	            
			</div>
		</div>
	</div>
</div>