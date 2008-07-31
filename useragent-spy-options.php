<!--Options file for UserAgent Spy-->
<form method="post" action="options.php">
	<?php 
		wp_nonce_field('update-options');
		$size = get_option('uaspy_size');
		$location = get_option('uaspy_location');
		$surfing=get_option('uaspy_surfing');
		$on=get_option('uaspy_on');
	?>
	<table>
	    <tr>
	        <td><strong>Browser/OS Icon Size:</strong>
	        </td>
	        <td><select name="uaspy_size">
	        		<!-- To-do: Add "if" so actual value is selected when updating-->
	        		<option value="24" text="24" <?php if($size==24) echo 'selected="selected"' ?>>24</option>
	        		<option value="16" text="16" <?php if($size==16) echo 'selected="selected"' ?>>16</option>
	        	</select>
	        </td>
	    </tr>
	    <tr>
	    	<td colspan="2"><strong>Display text</strong>
	    	You can change the text between the Web Browser and the Operative System in the following options.<br/>
	    	You can use something funny like "Surfing the web with 'browser name' which runs over 'operative system'.<br/>
	    	<small>
	    		<strong>Current: </strong><?php if($surfing==""){echo "Using ";}else{echo $surfing;} ?> Firefox
	    		<?php if($on==""){echo "on ";}else{echo $on;} ?> GNU/Linux.
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
	    				>Custom
	    			</option>
	    		</select>
	    	</td>
	    </tr>
	    <tr>
	    	<td colspan="2"><small><strong>Usage:</strong> There are 3 options so far for you to display the commenter's Browser and O.S. with
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
	<input type="hidden" name="page_options" value="uaspy_size, uaspy_location, uaspy_surfing, uaspy_on" />
	<p class="submit">
		<input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" />
	</p>
</form>
