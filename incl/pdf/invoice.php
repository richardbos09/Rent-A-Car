<?php
require_once "../../globals.php";
require_once $globals->database_php;
require_once $globals->tcpdf_php;
 
class Invoice extends TCPDF {
  public $firstname = "";
  public $lastname = "";
  public $address = "";
  public $postal_code = "";
  public $city = "";
  public $country = "";
  public $offer_id = "";
  public $date = "";
  public $customer_id = "";
  public $description = "";
  public $price = "";
  
  private $sql;
  private $query;
  private $offers = [];
  
  public function ConnectDB() {
    $this->connDatabase();
    $this->dbError();
  }
  
  public function GetData() {
    $this->sql = "
      SELECT o.offers_id, o.customers_id, o.offers_subtotal_price, o.offers_description, o.offers_date, 
             c.customers_id, c.firstname, c.lastname, c.company,
             a.address, a.city, a.country, a.postal_code
      FROM offers AS o, customers AS c, addresses AS a
      WHERE o.offers_id = ".$_GET['offer_id']."
        AND o.customers_id = ".$_GET['customer_id']."
        AND c.customers_id = ".$_GET['customer_id']."
        AND a.addresses_id = ".$_GET['customer_id']."
    ";
    
    $this->query = mysqli_query($this->db, $this->sql);
    
    while ($this->row = mysqli_fetch_assoc($this->query)) {
      $this->offers = $this->row;
    }
  }
  
  public function SetData() {
    $this->firstname = $this->offers['firstname'];
    $this->lastname = $this->offers['lastname'];
    $this->address = $this->offers['address'];
    $this->postal_code = $this->offers['postal_code'];
    $this->city = $this->offers['city'];
    $this->country = $this->offers['country'];
    
    $this->offer_id = $this->offers['offers_id'];
    $this->date = $this->offers['offers_date'];
    $this->customer_id = $this->offers['customers_id'];
    $this->description = $this->offers['offers_description'];
    $this->price = $this->offers['offers_subtotal_price'];
  }
  
	public function Header() {
    // set document (meta) information
    $this->SetCreator(PDF_CREATOR);
    $this->SetAuthor('Wigmans');
    $this->SetTitle("Offerte #".$this->offer_id);
    $this->SetKeywords('PDF, offerte');

    // create address box
    $this->CreateTextBox("Offerte", 0, 10, 0, 10, 20);
    $this->CreateTextBox($this->firstname." ".$this->lastname, 0, 55, 0, 10, 10, '', 'L');
    $this->CreateTextBox($this->address, 0, 60, 0, 10, 10, '', 'L');
    $this->CreateTextBox($this->postal_code." ".$this->city, 0, 65, 0, 10, 10, '', 'L');
    $this->CreateTextBox($this->country, 0, 70, 0, 10, 10, '', 'L');
    $this->CreateTextBox("Offertenummer: #".$this->offer_id, 0, 85, 0, 10, 10, '', 'L');
    $this->CreateTextBox("Offertedatum:  ".$this->date, 0, 90, 0, 10, 10, '', 'L');
    $this->CreateTextBox("Klantnummer:   #".$this->customer_id, 0, 95, 0, 10, 10, '', 'L');
    
		$this->setJPEGQuality(90);
		$this->Image($_SERVER['DOCUMENT_ROOT'].$this->project."/img/logo/albeda_paint_logo.png", 150, 10, 35, 0, "PNG", "");
    $this->CreateTextBox("Albeda Paint", 130, 55, 0, 10, 10, '', 'L');
    $this->CreateTextBox("Stolwijkstraat 8", 130, 60, 0, 10, 10, '', 'L');
    $this->CreateTextBox("3079 DN Rotterdam", 130, 65, 0, 10, 10, '', 'L');
    $this->CreateTextBox("Nederland", 130, 70, 0, 10, 10, '', 'L');
    $this->CreateTextBox("010 292 90 29", 130, 80, 0, 10, 10, '', 'L');
    $this->CreateTextBox("r.wigmans@albeda.nl", 130, 85, 0, 10, 10, '', 'L');
    $this->CreateTextBox("KvK:99990000", 130, 90, 0, 10, 10, '', 'L');
    $this->CreateTextBox("IBAN:NL30RABO0130273619", 130, 95, 0, 10, 10, '', 'L');
	}
  
  public function Content() {
    // list headers
    $this->CreateTextBox('Omschrijving', 0, 120, 90, 10, 10, 'B');
    $this->CreateTextBox('Bedrag', 140, 120, 30, 10, 10, 'B', 'R');
    
    $this->Line(20, 129, 195, 129);
    
    // some data
    $offer[] = array("descr" => $this->description, "price" => $this->price);
    
    $currY = 128;
    $subprice = 0;
    foreach ($offer as $row) {
      $this->CreateTextBox($row['descr'], 0, $currY, 90, 10, 10, '');
      $this->CreateTextBox('€ '.$row['price'], 140, $currY, 30, 10, 10, '', 'R');
      $amount = $row['price'];
      $currY = $currY+5;
      $subprice = $subprice+$amount;
    }
    $btwprice = $subprice / 100 * 21;
    $totalprice = $subprice + $btwprice;
    $this->Line(20, $currY+4, 195, $currY+4);
    
    // output the subtotal row 
    $this->CreateTextBox('Subtotaal', 0, $currY+5, 135, 10, 10, '', 'R');
    $this->CreateTextBox('€ '.number_format($subprice, 2, '.', ''), 140, $currY+5, 30, 10, 10, '', 'R');
    // output the BTW row
    $this->CreateTextBox('BTW 21%', 0, $currY+10, 135, 10, 10, '', 'R');
    $this->CreateTextBox('€ '.number_format($btwprice, 2, '.', ''), 140, $currY+10, 30, 10, 10, '', 'R');
    // output the total row
    $this->CreateTextBox('Totaal', 0, $currY+15, 135, 10, 10, 'B', 'R');
    $this->CreateTextBox('€ '.number_format($totalprice, 2, '.', ''), 140, $currY+15, 30, 10, 10, 'B', 'R');
    
    // some payment instructions or information
    $this->setXY(20, $currY+30);
    $this->SetFont(PDF_FONT_NAME_MAIN, '', 10);
    $this->MultiCell(175, 10, '<em>Graag ontvangen wij bericht binnen 14 dagen onder vermelding van offertenummer en klantnummer. ', 0, 'L', 0, 1, '', '', true, null, true);
  }
  
	public function Footer() {
		$this->SetY(-15);
		$this->SetFont(PDF_FONT_NAME_MAIN, 'I', 8);
		$this->Cell(0, 10, 'Albeda Paint', 0, false, 'C');
	}
  
	public function CreateTextBox($textval, $x = 0, $y, $width = 0, $height = 10, $fontsize = 10, $fontstyle = '', $align = 'L') {
		$this->SetXY($x+20, $y); // 20 = margin left
		$this->SetFont(PDF_FONT_NAME_MAIN, $fontstyle, $fontsize);
		$this->Cell($width, $height, $textval, 0, false, $align);
	}
  
  public function CreatePDF() {
    $this->Output($_SERVER['DOCUMENT_ROOT'].$this->project."/incl/offers/templates/test.pdf", "I");
  }
}

// create a PDF object
$pdf = new Invoice(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Connect to database and get/set data
$pdf->ConnectDB();
$pdf->GetData();
$pdf->SetData();
 
// add a page
$pdf->AddPage();
 
$pdf->Content();

//Close and output PDF document
$pdf->CreatePDF();
?>