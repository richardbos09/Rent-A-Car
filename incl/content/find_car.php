<?php

class FindCar extends Database {
  public $count;
  
  private $query;
  
  public function __construct() {
    $this->connDatabase();
    $this->dbError();
    $this->getCount();
    $this->getCars();
  }
  
  public function getCount() {
    $this->sql = "
      SELECT COUNT(c.car_id) AS count
			FROM cars AS c
    ";
    
    $this->query = mysqli_query($this->db, $this->sql);
    
    $this->row = mysqli_fetch_assoc($this->query);
    
    $this->count = $this->row['count'];
  }
  
  public function getCars() {
    $this->sql = "
      SELECT c.car_id, c.car_brand, c.car_type, c.car_desc, c.car_price, c.car_img
			FROM cars AS c
			ORDER BY c.car_price
    ";
    
    $this->query = mysqli_query($this->db, $this->sql);
  }
  
  public function putCars() {
    while($this->rows = mysqli_fetch_assoc($this->query)) {
      echo "<div class='column'>
              <div class='callout'>
                <p>".$this->rows['car_brand']." ".$this->rows['car_type']."</p>
                <p><img class='cars' src='img/".$this->rows['car_img']."'></p>
                <p class='lead'>".$this->rows['car_desc']."</p>
                <div class='row' style='width: 100%'>
                  <div class='large-6 columns' style='width: 50%'>
                    <h3>&euro; ".$this->rows['car_price']."</h3>
                  </div>
                  <div class='large-6 columns' style='width: 50%'>
                    <a href='reserveer?id=".$this->rows['car_id']."'><button type='button' class='button hollow reserve'>Reserveren</button></a>
                  </div>
                </div>
              </div>
            </div>
      ";
    }
  }
}

$findcar = new FindCar();
?>

<!--Find Car-->
<div class="row column">
  <p class="lead"><?php echo $findcar->count; ?> auto's gevonden</p>
</div>
<div class="row small-up-1 medium-up-2 large-up-3">
  <?php $findcar->putCars(); ?>
</div>