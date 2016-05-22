<?php

class FindCar extends Database {
  public $count;
  
  private $rows;
  
  public function __construct() {
    $this->connDatabase();
    $this->dbError();
    $this->getCars();
  }
  
  public function getCars() {
    $this->sql = "
      SELECT COUNT(c.car_id) AS count, c.car_id, c.car_brand, c.car_type, c.car_description, c.car_price
			FROM cars AS c
			ORDER BY c.car_price
    ";
    
    $this->query = mysqli_query($this->db, $this->sql);
    
    $this->rows = mysqli_fetch_assoc($this->query);
    
    $this->count = $this->rows['count'];
  }
  
  public function putCars() {
    while($this->rows) {
      echo "<div class='column'>
              <div class='callout'>
                <p>Merk Type</p>
                <p><img src='http://placehold.it/650x350'></p>
                <p class='lead'>Omschrijving</p>
                <div class='row' style='width: 100%'>
                  <div class='large-6 columns' style='width: 50%'>
                    <h3>&euro; 0,00</h3>
                  </div>
                  <div class='large-6 columns' style='width: 50%'>
                    <a href='reserveer' ><button type='button' class='button hollow reserve'>Reserveren</button></a>
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
  <?php ?>
  <!--<div class="column">
    <div class="callout">
      <p>Merk Type</p>
      <p><img src="http://placehold.it/650x350" alt="image of a planet called Pegasi B"></p>
      <p class="lead">Omschrijving</p>
      <div class="row" style="width: 100%">
        <div class="large-6 columns" style="width: 50%">
          <h3>&euro; 0,00</h3>
        </div>
        <div class="large-6 columns" style="width: 50%">
          <a href="reserveer" ><button type="button" class="button hollow reserve">Reserveren</button></a>
        </div>
      </div>
    </div>
  </div>
  <div class="column">
    <div class="callout">
      <p>Merk Type</p>
      <p><img src="http://placehold.it/650x350" alt="image of a planet called Pegasi B"></p>
      <p class="lead">Omschrijving</p>
      <div class="row" style="width: 100%">
        <div class="large-6 columns" style="width: 50%">
          <h3>&euro; 0,00</h3>
        </div>
        <div class="large-6 columns" style="width: 50%">
          <a href="reserveer" ><button type="button" class="button hollow reserve">Reserveren</button></a>
        </div>
      </div>
    </div>
  </div>
  <div class="column">
    <div class="callout">
      <p>Merk Type</p>
      <p><img src="http://placehold.it/650x350" alt="image of a planet called Pegasi B"></p>
      <p class="lead">Omschrijving</p>
      <div class="row" style="width: 100%">
        <div class="large-6 columns" style="width: 50%">
          <h3>&euro; 0,00</h3>
        </div>
        <div class="large-6 columns" style="width: 50%">
          <a href="reserveer" ><button type="button" class="button hollow reserve">Reserveren</button></a>
        </div>
      </div>
    </div>
  </div>-->
</div>