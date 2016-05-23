<?php

class Logout extends Globals {
  
  public function __construct() {
    if(isset($_POST['logout'])) {
      $this->destSession();
      $this->backToHome();
    }
  }
  
  public function destSession() {
    session_destroy();
  }
  
  public function backToHome() {
    header("Location: http://".$_SERVER['SERVER_NAME'].$this->project.$this->home);
  }
}

$logout = new Logout();
?>

<!--Modal Logout-->
<div class="reveal modal-container" id="logout" data-reveal>
  <form method="post">
    <label class="txt-center">Bent u zeker dat u wilt uitloggen?</label>
    <div class="row">
      <div class="large-6 columns btn-center">
        <button type="submit" name="logout" class="button btn-confirm">Ok</button>
      </div>
      <div class="large-6 columns btn-center">
        <button type="button" onclick="backToPage();" class="button hollow btn-confirm">Cancel</button></a>
      </div>
    </div>
    
  </form>
  
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>