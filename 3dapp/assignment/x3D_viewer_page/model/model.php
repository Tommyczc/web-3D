<?php
class Model{
    public $dbhandle;

    /**
     * Model constructor.
     * @param $dbhandle
     */
    public function __construct()
    {
        $this->dbhandle = new PDO('sqlite:mydb.sqlite3');
    }

    public function createTable(){
        try{

            $stmt = $this->dbhandle -> prepare("CREATE TABLE IF NOT EXISTS mytable (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT);");

            /* execute the query */
            if ($stmt -> execute())
            {
                return array(
                    'model_1'=>"Table is created"
                );
            }

            /* close connection */
            $this->dbhandle = null;
        }
        catch (PDOExecption $e){
            echo $e->getMessage();
        }
    }

    public function insert($name){
        try{

            /* Create a prepared statement */
            $stmt = $this->dbhandle -> prepare("INSERT INTO mytable (name) VALUES ( :name)");

            /* bind params */
            $stmt -> bindParam(':name', $name, PDO::PARAM_STR);

            /* execute the query */
            if( $stmt -> execute() ){
                return array(
                    'model_1'=>"data is insert"
                );
            }
            /* close connection */
            $db = null;
        }
        catch (PDOExecption $e){
            echo $e->getMessage();
        }
    }

    public function query($id){
        try{

            /* Create a prepared statement */
            $stmt = $this->dbhandle -> prepare("SELECT * from mytable where id = :id");

            /* bind param */
            $stmt -> bindParam(':id', $id, PDO::PARAM_INT);

            /* execute the query */
            $stmt -> execute();

            /* fetch all results */
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($res as $row){
                extract($row);
//                echo $id." | ".$name."<br>";
                return array(
                    'model_1'=>$row["name"]
                );
            }

            /* close connection */
            $db = null;
        }
        catch (PDOExecption $e){
            echo $e->getMessage();
        }
    }

    public function update($id, $name){
        try{

            /* Create a prepared statement */
            $stmt = $this->dbhandle -> prepare("UPDATE mytable SET name=:name where id=:id");

            /* bind params */
            $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
            $stmt -> bindParam(':name', $name, PDO::PARAM_STR);

            /* execute the query */
            if($stmt -> execute()){
                return array(
                    'model_1'=>"data is update"
                );
            }
            /* close connection */
            $db = null;
        }
        catch (PDOExecption $e){
            echo $e->getMessage();
        }
    }
	
    public function queryJson($id){
        try{

            /* Create a prepared statement */
            $stmt = $this->dbhandle -> prepare("SELECT * from t_json where id = :id");

            /* bind param */
            $stmt -> bindParam(':id', $id, PDO::PARAM_INT);

            /* execute the query */
            $stmt -> execute();

            /* fetch all results */
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($res as $row){
                extract($row);
//                echo $id." | ".$name."<br>";
                return array(
                    'json'=>$row["json"]
                );
            }

            /* close connection */
            $db = null;
        }
        catch (PDOExecption $e){
            echo $e->getMessage();
        }
    }

    public function queryPicPath(){
        try{

            /* Create a prepared statement */
            $stmt = $this->dbhandle -> prepare("SELECT * from t_pic_path");

            /* execute the query */
            $stmt -> execute();

            /* fetch all results */
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $res;

//            foreach($res as $row){
//                extract($row);
////                echo $id." | ".$name."<br>";
//                return array(
//                    'path'=>$row["path"]
//                );
//            }

            /* close connection */
            $db = null;
        }
        catch (PDOExecption $e){
            echo $e->getMessage();
        }
    }

    public function model3D_info()
    {
		return array(
			'model_1'=>"Coke Can 3D Image 1"
		);
	}
	
}
?>