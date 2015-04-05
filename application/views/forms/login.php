<div class="row">
	<div class="small-12 medium-6 columns small-centered">
			<?php 
			//Conditional to check if there are any errors from the Form.
			if(validation_errors() != NULL) {
			?>
			<div class= 'alert-box alert radius'><?php echo validation_errors(); ?></div>
			<?php }?>
			<?php echo form_open('login'); ?>
			<h4>Login</h4>
			<div class="row">
			    <div class="large-12 columns">
			      <label>Username:
			        <input type="text" placeholder="Please enter in your username" name="username"/>
			      </label>
			      <!--<small class="error">Invalid entry</small>-->
			    </div>
			    <div class="large-12 columns">
			      <label>Password:
			        <input type="password" placeholder="Please enter in your password" name="password" />
			      </label>
			    </div>
			    <div class="large-12 columns">
			    	<input type='submit' value='Submit' name='submit'class="button">
				</div>
			</div>
		</form>
	</div>
</div>