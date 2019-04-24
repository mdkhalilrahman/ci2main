<?php 

$config = [

		'add_article_rule' => [
				[
					'field' => 'article_title',
					'label' => 'article_title',
					'rules' => 'alpha|required'
 				],
				[
					'field' => 'article_body',
					'label' => 'article_body',
					'rules' => 'required'
				]

		],


		'edit_article_rule' => [
				[
					'field' => 'article_title',
					'label' => 'article_title',
					'rules' => 'alpha|required'
 				],
				[
					'field' => 'article_body',
					'label' => 'article_body',
					'rules' => 'alpha|required'
				]

		],


];




?>