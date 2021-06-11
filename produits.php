<?php
  // Se connecter à la base de données
  include("db_connect.php");
  include("produit.class.php");
  header('Content-Type: application/json');
  $request_method = $_SERVER["REQUEST_METHOD"];
  $produit = new Produit();
?>

<?php
  switch($request_method)
  {
    case 'GET':
      if(!empty($_GET["id"]))
      {
        // Récupérer un seul produit
        $id = intval($_GET["id"]);
        echo $produit->getProduct($id);
      }
      else
      {
        // Récupérer tous les produits
        echo $produit->getProducts();
      }
      break;
    case 'POST':
        // Ajouter un produit
        echo $produit->AddProduct();
        break;
    case 'PUT':
        // Modifier un produit
        $id = intval($_GET["id"]);
        echo $produit->updateProduct($id);
        break;
    case 'DELETE':
        // Supprimer un produit
        $id = intval($_GET["id"]);
        echo $produit->deleteProduct($id);
        break;
    default:
      // Requête invalide
      header("HTTP/1.0 405 Method Not Allowed");
      break;
  }
?>