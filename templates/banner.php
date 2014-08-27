<script language="javascript">

   var fpub_delay = <?= get_option('fpub_delay'); ?>;
   var fpub_persist = <?= get_option('fpub_persist'); ?>;

</script>

<div id="fpub-popup" class="trg-overlay hide small">
   <a href="<?= get_option('fpub_link'); ?>">
      <img src="<?= get_option('fpub_image'); ?>" height="<?= get_option('fpub_height'); ?>" width="<?= get_option('fpub_width'); ?>" />
   </a>
   <?php if (get_option('fpub_btn_close') == 'on') : ?>
      <a class="close-overlay" >&#215; </a>
   <?php endif; ?>
</div>