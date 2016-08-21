<div class="d-main">
	<?php
		if(isset($_POST['generate']) && $_POST['generate'] == "Generate"){
			$display_style = $_POST['display_style'];
			$display_title = $_POST['display_title'];
		}
	?>
	<script>
		jQuery(document).ready(function(){
			jQuery(".z_sht_code").each(function(){
				jQuery(this).hover(function(){
				  jQuery(this).select();
				});
				jQuery(this).click(function(){
				  jQuery(this).select();
				});
			});
		});
	</script>
	
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>?page=zengo-gallery" method="post">
		<table style="width:50%;" border="1" class="zengo-table_srcd">
			<tr>
				<th align="left" style="width:30%;">
					<strong>Display Style</strong>
				</th>
				<td style="width:40%;">
					<table class="zengo-table_no">
						<tr>
							<td>
								<input type="radio" id="351" value="pinterest" name="display_style" CHECKED>
								<label for="351">pinterest</label>
							</td>
							<td>
								<input type="radio" id="352" value="normal" name="display_style">
								<label for="352">Normal</label>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<th align="left" style="width:30%;">
					<strong>Display Title</strong>
				</th>
				<td style="width:40%;">
					<table class="zengo-table_no">
						<tr>
							<td>
								<input type="radio" id="true" value="true" name="display_title" CHECKED>
								<label for="true">Yes</label>
							</td>
							<td>
								<input type="radio" id="false" value="false" name="display_title">
								<label for="false">No</label>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3"><input type="submit" name="generate" id="generate" value="Generate" class="zengo-save-btn"></td>
			</tr>
		</table>
	</form>
	<div class="shrt-code">
	<?php
	if(isset($_POST['generate']) && $_POST['generate'] == "Generate"){ ?>
		<h4>Shortcode: <input readonly type="text" id="sht_code" name="sht_code" class="z_sht_code" value="<?php echo '[zengo_gallery display_style=&quot;'.$display_style.'&quot; display_title=&quot;'.$display_title.'&quot;]'; ?>" ></h4>
		<p><strong>NOTE:</strong> Copy this shortcode and paste it to the page where you want to display gallery.</p>
<?php
	}
	?>
	</div>
</div>
