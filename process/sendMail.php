<?php
include('../libs/index.php');

if(isset($_GET["mailType"]) && $_GET["mailType"] == "orderRecive" && isset($_GET["sessionId"])){
    $uniqueVisitorId = $_GET["sessionId"];
    $o_firstname = $_GET["o_firstname"];
    $o_lastname = $_GET["o_lastname"];
    $o_address1 = $_GET["o_address1"];
    $o_address2 = $_GET["o_address2"];
    $o_city = $_GET["o_city"];
    $o_state = $_GET["o_state"];
    $o_pincode = $_GET["o_pincode"];
    $userMobile = $_GET["userMobile"];
    $o_contact2 = $_GET["o_contact2"];
?>

  

<container>
  <a href="<?PHP echo $url; ?>"><img src="<?PHP echo $url; ?>images/logo.png"/></a>
  <h1>Order Recived #<?PHP echo $orderNo; ?></h1>
  <left><strong>To</strong>
    <address><?PHP echo $o_firstname.' '.$o_lastname; ?><br/><?PHP echo $o_address1; if(!empty($o_address2)){ echo ', '.$o_address2;} ?><br/><?PHP echo $o_city.', '.$o_state.' - '.$o_pincode; ?><br>Contact : <?PHP echo $userMobile; if(!empty($o_contact2)){ echo ', '.$o_contact2; } ?></address>
  </left>
  <table>
    <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
<?PHP
    $sql = "SELECT * FROM `cartitem` WHERE `uniqueuserid` = '$uniqueVisitorId' AND `active` = '1'";
    $result = $conn->query($sql);
    $carttotal = 0;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
                $pId = get_productId($conn, $row["productid"]);
                $pUrl = get_productURL($conn, $row["productid"]);
                $item = '';
                $get_options = get_options($conn, $pId);
                $get_optionsid = get_options_id($conn, $pId);
                $image = $url."product/". get_productImage($conn, $pId);
?>
      <tr>
        <td><a href="<?PHP echo $url; ?>product.php?producturl="><img src="<?PHP echo $image; ?>"/></a></td>
        <td><a href="<?PHP echo $url; ?>product.php?producturl="><?PHP echo $row["productid"]; ?></a></td>
        <td>Rs. <?PHP echo $row["productPrice"]; ?></td>
        <td><?PHP echo $row["productQuantity"]; ?></td>
        <td><?PHP echo $row["productTotal"]; ?></td>
      </tr>
<?PHP   
        }
    }
?>
    </tbody>
  </table>
  <p>Copyright 2018 by <a href="<?PHP echo $url; ?>"><?PHP echo $sitename; ?></a></p>
</container>
<?PHP
}
?>
<style>
@import "https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&subset=cyrillic,cyrillic-ext,latin-ext";
$accent: #eb9393;
container, left, right, img {
    display: block;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

container {
    max-width: 940px;
    width: 100%;
    background-color: #fff;
    border: 1px solid #eaeaea;
    margin: 2rem auto 0;
    min-height: 200px;
    padding: 1rem 3rem;
    
    &:before {
        display: table;
        content: " ";
    }
    
    &:after {
        clear: both;
        content: " ";
    }
    
    img {
        margin: 1.25rem auto;
    }
        
    right {
        float: right;
    }
        
}

h1, h2, h3, h4, h5, h6, p, span, 
a, small, strong, i, address {
    font-family: "Open Sans", sans-serif;
    color: #777;
}

a {
    text-decoration: none;
    -webkit-transition: all 200ms linear;
    transition: all 200ms linear;
    &:hover {
        color: darken($accent, 10%);
    }
}

h1 {
    text-align: center;
    font-weight: 200;
    font-size: 1.75rem;
}

p, strong, i, a, address {
    font-size: 0.8rem;
}

strong {
    text-transform: uppercase;
}

address {
    font-style: normal;
}

p {
    text-align: center;
}

table {
    width: 100%;
    margin: 2rem 0;
    border-collapse: collapse;
    thead tr th {
        text-align: left;
        color: #777;
        
        &:first-child {
            width: 130px;
        }
                
    }

    tbody tr td {
        padding: 0.5rem 0;
        color: #777;
        border-bottom: 1px solid #eaeaea;
        width: 33.33%;
        
        &:nth-child(1) {
            width: 12%;
        }
        
        &:nth-child(2) {
            width: 40%;
        }
        &:nth-child(3) {
            width: 20%;
        }
                
        img {
            max-width: 75px;
            margin-left: 0;
            margin-top: 0;
            margin-bottom: 0;
        }
        a{
            color: $accent;
        }
    }
}
</style>