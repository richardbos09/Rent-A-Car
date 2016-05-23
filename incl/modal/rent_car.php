<?php
if(isset($_POST['id'])) {
 require_once "../globals.php";
 require_once $globals->database_php;
}

class RentCar extends Database {
  public $brand;
  public $type;
  public $desc;
  public $price;
  
  public $pickup;
  public $bringback;
  public $begintime;
  public $endtime;
  
  public $subtotal;
  public $percentage;
  public $btw;
  public $total;
  
  
  public function __construct() {
    if(isset($_POST['id'])) {
      $this->pickup = $_POST['pickup'];
      $this->bringback = $_POST['bringback'];
      $this->begintime = $_POST['begintime'];
      $this->endtime = $_POST['endtime'];
      
      $this->subtotal = $_POST['subtotal'];
      $this->percentage = $_POST['percentage'];
      $this->btw = $_POST['btw'];
      $this->total = $this->subtotal + $this->btw;

      $this->connDatabase();
      $this->dbError();
      $this->getCar();
    }
  }
  
  public function getCar() {
    $this->sql = "
      SELECT c.car_id, c.car_brand, c.car_type, c.car_desc, c.car_price
			FROM cars AS c
      WHERE c.car_id = '".$_POST['id']."'
    ";
    
    $this->query = mysqli_query($this->db, $this->sql);
    
    $this->row = mysqli_fetch_assoc($this->query);
    
    $this->brand = $this->row['car_brand'];
    $this->type = $this->row['car_type'];
    $this->desc = $this->row['car_desc'];
    $this->price = $this->row['car_price'];
  }
}

$rentcar = new RentCar();
?>

<!--Modal Rent Car-->
<div class="reveal modal-container" id="rent" data-reveal>
  <h1>Huur auto</h1>
  <hr>
  <label>Auto keuze: <?php echo $rentcar->brand." ".$rentcar->type; ?><label>
  <label>Omschrijving: <?php echo $rentcar->desc; ?><label>
  <br>
  <div class="row">
    <div class="large-6 float-left">
      <label>Ophalen:<label>
      <label>Terugbrengen:<label>
      <label>Begin tijd:<label>
      <label>Eind tijd:<label>
    </div>
    <div class="large-6 float-left">
      <label id="pick-up"><?php echo $rentcar->pickup; ?><label><label>
      <label id="bring-back"><?php echo $rentcar->bringback; ?><label><label>
      <label id="begin-time"><?php echo $rentcar->begintime; ?><label><label>
      <label id="end-time"><?php echo $rentcar->endtime; ?><label><label>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="large-6 float-left">
      <label>Prijs per dag:<label>
      <label>Subtotaal:<label>
      <label>BTW <?php echo $rentcar->percentage; ?>%</label>
      <label>Totaal:<label>
    </div>
    <div class="large-6 float-left">
      <label id="price">&euro;  <?php echo number_format($rentcar->price, 2, ',', ' '); ?><label>
      <label id="subtotal">&euro; <?php echo number_format($rentcar->subtotal, 2, ',', ' '); ?><label>
      <label id="btw">&euro; <?php echo number_format($rentcar->btw, 2, ',', ' '); ?><label>
      <label id="total">&euro; <?php echo number_format($rentcar->total, 2, ',', ' '); ?><label>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="large-6 float-left">
      <button type="button" name="pay" class="button btn-confirm">Betaal</button>
    </div>
    <div class="large-6 float-left">
      <button type="button" onclick="backToPage();" class="button hollow btn-confirm">Cancel</button></a>
    </div>
  </div>
  
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>