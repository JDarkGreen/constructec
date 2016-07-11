<?php
/***********************************************************************************************/
/* Add a menu option to link to the customizer */
/***********************************************************************************************/
add_action('admin_menu', 'display_custom_options_link');
function display_custom_options_link() {
	add_theme_page('Constructec Opciones', 'Constructec Opciones', 'edit_theme_options', 'customize.php');
}

/***********************************************************************************************/
/* Add options in the theme customizer page */
/***********************************************************************************************/
add_action('customize_register', 'constructec_customize_register');
function constructec_customize_register($wp_customize) {
	// Logo 
	$wp_customize->add_section('constructec_logo', array(
		'title' => __('Logo', 'constructec-framework'),
		'description' => __('Permite subir tu logo personalizado.', 'constructec-framework'),
		'priority' => 35
	));
	
	$wp_customize->add_setting('constructec_custom_settings[logo]', array(
		'default' => IMAGES . '/logo.png',
		'type' => 'option'
	));
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo', array(
		'label' => __('Carga tu Logo', 'constructec-framework'),
		'section' => 'constructec_logo',
		'settings' => 'constructec_custom_settings[logo]'
	)));

	/*|-----------------------------------------------------------------------|*/
	/*|-----------------------------------------------------------------------|*/

	####>>>>>>>>>>>> MISION Y VISIÓN >>>>>>>>>>>>>>>>>>
	$wp_customize->add_section('constructec_mision_vision', array(
		'title' => __('Misión y Visión Empresa', 'constructec-framework'),
		'description' => __('Sección Misión y Visión Empresa', 'constructec-framework'),
		'priority' => 41
	));	
	/* MISION */
	$wp_customize->add_setting('constructec_custom_settings[text_mision]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('constructec_custom_settings[text_mision]', array(
		'label'    => __('Escribe el texto MISIÓN', 'constructec-framework'),
		'section'  => 'constructec_mision_vision',
		'settings' => 'constructec_custom_settings[text_mision]',
		'type'     => 'textarea'
	));	
	/* VISION */
	$wp_customize->add_setting('constructec_custom_settings[text_vision]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('constructec_custom_settings[text_vision]', array(
		'label'    => __('Escribe el texto VISIÓN', 'constructec-framework'),
		'section'  => 'constructec_mision_vision',
		'settings' => 'constructec_custom_settings[text_vision]',
		'type'     => 'textarea'
	));

	/*|-----------------------------------------------------------------------|*/
	/*|-----------------------------------------------------------------------|*/

	####>>>>>>>>>>>> REDES SOCIALES >>>>>>>>>>>>>>>>>>
	$wp_customize->add_section('constructec_redes_sociales', array(
		'title' => __('Redes Sociales', 'constructec-framework'),
		'description' => __('Sección Redes Sociales', 'constructec-framework'),
		'priority' => 41
	));	
	//facebook
	$wp_customize->add_setting('constructec_custom_settings[red_social_fb]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('constructec_custom_settings[red_social_fb]', array(
		'label'    => __('Coloca el link de facebook de la empresa', 'constructec-framework'),
		'section'  => 'constructec_redes_sociales',
		'settings' => 'constructec_custom_settings[red_social_fb]',
		'type'     => 'text'
	));
	//youtube
	$wp_customize->add_setting('constructec_custom_settings[red_social_ytube]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('constructec_custom_settings[red_social_ytube]', array(
		'label'    => __('Coloca el link de youtube de la empresa', 'constructec-framework'),
		'section'  => 'constructec_redes_sociales',
		'settings' => 'constructec_custom_settings[red_social_ytube]',
		'type'     => 'text'
	));
	//twitter
	$wp_customize->add_setting('constructec_custom_settings[red_social_twitter]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('constructec_custom_settings[red_social_twitter]', array(
		'label'    => __('Coloca el link de twitter de la empresa', 'constructec-framework'),
		'section'  => 'constructec_redes_sociales',
		'settings' => 'constructec_custom_settings[red_social_twitter]',
		'type'     => 'text'
	));
	//gmail
	$wp_customize->add_setting('constructec_custom_settings[red_social_gmail]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('constructec_custom_settings[red_social_gmail]', array(
		'label'    => __('Coloca el link de gmail de la empresa', 'constructec-framework'),
		'section'  => 'constructec_redes_sociales',
		'settings' => 'constructec_custom_settings[red_social_gmail]',
		'type'     => 'text'
	));

	
	// Contact Email
	$wp_customize->add_section('constructec_contact_email', array(
		'title' => __('Correo Contacto', 'constructec-framework'),
		'description' => __('Escribe el Correo Contacto', 'constructec-framework'),
		'priority' => 37
	));
	
	$wp_customize->add_setting('constructec_custom_settings[contact_email]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('constructec_custom_settings[contact_email]', array(
		'label'    => __('Email Contacto', 'constructec-framework'),
		'section'  => 'constructec_contact_email',
		'settings' => 'constructec_custom_settings[contact_email]',
		'type'     => 'text'
	));

	//Customizar celular
	$wp_customize->add_section('constructec_contact_cel', array(
		'title' => __('Celular de Contacto', 'constructec-framework'),
		'description' => __('Celular de Contacto', 'constructec-framework'),
		'priority' => 39
	));
	
	$wp_customize->add_setting('constructec_custom_settings[contact_cel]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('constructec_custom_settings[contact_cel]', array(
		'label'    => __('Escribe el o los números de celular del contacto separados por comas', 'constructec-framework'),
		'section'  => 'constructec_contact_cel',
		'settings' => 'constructec_custom_settings[contact_cel]',
		'type'     => 'text'
	));

	//Customizar telefono
	$wp_customize->add_section('constructec_contact_tel', array(
		'title' => __('Telefono de Contacto', 'constructec-framework'),
		'description' => __('Telefono de Contacto', 'constructec-framework'),
		'priority' => 39
	));
	
	$wp_customize->add_setting('constructec_custom_settings[contact_tel]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('constructec_custom_settings[contact_tel]', array(
		'label'    => __('Escribe el numero de teléfono', 'constructec-framework'),
		'section'  => 'constructec_contact_tel',
		'settings' => 'constructec_custom_settings[contact_tel]',
		'type'     => 'text'
	));

	//Customizar Direccion
	$wp_customize->add_section('constructec_contact_address', array(
		'title' => __('Direccion de Contacto', 'constructec-framework'),
		'description' => __('Direccion de Contacto', 'constructec-framework'),
		'priority' => 40
	));
	
	$wp_customize->add_setting('constructec_custom_settings[contact_address]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('constructec_custom_settings[contact_address]', array(
		'label'    => __('Escribe la Direccion del contacto ', 'constructec-framework'),
		'section'  => 'constructec_contact_address',
		'settings' => 'constructec_custom_settings[contact_address]',
		'type'     => 'text'
	));

	//Customizar MAPA
	$wp_customize->add_section('constructec_contact_mapa', array(
		'title' => __('Mapa de Contacto', 'constructec-framework'),
		'description' => __('Mapa de Contacto', 'constructec-framework'),
		'priority' => 41
	));
	
	$wp_customize->add_setting('constructec_custom_settings[contact_mapa]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('constructec_custom_settings[contact_mapa]', array(
		'label'    => __('Escribe latitud y longitud de mapa sepador por coma', 'constructec-framework'),
		'section'  => 'constructec_contact_mapa',
		'settings' => 'constructec_custom_settings[contact_mapa]',
		'type'     => 'text'
	));

	//Customizar WIDGET NOSOTROS
	$wp_customize->add_section('constructec_widget_nosotros', array(
		'title' => __('Sección NOSOTROS', 'constructec-framework'),
		'description' => __('Sección NOSOTROS', 'constructec-framework'),
		'priority' => 40
	));
	
	//título de widget
	$wp_customize->add_setting('constructec_custom_settings[title_widget_nosotros]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('constructec_custom_settings[title_widget_nosotros]', array(
		'label'    => __('Escribe TÍTULO sección nosotros - PORTADA', 'constructec-framework'),
		'section'  => 'constructec_widget_nosotros',
		'settings' => 'constructec_custom_settings[title_widget_nosotros]',
		'type'     => 'text'
	));	

	//textarea
	$wp_customize->add_setting('constructec_custom_settings[widget_nosotros]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('constructec_custom_settings[widget_nosotros]', array(
		'label'    => __('Escribe contenido que ira en sección nosotros - PORTADA', 'constructec-framework'),
		'section'  => 'constructec_widget_nosotros',
		'settings' => 'constructec_custom_settings[widget_nosotros]',
		'type'     => 'textarea'
	));
	//imagen
	$wp_customize->add_setting('constructec_custom_settings[image_nosotros]',array(
		'default' => '',
		'type'    => 'option'
	));

	$wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize,'widget_nosotros',array(
		'label'    => __('Imagen Nosotros', 'constructec-framework'),
		'section'  => 'constructec_widget_nosotros',
		'settings' => 'constructec_custom_settings[image_nosotros]',
	)));	

	//Customizar Informacion Footer
	$wp_customize->add_section('constructec_widget_footer', array(
		'title' => __('Sección Footer', 'constructec-framework'),
		'description' => __('Sección Footer', 'constructec-framework'),
		'priority' => 41
	));
	
	//textarea
	$wp_customize->add_setting('constructec_custom_settings[widget_footer]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('constructec_custom_settings[widget_footer]', array(
		'label'    => __('Escribe contenido en sección FOOTER', 'constructec-framework'),
		'section'  => 'constructec_widget_footer',
		'settings' => 'constructec_custom_settings[widget_footer]',
		'type'     => 'textarea'
	));
	
}	
?>