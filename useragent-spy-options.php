<!--Options file for UserAgent Spy-->
<form method="post" action="options.php">
	<?php 
	 wp_nonce_field('update-options');
$uasize = get_option('uaspy_size');
$location = get_option('uaspy_location');
$surfing = get_option('uaspy_surfing');
$on = get_option('uaspy_on');
$uabool = get_option('uaspy_uabool');
$uatext = get_option('uaspy_show_text');
$uatracksize = get_option('uaspy_track_size');
	?>
			<table>
				<tr>
					<td><strong>Browser/OS icon size in comments:</strong>
					</td>
					<td><select name="uaspy_size">
							<option value="24" text="24" <?php if($uasize==24) echo 'selected="selected"' ?>>24</option>
							<option value="16" text="16" <?php if($uasize==16) echo 'selected="selected"' ?>>16</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><strong>Icon size in trackbacks:</strong>
					</td>
					<td><select name="uaspy_track_size">
							<option value="24" text="24" <?php if($uatracksize==24) echo 'selected="selected"' ?>>24</option>
							<option value="16" text="16" <?php if($uatracksize==16) echo 'selected="selected"' ?>>16</option>
						</select>
					</td>
				</tr>
		
					  <tr>
					  	<td><strong>Text and icons, or icons only:</strong>
						</td>
					<td>
						<select name="uaspy_show_text">
							<option value="1" text="Icons and text" <?php if($uatext==1) echo 'selected="selected"' ?>>Icons and text</option>
							<option value="0" text="Icons only" <?php if($uatext==0) echo 'selected="selected"' ?>>Icons only</option>						
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2"><strong>Display text</strong>
					You can change the text between the Web Browser and the Operative System in the following options.<br/>
					<small>
						<strong>Current: </strong>
						<?php if($uatext==0){
								echo "Icons only";
							}else{
								if($surfing==""){echo "Using ";}
								else{echo $surfing;}
							?> Firefox <?php if($on==""){echo "on ";}else{echo $on;} ?> GNU/Linux.
						<?php } ?>
					</small></td>
				</tr>
				<tr>
					<td><strong>Word for "Surfing"</strong>
					</td>
					<td><input type="text" name="uaspy_surfing" value="<?php echo $surfing; ?>">
					</td>
				</tr>
				<tr>
					<td><strong>Word for "on"</strong>
					</td>
					<td><input type="text" name="uaspy_on" value="<?php echo $on; ?>">
					</td>
				</tr>
				<tr>
					<td><strong>Display complete User-Agent string:</strong>
					</td>
					<td><select name="uaspy_uabool">
							<option 
								value="true" text="True"
								<?php if($uabool=="true") echo 'selected="selected"' ?>
								>True
							</option>
							<option 
								value="false" text="False"
								<?php if($uabool=="false") echo 'selected="selected"' ?>
								>False
							</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><strong>UserSpy Location:</strong></td>
					<td><select name="uaspy_location">
							<option 
								value="before" text="Before comment text" 
								<?php if($location=="before") echo 'selected="selected"' ?>
								>Before comment text
							</option>
							<option 
								value="after" text="After comment text"
								<?php if($location=="after") echo 'selected="selected"' ?>
								>After comment text
							</option>
							<option 
								value="custom" text="Custom"
								<?php if($location=="custom") echo 'selected="selected"' ?>
								>Custom (Advanced)
							</option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2"><small><strong>UserSpy location usage:</strong> There are 3 options so far for you to display the commenter's Browser and O.S. with
					UserAgent-Spy.<br />
					<strong>1 - Before the comment text.</strong> User's WebBrowser and OS will be displayed before comment text.<br/>
					<strong>2 - After the comment text.</strong>User's WebBrowser and OS will be displayed after comment text.<br/>
					<strong>3 - Custom (Advanced). </strong>You can specify the location using the useragent_spy_custom() function
					inside the comments loop in your template (Generally in comments.php).<br/>
					Example:<br/>
						&lt;?php foreach ($comments as $comment) : ?&gt;<br/>
						&lt;cite&gt;&lt;?php comment_author_link() ?&gt;&lt;/cite&gt; <strong>&lt;?php useragent_spy_custom(); ?&gt;</strong> says:&lt;br /&gt;<br/>
						&lt;?php comment_text() ?&gt;
					<br/>
					<strong>CAUTION:</strong> If you select "Custom" and don't use &lt;?php useragent_spy_custom(); ?&gt; in your template, 
					you won't get the information displayed.</small></td>
				</tr>
			</table>
	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="uaspy_size, uaspy_location, uaspy_surfing, uaspy_on, uaspy_uabool, uaspy_show_text, uaspy_track_size" />
	<p class="submit">
		<input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" />
	</p>
</form>