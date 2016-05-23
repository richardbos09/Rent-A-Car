<?php

class ReserveCar extends Database {
  public $price = "0.00";
  
  public $percentage;
  public $id;
  public $disabled = "disabled";
  public $btntext = "Geen auto geselecteerd";
  
  public $img;
  public $brand;
  public $type;
  public $sign;
  public $kind;
  public $desc;
  public $gps;
  
  public function __construct() { 
    $this->percentage = $this->btw;
    
    if(isset($_GET['id'])) {
      $this->id = $_GET['id'];
      $this->disabled = "";
      $this->btntext = "Auto huren";
      
      $this->connDatabase();
      $this->dbError();
      $this->getCar();
    }
  }
  
  public function getCar() {
    $this->sql = "
      SELECT c.car_id, c.car_sign, c.car_brand, c.car_type, c.car_kind, c.car_desc, c.car_gps, c.car_price, c.car_img
			FROM cars AS c
      WHERE c.car_id = '".$_GET['id']."'
    ";
    
    $this->query = mysqli_query($this->db, $this->sql);
    
    $this->row = mysqli_fetch_assoc($this->query);
    
    $this->img = $this->row['car_img'];
    $this->brand = $this->row['car_brand'];
    $this->type = $this->row['car_type'];
    $this->sign = $this->row['car_sign'];
    $this->kind = $this->row['car_kind'];
    $this->desc = $this->row['car_desc'];
    $this->gps = $this->row['car_gps'];
    $this->price = $this->row['car_price'];
  }
}

$reservecar = new ReserveCar();
?>

<!--Reserve Car-->
<div class="row">
  <div class="medium-6 columns">
    <img class="thumbnail" src="img/<?php echo $reservecar->img; ?>">
  </div>
  <div class="medium-6 large-5 columns">
    <h3><?php echo $reservecar->brand." ".$reservecar->type; ?></h3>
    <ul style="list-style-type:none">
      <li>Kenteken: <?php echo $reservecar->sign; ?></li>
      <li>Soort: <?php echo $reservecar->kind; ?></li>
      <li>Omschrijving: <?php echo $reservecar->desc; ?></li>
      <li>GPS: <?php echo $reservecar->gps; ?></li>
    </ul>
    <h3>&euro; <?php echo number_format($reservecar->price, 2, ',', ' '); ?> per dag</h3>
    <h6 class="subheader">excl. btw <?php echo $reservecar->percentage; ?>%</h6>
    <input type="hidden" class="price" value="<?php echo $reservecar->price; ?>">
    <input type="hidden" class="btw" value="<?php echo $reservecar->percentage; ?>">
    <div class="row">
      <div class="large-6 columns">
        <input type="text" class="pick-up" placeholder="Ophalen" onchange="callOfDays()" readonly>
      </div>
      <div class="large-6 columns">
        <input type="text" class="bring-back" placeholder="Terugbrengen" onchange="callOfDays()" readonly>
      </div>
    </div>
    <div class="row">
      <div class="large-6 columns">
        <input type="text" class="begin-time" placeholder="Begin tijd">
      </div>
      <div class="large-6 columns">
        <input type="text" class="end-time" placeholder="Eind tijd">
      </div>
    </div>
    <div class="row">
      <div class="large-12 columns">
        <input type="text" class="subtotal" placeholder="Totaal prijs" disabled>
      </div>
    </div>
    <button class="button large expanded" onclick="validateReserve(<?php echo $reservecar->id; ?>);"  <?php echo $reservecar->disabled; ?> ><?php echo $reservecar->btntext; ?></button>
  </div>
</div>