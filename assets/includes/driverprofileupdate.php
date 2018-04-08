<?php
//Starts the session if it is not already started
if(!isset($_SESSION)){
	session_start();
}


	//Sets the base directory of the host
    if(!defined('BASE')){
        define('BASE', $_SERVER["DOCUMENT_ROOT"]);
    }

?>
<div class="container">
    <div class="owner">
        <div class="avatar">
            <img src="https://www.moonlight-limo.net/wp-content/uploads/2015/05/icon-driver.png" alt="Circle Image" class="img-circle img-padding img-responsive">
        </div>
        <div class="name">
          <h4 class="title"><?php echo $_SESSION['driverName']; ?><br></h4>
          <h6 class="description">Driver ID: <?php echo $_SESSION['driverId']; ?></h6>
        </div>
    </div>
    <div class="section profile-content"></div>
    <div class="container">
      <div class="row">
          <div class="col-12 mr-auto text-center">
            <div class="input-group input-group-sm mb-3">
                <div class="input-group">
                  <span class="input-group-addon text-danger"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" id="driverName" value="<?php echo $_SESSION['driverName']; ?>" aria-describedby="driverName" name="driverName">
                </div>
            </div>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group">
                  <span class="input-group-addon text-danger"><i class="fa fa-phone"></i></span>
                    <input type="text" class="form-control" id="driverPhone" value="<?php echo $_SESSION['phone']; ?>" aria-describedby="driverName" name="driverPhone">
                </div>
            </div>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group">
                  <span class="input-group-addon text-danger"><i class="fa fa-ambulance"></i></span>
                    <input type="text" class="form-control" id="vehicleId" value="<?php echo $_SESSION['vehicleId']; ?>" aria-describedby="vehicleId" name="vehicleId">
                </div>
            </div>
            <br>
            <btn class="btn btn-outline-danger btn-round" id="update"><i class="fa fa-cog"></i> Update</btn>
          </div>
      </div>
    </div>
</div>
