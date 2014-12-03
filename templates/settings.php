<div class="wrap">
   <h2>Footer Pop-Up Banner</h2>
   <form method="post" action="options.php"> 
      <?php settings_fields('wp_footer_pop_up_banner'); ?>
      <?php @do_settings_fields('wp_footer_pop_up_banner'); ?>

      <table class="form-table">  
         <tr valign="top">
            <th scope="row"><label for="setting_a">Timing</label></th>
            <td>
               <input type="number" step="1" min="0" class="small-text" name="fpub_delay" id="fpub_delay" value="<?php echo get_option('fpub_delay'); ?>" />
               <label for="fpub_delay">(seconds) Time of entry into action</label>
               <br />
               <input type="number" step="1" min="0" class="small-text" name="fpub_persist" id="fpub_persist" value="<?php echo get_option('fpub_persist'); ?>" />
               <label for="fpub_persist">(seconds) Exposure time</label>
            </td>
         </tr>
         <tr valign="top">
            <th scope="row"><label for="fpub_image">Image (URL)</label></th>
            <td>
                <input type="text" name="fpub_image" id="image_path" value="<?php echo get_option('fpub_image'); ?>" id="image_path">
                    <input type="button" value="Upload Image" class="button-primary" id="upload_image"/> Upload your Image from here.
                    <div id="show_upload_preview">

                        <?php $image = get_option('fpub_image', NULL); ?>
                        <?php if ($image) : ?>
                           <img src="<?php echo get_option('fpub_image');; ?>">
                           <input type="button" name="fpub_remove_image" value="Remove Image" class="button-secondary" id="fpub_remove_image"/>
                        <?php endif; ?>
                    </div>
            </td>
         </tr>
         <tr valign="top">
            <th scope="row"><label for="fpub_link">Redirect (URL)</label></th>
            <td>
                <input type="text" name="fpub_link" id="fpub_link" value="<?php echo get_option('fpub_link'); ?>" />
                <?php wp_dropdown_pages(array('name'=>'wp_footer_pop_up_banner_link', 'selected' => NULL, 'show_option_none' => '[ Custom Link ]')); ?>

            </td>
         </tr>

         <tr valign="top">
            <th scope="row"><label for="setting_a">Colors</label></th>
            <td>
               <input type="text" class="my-color-picker" id="fpub_background_colr" name="fpub_background_colr" value="<?php echo get_option('fpub_background_colr'); ?>" />
               <label for="fpub_background_colr">Background color</label>
               <input type="number" step="1" min="0" max="100" class="small-text" name="fpub_background_fade" id="fpub_background_fade" value="<?php echo get_option('fpub_background_fade'); ?>" />
               <label for="fpub_background_fade">(%) Fade</label>
               <br />
               <input type="text" class="my-color-picker" id="fpub_line_color" name="fpub_line_color" value="<?php echo get_option('fpub_line_color'); ?>" />
               <label for="fpub_line_color">Line color</label>
            </td>
         </tr>

         <tr valign="top">
            <th scope="row"><label for="setting_a">Options</label></th>
            <td>
               <input type="number" step="1" min="1" class="small-text" name="fpub_width" id="fpub_width" value="<?php echo get_option('fpub_width'); ?>" />
               <label for="fpub_width">(pixel) Width</label>
               <br />
               <input type="number" step="1" min="1" class="small-text" name="fpub_height" id="fpub_height" value="<?php echo get_option('fpub_height'); ?>" />
               <label for="fpub_height">(pixel) Height</label>
               <br />
               <input type="number" step="1" min="0" class="small-text" name="fpub_border_height" id="fpub_border_height" value="<?php echo get_option('fpub_border_height'); ?>" />
               <label for="fpub_border_height">(pixel) Border height</label>
               <br />
               <input type="checkbox" name="fpub_btn_close" id="fpub_btn_close" <?= get_option('fpub_btn_close') == 'on' ? 'checked' : ''; ?> />
               <label for="fpub_btn_close">Show the button to close the banner</label>
               <br />
               <input type="checkbox" name="fpub_blank" id="fpub_blank" <?= get_option('fpub_blank') == 'on' ? 'checked' : ''; ?> />
               <label for="fpub_btn_close">Open in another window</label>
            </td>
         </tr>
      </table>

      <?php @submit_button(); ?>
   </form>
   
   <a href="http://www.ninjapress.net/suite/" target="_blank">
      <img style="float:right" src="<?= plugins_url('images/ninjapress-logo.png', dirname(__FILE__)); ?>" />
   </a>
</div>