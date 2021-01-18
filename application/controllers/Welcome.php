<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	private $dbname1;
	private $fields;

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function __construct(){ 
		parent::__construct();
		$this->load->dbforge();

		$this->dbname1 = 'mydb_alok1';
	}

	public function create_db(){

		// To create the database.
		if($this->dbforge->create_database($this->dbname1)){
			echo 'Database created..';

			// Use database.
			$this->db->query('USE '.$this->dbname1);

			// Table fields
			$this->fields = [
					'pid'=>[
							'type'=> 'INT',
							'constraint'=> 5,
							'unsigned'=> TRUE,
							'auto_increment'=> TRUE
						],
					'name'=>[
							'type'=> 'VARCHAR',
							'constraint'=> '100',
							'unique'=> TRUE
						],
					'hsn'=>[
							'type'=> 'VARCHAR',
							'constraint'=> '100',
							'default'=> 'hsn_'
						],
					'description'=>[
							'type'=> 'TEXT',
							'null'=> TRUE
						],
					'salary'=>[
							'type'=> 'DOUBLE',
							'constraint'=> '10,2',
							'default'=> '0.00'
						],
					'approve'=>[
							'type'=> 'BOOLEAN',
							'default'=> FALSE
						]
				];


			// To add the primary key for that table.
			$this->dbforge->add_key('pid', TRUE);

			// To add all the fields in table.
			$this->dbforge->add_field($this->fields);

			// To create the table.
			$tbname = 'tbl_products';
			if($this->dbforge->create_table($tbname, TRUE)) // TRUE if the table doesnot exists.
			{
				echo 'Table created.';
			}

		}

	}

	public function drop_db(){

		// To drop the database.
		if($this->dbforge->drop_database($this->dbname1)){
			echo 'Database dropped...';
		}
	}

	public function create_tb(){

		// Table fields
		$this->fields = [
				'pid'=>[
						'type'=> 'INT',
						'constraint'=> 5,
						'unsigned'=> TRUE,
						'auto_increment'=> TRUE
					],
				'name'=>[
						'type'=> 'VARCHAR',
						'constraint'=> '100',
						'unique'=> TRUE
					],
				'hsn'=>[
						'type'=> 'VARCHAR',
						'constraint'=> '100',
						'default'=> 'hsn_'
					],
				'description'=>[
						'type'=> 'TEXT',
						'null'=> TRUE
					],
				'salary'=>[
						'type'=> 'DOUBLE',
						'constraint'=> '10,2',
						'default'=> '0.00'
					],
				'approve'=>[
						'type'=> 'BOOLEAN',
						'default'=> FALSE
					]
			];


		// To add the primary key for that table.
		$this->dbforge->add_key('pid', TRUE);

		// To add all the fields in table.
		$this->dbforge->add_field($this->fields);

		// To create the table.
		$tbname = 'tbl_products';
		if($this->dbforge->create_table($tbname, TRUE)) // TRUE if the table doesnot exists.
		{
			echo 'Table created.';
		}

	}

}
