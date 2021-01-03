<?php wp_deregister_script('jquery'); ?>
<?php wp_footer(); ?>

<?php $string = $post->post_content;
if (strpos($string, '<pre>') === false) : ?>
<?php else : ?>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.1.0/styles/ir_black.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.1.0/highlight.min.js"></script>
  <script>
    document.querySelectorAll('pre').forEach((block) => {
      hljs.highlightBlock(block);
    });
  </script>
<?php endif; ?>
<?php if (strpos($string, 'sprite ') === false) : ?>
<?php else : ?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/output/sprite.css">
<?php endif; ?>

<?php if(function_exists('get_field')): ?>
<?php if ((is_page() || is_single()) && get_field('hide_adsense') == true) : ?>
  <style>
    .sense {
      display: none !important;
    }
  </style>

<?php endif; endif; ?>