<div class="row">
	<div class="small-12 medium-6 columns small-centered">
			<?php 
			//Conditional to check if there are any errors from the Form.
			if(validation_errors() != NULL) {
			?>
			<div class= 'alert-box alert radius'><?php echo validation_errors();?></div>
			<?php }?>
			<?php
			//Conditional to check if there are any errors from the Query.
			if(isset($error)) {
			?>
			<div class= 'alert-box alert radius'><?php echo $error;?></div>
			<?php }?>
			<?php echo form_open_multipart(base_url().'index.php/signup'); ?>
			<h4>Sign Up</h4>
			<div class="row">
			    <div class="large-12 columns">
			      <label>Username:
			        <input type="text" placeholder="Please enter in your username" value="<?php echo set_value('username'); ?>" name="username"/>
			      </label>
			    </div>
			    <div class="large-12 columns">
			      <label>First Name:
			        <input type="text" placeholder="Please enter in your First Name" value="<?php echo set_value('firstname'); ?>" name="firstname"/>
			      </label>
			    </div>
			    <div class="large-12 columns">
			      <label>Last Name:
			        <input type="text" placeholder="Please enter in your Last Name" value="<?php echo set_value('lastname'); ?>" name="lastname"/>
			      </label>
			    </div>
			    <div class="large-12 columns">
			      <label>Profile Picture:
			        <input type="file" name="profile-pic"/>
			      </label>
			    </div>
			    <div class="large-12 columns">
			      <label>Email:
			        <input type="text" placeholder="Please enter in your Email Address" value="<?php echo set_value('email'); ?>" name="email"/>
			      </label>
			    </div>
			    <div class="large-12 columns">
			      <label>Re-Enter Email:
			        <input type="text" placeholder="Please re-enter in your Email Address" name="re-email"/>
			      </label>
			    </div>
			    <div class="large-12 columns">
			      <label>Password:
			        <input type="password" placeholder="Please enter in your Password" name="password" />
			      </label>
			    </div>
			    <div class="large-12 columns">
			      <label>Re-Enter Password:
			        <input type="password" placeholder="Please re-enter in your Password" name="re-password"/>
			      </label>
			    </div>
			    <div class="large-6 columns">
			      <label>Sex</label>
			      <input type="radio" name="sex" value="m" id="male"><label for="Male">Male</label>
			      <input type="radio" name="sex" value="f" id="female"><label for="Female">Female</label>
			    </div>
			    <div class="large-12 columns">
			      <label>Birth Date:
			        <input type="date"  name="birth-date" />
			      </label>
			    </div>
			    <div class="large-12 columns">
			    	<input type='submit' value='Sign Up' name='signup'class="button small">
				</div>
			</div>
		</form>
	</div>

	
</div>