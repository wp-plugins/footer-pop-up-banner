<script language="javascript">

   var fpub_delay = <?= get_option('fpub_delay'); ?>;
   var fpub_persist = <?= get_option('fpub_persist'); ?>;

</script>

<div id="fpub-popup" class="trg-overlay hide small" style="background-color: <?= hex2rgba(get_option('fpub_background_colr'), get_option('fpub_background_fade') / 100); ?>; border-top: 1px solid <?= get_option('fpub_line_color'); ?>">
   <?php if (get_option('fpub_btn_close') == 'on') : ?>
      <a class="close-overlay" >&#215; </a>
   <?php endif; ?>
   
   <a href="<?= get_option('fpub_link'); ?>">
      <img src="<?= get_option('fpub_image'); ?>" height="<?= get_option('fpub_height') > 0 ? get_option('fpub_height') . 'px' : ''; ?>" width="<?= get_option('fpub_width') > 0 ? get_option('fpub_width') . 'px' : ''; ?>" />
   </a>
</div>