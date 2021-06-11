<?php
class Produit{
    public function getProducts()//liste de tous les produit exister
        {
            global $conn;
            $query = "SELECT * FROM produit";
            $response = array();
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result))
            {
            $response[] = $row;
            }
            header('Content-Type: application/json');
            return json_encode($response, JSON_PRETTY_PRINT);
        }
    public function getProduct($id=0)//un seul produit
        {
          global $conn;
          $query = "SELECT * FROM produit";
          if($id != 0)
          {
            $query .= " WHERE id=".$id." LIMIT 1";
          }
          $response = array();
          $result = mysqli_query($conn, $query);
          while($row = mysqli_fetch_array($result))
          {
            $response[] = $row;
          }
          header('Content-Type: application/json');
          return json_encode($response, JSON_PRETTY_PRINT);
        }
    public function AddProduct()//ajouter produit
        {
          global $conn;
          $name = $_POST["name"];
          $description = $_POST["description"];
          $price = $_POST["price"];
          $category = $_POST["category"];
          $created = date('Y-m-d H:i:s');
          $modified = date('Y-m-d H:i:s');
      
           $query="INSERT INTO produit(name, description, price, category_id, created, modified) VALUES('".$name."', '".$description."', '".$price."', '".$category."', '".$created."', '".$modified."')";
      
          if(mysqli_query($conn, $query))
          {
            $response=array(
              'status' => 1,
              'status_message' =>'Produit ajoute avec succes.'
            );
          }
          else
          {
            $response=array(
              'status' => 0,
              'status_message' =>'ERREUR!.'. mysqli_error($conn)
            );
          }
          header('Content-Type: application/json');
          return json_encode($response);
    }
    public function updateProduct($id)//mettre ajour
    {
        global $conn;
        $_PUT = array(); //tableau qui va contenir les données reçues
        parse_str(file_get_contents('php://input'), $_PUT);
        $name = $_PUT["name"];
        $description = $_PUT["description"];
        $price = $_PUT["price"];
        $category = $_PUT["category"];
        $modified = date('Y-m-d H:i:s');

        //construire la requête SQL
        $query="UPDATE produit SET name='".$name."', description='".$description."', price='".$price."', category_id='".$category."', modified='".$modified."' WHERE id=".$id;
        
        if(mysqli_query($conn, $query))
        {
        $response=array(
            'status' => 1,
            'status_message' =>'Produit mis a jour avec succes.'
        );
        }
        else
        {
        $response=array(
            'status' => 0,
            'status_message' =>'Echec de la mise a jour de produit. '. mysqli_error($conn)
        );
        
        }
        
        header('Content-Type: application/json');
        return json_encode($response);
    }
    public function deleteProduct($id)//supprimer un produit
    {
        global $conn;
        $query = "DELETE FROM produit WHERE id=".$id;
        if(mysqli_query($conn, $query))
        {
        $response=array(
            'status' => 1,
            'status_message' =>'Produit supprime avec succes.'
        );
        }
        else
        {
        $response=array(
            'status' => 0,
            'status_message' =>'La suppression du produit a echoue. '. mysqli_error($conn)
        );
        }
        header('Content-Type: application/json');
        return json_encode($response);
    }
}