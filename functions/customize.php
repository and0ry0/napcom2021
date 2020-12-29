<?php
function themeslug_customize_register($wp_customize)
{
  $wp_customize->add_section(
    'general_section',
    array(
      'title' => __('総合設定'),
      'priority' => '10',
      'description' => esc_html__('総合的な設定をします'),
    )
  );
  $wp_customize->add_setting(
    'logocolor',
    array(
      'default' => '#000000',
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color'
    )
  );

  $wp_customize->add_control(
    'logocolor',
    array(
      'label' => __( 'ロゴカラー' ),
      'description' => esc_html__( 'ロゴの色。' ),
      'section' => 'general_section',
      'priority' => 5,
      'type' => 'color',
    )
  );

  $wp_customize->add_setting( 'underlogo_text',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
   )
);
 
$wp_customize->add_control( 'underlogo_text',
   array(
      'label' => __( 'ロゴ下のテキスト' ),
      'description' => esc_html__( 'ロゴの下に出ます' ),
      'section' => 'general_section',
      'priority' => 10, // Optional. Order priority to load the control. Default: 10
      'type' => 'text', // Can be either text, email, url, number, hidden, or date
      'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
      'input_attrs' => array( // Optional.
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid rebeccapurple',
         'placeholder' => __( 'HTMLはダメ！' ),
      ),
   )
);
}
add_action('customize_register', 'themeslug_customize_register');
