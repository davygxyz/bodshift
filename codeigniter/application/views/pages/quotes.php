<div class='row' id='quot-otd'>
	<div class='title'><h3>Quote of the Week</h3></div>
	<div class='row margin-btm-20'>
	<?php
		foreach($quote_otw_query as $result){
			echo "
				<div class='small-12 columns' id='qotw'>
					<img src='".base_url()."/uploads/quotes/".$result['content']."'/>
				</div>

			";
		}
	?>
	</div>
</div>

<div class='row' id='all-quotes'>
	<div class='title'><h3> All Quotes</h3></div>
	<?php foreach ($pagination_result as $result) {
		echo "
			<div class='small-4 columns all-quotes'>
			<img src='".base_url()."/uploads/quotes/".$result->content."'/>
			</div>

		";
	}?>
	
		
	<div class=' small-12 columns' id='-quote-pagination'>
		<?php echo $links;?>
	</div>
</div>


