<!--Featured Transformation-->
<div class="row margin-btm-20" id='featured-transformation'>
	<div class='title'><h3>Featured Transformation</h3></div>
	<div class='row' id='ft-wrapper'>
		<div class='small-6 columns'>
			<div class='ba-title'><h5>Before</h5></div>
			<img src="<?php echo base_url();?>/uploads/transformations/trans-1.png"/>
		</div>
		<div class='small-6 columns'>
			<div class='ba-title'><h5>After</h5></div>
			<img src="<?php echo base_url();?>/uploads/transformations/trans-2.png"/>
		</div>
	</div>
	<div class='small-12 columns' id='ft-info'>
		<h4>~Meet Janet Cost~</h4>
		<h5>Story</h5>
		<div id='ft-content'>
			<p> 
				Lorem ipsum dolor sit amet, consectetur adipiscing elit.
			 Donec et fringilla lacus. Aliquam bibendum scelerisque dolor ac venenatis. 
			 Quisque imperdiet convallis nisi. Pellentesque nec diam ex. Duis mattis rhoncus 
			 eros ut rhoncus. Etiam odio turpis, commodo sed posuere sit amet, pretium sit amet nunc. 
			 Praesent hendrerit, neque et bibendum finibus, nulla erat venenatis risus, 
			 vel posuere nunc libero quis lorem. Donec at nisl suscipit, accumsan ipsum nec, sollicitudin 
			 tortor. Nullam fermentum ipsum et ante gravida convallis. Nam vehicula quam eu elementum tempus.
			  Maecenas porta lobortis ipsum, ac elementum arcu molestie sit amet. Integer tempor turpis risus.
			  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
			 Donec et fringilla lacus. Aliquam bibendum scelerisque dolor ac venenatis. 
			 Quisque imperdiet convallis nisi. Pellentesque nec diam ex. Duis mattis rhoncus 
			 eros ut rhoncus. Etiam odio turpis, commodo sed posuere sit amet, pretium sit amet nunc. 
			 Praesent hendrerit, neque et bibendum finibus, nulla erat venenatis risus, 
			 vel posuere nunc libero quis lorem. Donec at nisl suscipit, accumsan ipsum nec, sollicitudin 
			 tortor. Nullam fermentum ipsum et ante gravida convallis. Nam vehicula quam eu elementum tempus.
			  Maecenas porta lobortis ipsum, ac elementum arcu molestie sit amet. Integer tempor turpis risus.
			</p>
		</div>
		<a href="#" class="button">View Profile</a>
	</div>
</div>
<!--Featured Transformation END-->



<!--Transformations-->
<div class='row margin-btm-20' id='transformations'>
	<div class='title'><h3>Transformations</h3></div>
	<div class='row' id='transformation-wrapper'>

		<?php foreach($transformations_query as $result){
			echo "
				<div class='small-12 large-4 columns'>
					<div class='small-6 columns padding-0'>
						<div class='ba-title'><h5>Before</h5></div>
						<img src='../uploads/transformations/".$result['before_pic']."'/>
						<div class='ba-date'><p>".$result['before_date']."</p></div>
					</div>
					<div class='small-6 columns padding-0'>
						<div class='ba-title'><h5>After</h5></div>
						<img src='../uploads/transformations/".$result['after_pic']."'/>
						<div class='ba-date'><p>".$result['after_date']."</p></div>
					</div>
					<div class='small-12 columns vp-button'><a href='profile?user_id=".$result['user_id']."'>View Profile</a></div>
				</div>
			";
		}?>
	</div>
	<div class='small-12 columns sec-link'><a href='transformations'>More Transformations</a></div>
</div>
<!--Transformations END-->


<!--Motivation-->
<div class='row margin-btm-20' id='Motivation'>
	<div class='title'><h3>Motivation</h3></div>
	<!--Videos-->
	<div class='row' id='videos'>
		<div class='small-12 columns'><h4>Videos</h4></div>
		<?php foreach($videos_query as $result){
			echo "
				<div class='small-12 large-4 columns'>
				<div class='flex-video'>"
					.$result['content'].
				"</div>
				</div>
			";
		}?>
		<div class='small-12 columns sec-link'><a href='videos'>More Videos</a></div>
	</div>
	<!--Videos End-->
	<!--Quotes-->
	<div class='row' id='quotes'>
		<div class='row' id='quote-wrapper'>
			<div class='small-12 columns'><h4>Quotes</h4></div>
				<?php foreach($quotes_query as $result){
					echo "
						<div class='small-12 large-4 columns'>
							<img src='".base_url()."/uploads/quotes/".$result['content']."'/>
						</div>
					";
				}?>
		</div>
		<div class='small-12 columns sec-link'><a href='<?php echo base_url() ?>/index.php/quotes'>More Quotes</a></div>
	</div>
	<!--Quotes END-->
</div>
<!--Motivation END-->