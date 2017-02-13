<?php
/**
 * @file
 * Zen theme's implementation to display a block.
 *
 * Available variables:
 * - $title: Block title.
 * - $content: Block content.
 * - $block->module: Module that generated the block.
 * - $block->delta: An ID for the block, unique within each module.
 * - $block->region: The block region embedding the current block.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - block: The current template type, i.e., "theming hook".
 *   - block-[module]: The module generating the block. For example, the user
 *     module is responsible for handling the default user navigation block. In
 *     that case the class would be "block-user".
 *   - first: The first block in the region.
 *   - last: The last block in the region.
 *   - odd: An odd-numbered block in the region's list of blocks.
 *   - even: An even-numbered block in the region's list of blocks.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Helper variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $block_zebra: Outputs 'odd' and 'even' dependent on each block region.
 * - $zebra: Same output as $block_zebra but independent of any block region.
 * - $block_id: Counter dependent on each block region.
 * - $id: Same output as $block_id but independent of any block region.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 * - $block_html_id: A valid HTML ID and guaranteed unique.
 *
 * @see template_preprocess()
 * @see template_preprocess_block()
 * @see zen_preprocess_block()
 * @see template_process()
 * @see zen_process_block()
 * 
 */
$themepath = drupal_get_path('theme','howard');
$graph_id = variable_get('facebook_pull_graph_id', '');
?>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div id="<?php print $block_html_id; ?>" class="social_details facebook"<?php print $attributes; ?>>
  <div class="heading">
        <img src="<?php print $themepath; ?>/images/fb_big.png" alt="" />
        <p><a href="http://facebook.com/profile.php?id=<?php echo $graph_id; ?>" target="_blank">Follow us on Facebook</a></p>
    </div>
    <div class="heading _second">
        <a><img src="<?php print $themepath; ?>/images/howard_social_logo.png" alt="" /></a>
         <p>Howard University</p>
    </div>
 
  <div class="content"<?php print $content_attributes; ?>>
    <?php print $content; ?>
  </div>

</div>
</div><!-- /.block -->