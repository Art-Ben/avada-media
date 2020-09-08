<?php
function avada_media_custom_post_types(){
	/**
	 * Portfolio
	 */
	register_post_type('portfolio', array(
		'labels' => array(
			'name'               => get_string_translate('Portfolio', 'Портфолио'),
			'singular_name'      => get_string_translate('Card', 'Карточка'),
			'add_new'            => get_string_translate('Add new card', 'Добавить новую карточку'),
			'add_new_item'       => get_string_translate('Add new card', 'Добавить новую карточку'),
			'edit_item'          => get_string_translate('Edit card', 'Редактировать карточку'),
			'new_item'           => get_string_translate('New card', 'Новая карточка'),
			'view_item'          => get_string_translate('View card', 'Посмотреть карточку'),
			'search_items'       => get_string_translate('Search card', 'Найти карточку'),
			'not_found'          => get_string_translate('Cards not found', 'Карточек не найдено'),
			'not_found_in_trash' => get_string_translate('Cards in trash not found', 'В корзине карточек не найдено'),
			'menu_name'          => get_string_translate('Portfolio', 'Портфолио')

		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'menu_icon'			 => 'dashicons-images-alt',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array(
			'title',
			'editor',
			'thumbnail'
		)
	) );
	/**
	 * Inspiration
	 */
	register_post_type('inspiration', array(
		'labels' => array(
			'name'               => get_string_translate('Inspiration', 'Вдохновение'),
			'singular_name'      => get_string_translate('Card', 'Карточка'),
			'add_new'            => get_string_translate('Add new card', 'Добавить новую карточку'),
			'add_new_item'       => get_string_translate('Add new card', 'Добавить новую карточку'),
			'edit_item'          => get_string_translate('Edit card', 'Редактировать карточку'),
			'new_item'           => get_string_translate('New card', 'Новая карточка'),
			'view_item'          => get_string_translate('View card', 'Посмотреть карточку'),
			'search_items'       => get_string_translate('Search card', 'Найти карточку'),
			'not_found'          => get_string_translate('Cards not found', 'Карточек не найдено'),
			'not_found_in_trash' => get_string_translate('Cards in trash not found', 'В корзине карточек не найдено'),
			'menu_name'          => get_string_translate('Inspiration', 'Вдохновение')

		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'menu_icon'			 => 'dashicons-visibility',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array(
			'title',
			'editor',
			'thumbnail'
		)
	) );
	/**
	 * Services
	 */
	register_post_type('services', array(
		'labels' => array(
			'name'               => get_string_translate('Specializations', 'Специализации'),
			'singular_name'      => get_string_translate('Specialization', 'Специализация'),
			'add_new'            => get_string_translate('Add new specialization', 'Добавить новую специализацию'),
			'add_new_item'       => get_string_translate('Add new specialization', 'Добавить новую специализацию'),
			'edit_item'          => get_string_translate('Edit specialization', 'Редактировать специализацию'),
			'new_item'           => get_string_translate('New specialization', 'Новая специализация'),
			'view_item'          => get_string_translate('View specialization', 'Посмотреть специализацию'),
			'search_items'       => get_string_translate('Search specialization', 'Найти специализацию'),
			'not_found'          => get_string_translate('Specializations not found', 'Специализаций не найдено'),
			'not_found_in_trash' => get_string_translate('Specializations in trash not found', 'В корзине специализаций не найдено'),
			'menu_name'          => get_string_translate('Specializations', 'Специализации')

		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'menu_icon'			 => 'dashicons-feedback',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array(
			'title',
			'editor',
			'thumbnail'
		)
	) );
	/**
	 * Team
	 */
	register_post_type('team', array(
		'labels' => array(
			'name'               => get_string_translate('Team', 'Команда'),
			'singular_name'      => get_string_translate('Team', 'Команда'),
			'add_new'            => get_string_translate('Add new teamate', 'Добавить нового тимейта'),
			'add_new_item'       => get_string_translate('Add new teamate', 'Добавить нового тимейта'),
			'edit_item'          => get_string_translate('Edit teamate', 'Редактировать тимейта'),
			'new_item'           => get_string_translate('New teamate', 'Новый тимейт'),
			'view_item'          => get_string_translate('View teamate', 'Посмотреть тимейта'),
			'search_items'       => get_string_translate('Search teamate', 'Найти тимейтов'),
			'not_found'          => get_string_translate('Team not found', 'Тимейтов не найдено'),
			'not_found_in_trash' => get_string_translate('Team in trash not found', 'В корзине тимейта не найдено'),
			'menu_name'          => get_string_translate('Team', 'Команда')

		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'menu_icon'			 => 'dashicons-groups',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array(
			'title',
			'thumbnail'
		)
	) );
	/**
	 * Career
	 */
	register_post_type('career', array(
		'labels' => array(
			'name'               => get_string_translate('Career', 'Карьера'),
			'singular_name'      => get_string_translate('Career', 'Карьера'),
			'add_new'            => get_string_translate('Add new Job', 'Добавить новую вакансию'),
			'add_new_item'       => get_string_translate('Add new Job', 'Добавить новую вакансию'),
			'edit_item'          => get_string_translate('Edit Job', 'Редактировать вакансию'),
			'new_item'           => get_string_translate('New Job', 'Новая вакансия'),
			'view_item'          => get_string_translate('View Job', 'Посмотреть вакансию'),
			'search_items'       => get_string_translate('Search Job', 'Найти вакансию'),
			'not_found'          => get_string_translate('Jobs not found', 'Вакансий не найдено'),
			'not_found_in_trash' => get_string_translate('Jobs in trash not found', 'В корзине вакансий не найдено'),
			'menu_name'          => get_string_translate('Career', 'Карьера')

		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'menu_icon'			 => 'dashicons-welcome-learn-more',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array(
			'title',
			'editor',
			'thumbnail'
		)
	) );

	/**
	 * Space lab
	 */
	register_post_type('spacelab', array(
		'labels' => array(
			'name'               => get_string_translate('SpaceLab', 'SpaceLab'),
			'singular_name'      => get_string_translate('SpaceLab', 'SpaceLab'),
			'add_new'            => get_string_translate('Add new Course', 'Добавить новый курс'),
			'add_new_item'       => get_string_translate('Add new Course', 'Добавить новый курс'),
			'edit_item'          => get_string_translate('Edit Cource', 'Редактировать курс'),
			'new_item'           => get_string_translate('New Cource', 'Новый курс'),
			'view_item'          => get_string_translate('View Cource', 'Посмотреть курс'),
			'search_items'       => get_string_translate('Search Cources', 'Найти курсы'),
			'not_found'          => get_string_translate('Cources not found', 'Курсы не найдены'),
			'not_found_in_trash' => get_string_translate('Courcess in trash not found', 'В корзине курсов не найдено'),
			'menu_name'          => get_string_translate('SpaceLab', 'SpaceLab')

		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'menu_icon'			 => 'dashicons-admin-site-alt3',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array(
			'title',
			'editor'
		)
	) );
}
add_action('init', 'avada_media_custom_post_types');
