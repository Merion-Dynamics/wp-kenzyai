<?php

function api_fp_panel() {
   api_string_setting("api_the_key",'');

?>
<div class="wrap">
   <h1>Sentiment API</h1>
   <?php
      if(isset( $_POST['api_panel'])) {
         echo "<div id='setting-error-settings_updated' class='notice notice-success settings-error is-dismissible'> <p><strong>Your API key has been updated.</strong></p><button type='button' class='notice-dismiss'><span class='screen-reader-text'>Dismiss this notice.</span></button></div>";
      }
   ?>
   <form action="" method="post" novalidate="novalidate">
      <table class="form-table" role="presentation">
         <tbody>
            <tr>
               <th scope="row">
                  <label for="blogname">API KEY</label>
               </th>
               <td>
                  <input class="regular-text" type="text" name="api_the_key" value="<?php echo get_option("api_the_key"); ?>" placeholder="your api key">
                  <p class="description" id="tagline-description">If you know your API key, then enter it above. Otherwise, you may <a target="_blank" href="https://api.kenzyai.com/">Register for Free</a> and generate your API key.</p>
               </td>
            </tr>
         </tbody>
      </table>
      <p class="submit">
         <input type="hidden" name="api_panel" value="1">
         <input type="submit" class="button button-primary" value="Update Key">
      </p>
   </form>
</div>
<?php

}