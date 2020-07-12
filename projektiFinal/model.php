<?php
 
Class Model{

    private $server = "localhost";
    private $username="root";
private $password;
    private $db = "hikedb";
    private $conn;

    public function __construct(){
        try{
    $this->conn = new mysqli($this->server,$this->username,$this->password, $this->db);

}catch (Exception $e){
    echo "connection failed" . $e->getMessage();
}
    }

public function insert(){
				
				
					if (isset($_POST['submit'])) {

						$location = $_POST['location'];
                        $date = $_POST['date'];
                        $stops = $_POST['stops'];
                        $people = $_POST['people'];
                        $price = $_POST['price'];
						$files = $_FILES['file'];

					
						$filename = $files['name'];
						$fileerror = $files['error'];
						$filetmp = $files['tmp_name'];

						$fileext = explode('.', $filename);
						$filecheck = strtolower(end($fileext));

						$fileextstored = array('png', 'jpg', 'jpeg');

						if (in_array($filecheck, $fileextstored)) {
							$destionationfile = 'imgevents/' . $filename;
							move_uploaded_file($filetmp, $destionationfile);

							$query = "INSERT INTO `events`( `image`, `location`, `date`, `stops`, `people`, `price`) VALUES ('$destionationfile','$location','$date','$stops','$people','$price')";
							if($sql = $this->conn -> query($query)){
                                echo "Successfully";
                            }else{
                                echo "Falied";
                            }
						} else {
							echo "Extension is not matching ";
						}
					}
		
}
public function fetchevents(){
    $data=null;
    $query="Select * from events";
    if($sql=$this->conn->query($query)){
        while($row=mysqli_fetch_assoc($sql)){
            $data[]=$row;
        }
    }
    return $data;
}

public function delete($id){

    $query="delete from events where id='$id'";
    if($sql= $this->conn->query($query)){
        return true;
    }else{
        return false;
    }
}
public function fetch_event($id){

    $data=null;
    $query="Select * from events where id='$id'";
    if($sql =$this->conn->query($query)){
        while ($row=$sql->fetch_assoc()){
            $data=$row;
        }
    }
    return $data;
}
    public function edit($id){

        $data=null;

        $query="Select * from events where id='$id'";
        if($sql =$this->conn->query($query)){
            while ($row= $sql->fetch_assoc()){
                $data=$row;
            }
        }
        return $data;

    }
    public function update($data){
       echo $query="Update events set location='$data[location]', date='$data[date]', 
        stops='$data[stops]', people='$data[people]', price='$data[price]'";

       if($sql =$this->conn->query($query)){
           return true;
       }else{
           return false;
         }
       }
    }


?>