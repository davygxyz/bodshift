  <div class='row margin-btm-20' id='update-transformation'>
	<div class='title text-centered'><h3>Update Transformation</h3></div>

	<div class='small-12 columns margin-btm-20' id='update-text'>
		You are able to change your <span>Before Picture</span> information here. To change your current
		<span>After Picture</span>, click <a href='<?php echo base_url() ?>index.php/transformation/view?user_id=<?php echo $other_user_id ?>'>here</a>.
	</div>

	<div class='small-12 columns' id='update-current'>
		<h4>Current Before Picture</h4>
		<?php 
			if($trans_query != FALSE){
				foreach ($trans_query as $result) {
					echo "
					<div class='small-12 large-6 columns'><img src='".base_url()."uploads/transformations/".$result->before_pic."'/>
						<ul id='current-wd'>
							<li> Weight: ".$result->before_weight."</li>
							<li> Date: ".date('m-d-Y', strtotime($result->before_date))."</li>
						</ul>
					</div>
					";
				}
			}else{
				echo "You do not have a Current Before Picture, please input one.";
			}
		?>
		<div class='small-12 large-6 columns'>
			<?php 
			//Conditional to check if there are any errors from the Form.
			if(validation_errors() != NULL) {
			?>
			<div class= 'alert-box alert radius'><?php echo validation_errors();?></div>
			<?php }  

			if(isset($message)){
				echo $message;
			}
			?>
			<?php echo form_open_multipart(base_url().'index.php/transformation/update?user_id='.$user_id); ?>
				<div class="row">
				    <div class="large-12 columns">
				    	<p style='color:red'>Do not select a photo, if you would like to keep your current picture.</p>
				      <label>Select Photo
				        <input type='file' name='before-pic'/>
				      </label>
				    </div>
				    <div class="large-12 columns">
				      <label>Your Weight
				        <input type='number' name='weight' value="<?php echo $trans_query[0]->before_weight; ?>" maxlength="3"/>
				      </label>
				    </div>
				    <div class="large-12 columns">
				      <label>Date
				        <input type='date' name='date' value="<?php echo $trans_query[0]->before_date; ?>"/>
				      </label>
				    </div>
				    <div class="large-12 columns">
				    	<input type='submit' value='Update' name='update'class="button tiny">
				    </div>
				  </div>
			</form>

		</div>
	</div>
	<div class='small-12 columns'><a href='<? echo base_url()?>/index.php/profile?user_id=<?php echo $other_user_id ?>' class="button expand">Back to Profile</a></div>

</div>
