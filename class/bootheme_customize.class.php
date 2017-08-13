<?php
class bootheme_customize
{
	private static $panel = 'envolcrea_options';
	public static function register($wp_customize)
	{
		// Nom du panel
		$panel = self::$panel;
		$wp_customize->add_panel(
			$panel,
			array(
				'title' => __('Sections page accueil', 'bootheme'),
				'priority' => 1000
			)
		);
		$section = self::addSection($wp_customize, 'section_presentation', 'presentation', $panel);
		self::addParam($wp_customize, $section['name'] . 'titre_pres', $section['full'], 'Titre de la section', 'text');
		$wp_customize->add_setting($section['name'] . 'image');
		$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, $section['name'] . 'image', array(
			'section' => $section['full'],
			'label' => 'Photo',
			'mime_type' => 'image'
		)));
		self::addParam($wp_customize, $section['name'] . 'texte1', $section['full'], 'Texte de Présentation', 'textarea');

		$section = self::addSection($wp_customize, 'section_services', 'services', $panel);
		self::addParam($wp_customize, $section['name'] . 'texte1', $section['full'], 'Titre 1 section service', 'text');
		self::addParam($wp_customize, $section['name'] . 'paraph1', $section['full'], 'Paragraphe 1 section service', 'textarea');
		self::addParam($wp_customize, $section['name'] . 'texte2', $section['full'], 'Titre 2 section service', 'text');
		self::addParam($wp_customize, $section['name'] . 'paraph2', $section['full'], 'Paragraphe 2 section service', 'textarea');
		self::addParam($wp_customize, $section['name'] . 'texte3', $section['full'], 'Titre 3 section service', 'text');
		self::addParam($wp_customize, $section['name'] . 'paraph3', $section['full'], 'Paragraphe 3 section service', 'textarea');

		$section = self::addSection($wp_customize, 'section_contact', 'contact', $panel);
		self::addParam($wp_customize, $section['name'] . 'nom_prenom', $section['full'], 'Nom et prénom', 'text');
		self::addParam($wp_customize, $section['name'] . 'telephone', $section['full'], 'Télphone', 'text');
		self::addParam($wp_customize, $section['name'] . 'email', $section['full'], 'Email', 'email');
		self::addParam($wp_customize, $section['name'] . 'paraph1', $section['full'], 'Zone de texte', 'textarea');

		$section = self::addSection($wp_customize, 'section_parallax', 'parallax', $panel);
		self::addparamMedia($wp_customize, $section['name'] . 'parallax1', $section['full'], 'Parallax 1', 'image');
		self::addparamMedia($wp_customize, $section['name'] . 'parallax2', $section['full'], 'Parallax 2', 'image');
		self::addparamMedia($wp_customize, $section['name'] . 'parallax3', $section['full'], 'Parallax 3', 'image');

		$section = self::addSection($wp_customize, 'section_footer', 'footer', $panel);
		self::addParam($wp_customize, $section['name'] . 'page', $section['full'], 'Paragraphe section footer', 'dropdown-pages');
	}
	/**
	 * @param $wp_customize
	 * @param $name
	 * @param $section
	 * @param $label
	 * @param $type
	 *
	 *
	 */
	private function addParam($wp_customize, $name, $section, $label, $type)
	{
		$wp_customize->add_setting($name,
			array(
				'default' => ''
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				$name,
				array(
					'label' => __($label),
					'section' => $section,
					'type' => $type,
				)
			)
		);
	}
	/**
	 * @param $wp_customize
	 * @param $name
	 * @param $section
	 * @param $label
	 * @param $type
	 */
	private function addParamMedia($wp_customize, $name, $section, $label, $type)
	{
		$wp_customize->add_setting($name,
			array(
				'default' => ''
			)
		);
		$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, $name, array(
			'section' => $section,
			'label' => $label,
			'mime_type' => $type
		)));
	}
	/**
	 * @param $wp_customize
	 * @param $name
	 * @param $diplayname
	 * @param $panel
	 * @return array
	 *
	 *
	 */
	private function addSection($wp_customize, $name, $diplayname, $panel)
	{
		$wp_customize->add_section(
			"boot_options_section_$name",
			array(
				'title' => __("Section $diplayname", 'bootheme'),
				'priority' => 10,
				'description' => __("Paramètre de la section $name", 'bootheme'),
				'panel' => $panel
			)
		);
		return ["full" => "boot_options_section_$name", "name" => $name];
	}
}