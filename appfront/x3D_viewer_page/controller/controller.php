<?php
class Controller{
	public $load;
	public $model;

    public function __construct($pageURI = null){
		$this->load=new Load();
		$this->model=new Model();
		$this->$pageURI();
	}
	
	
	function home(){
		$data = $this->model->model3D_info();
		$this->load->view('view3DApp',$data);
	}

    function createTable(){
        $data = $this->model->createTable();
        $this->load->view('view3DAppTest',$data);
    }

    function insert(){
//        if($_POST) {
//            $name = $_POST['name'];
            $name = "abbaa";
            $data = $this->model->insert($name);
            $this->load->view('view3DAppTest',$data);
//        }

    }

    function query(){
        if($_POST) {
//            $id = 1;
            $id = $_POST['id'];
            $data = $this->model->query($id);
//            $this->load->view('view3DAppTest',$data);
            echo $data["model_1"];
        }

    }

    function update(){
        if($_POST) {
            $name = $_POST['name'];
            $id = $_POST['id'];
//            $name = "abbaaupdate";
//            $id = 1;
            $data = $this->model->update($id, $name);
            echo $data["model_1"];
//            $this->load->view('view3DAppTest',$data);
        }

    }
}
?>