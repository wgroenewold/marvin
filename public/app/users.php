<?php

/**
 * Class users. To do all the stuff for tags.
 */

class marvin_users{
	private $db;

	public function __construct(){
		$this->db = new marvin_db();
	}

	//Get tags from DB and create json-file
	public function create_dialog($file){
		$blocks = json_decode($file, true);

		$tags = $this->db->read('tags', array('id', 'text'));

		$options = array();

		foreach($tags as $item){
			$options[] = array(
				'text' => array(
					'type' => 'plain_text',
					'text' => $item['text'],
					'emoji' => true,
				),
				'value' => 'tag_' . $item['id']
			);
		}

		$blocks[2]['accessory']['options'] = $options;

		return json_encode($blocks,JSON_PRETTY_PRINT);
	}
}