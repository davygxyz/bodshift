<div class='row' id='video-otw'>
	<div class='title'><h3>Video of the Week</h3></div>
	<div class='row margin-btm-20'>
	<?php
		foreach($video_otw_query as $result){
			echo "
				<div class='small-12 columns'>
				<div class='flex-video'>"
					.$result['content'].
				"</div>
				</div>

			";
		}
	?>
	</div>
</div>

<div class='row' id='all-videos'>
	<div class='title'><h3> All Videos</h3></div>
	<?php foreach ($pagination_result as $result) {
		echo "
			<div class='small-12 large-4 columns'>
				<div class='flex-video'>"
					.$result->content.
				"</div>
				</div>
		";
	}?>
	
		
	<div class=' small-12 columns' id='-video-pagination'>
		<?php echo $links;?>
	</div>
</div>