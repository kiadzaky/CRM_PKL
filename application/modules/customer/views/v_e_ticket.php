<!DOCTYPE html>
<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title></title>
    <style type="text/css">
        .width30 {
        width: 30%;
    }
    .width70 {
        width: 70%; 
    }
    .floatL{
        float: left;
    }
    .width50{
        width: 50%;
    }
    .floatR{
        float: right;
    }
    .btn{
        width: 100%;
        border-radius: 0px;
    }
    .width100{
        width: 100%;
    }
    .row{
        margin-left: -20px;
        margin-right: -20px;

    }
    .boxStyle{
        padding: 20px; 
        border-radius: 25px; 
        border-top: 6px solid #dc3545;
        border-bottom: 6px solid #28a745;
    }
    </style>
</head>
<body class="bg-dark">
    <header class="bg-dark" style="height: 60px; padding: 5px;">
        <h3 class="text-light" style="text-align: center;">FORM DESIGN WITH JS VALIDATION</h3>
    </header>
    <div class="container bg-dark">
    <div class="row">

        <div class="col-sm-1"></div>
        <div class="col-sm-2"></div>        
        <div class="col-sm-6 bg-light boxStyle">
            <h3 style="text-align: center;">E - TICKETING</h3><br>
            <?php echo validation_errors(); ?>
            <?php echo form_open(''); ?>
            <?= $this->session->userdata('message'); ?>
    <div class="form-group">
        <div class="width30 floatL"><label>Menu</label></div>
        <select class="form-control" name="menu_id">
            <?php foreach ($menu as $m) {
            ?>
            <option value="<?=$m->menu_id?>"><?= $m->menu ?></option>
            <?php
            } ?>
            
        </select>
    </div><br><br>
    <div class="form-group">
        <div class="width30 floatL"><label>Pesan</label></div>
        <div class="width70 floatR"><textarea style="height: 400px" class="width100 form-control"name="tiket_pesan"></textarea>
    </div><br><br>

    <!-- <div class="form-group">
        <div class="width30 floatL"><label>Lastname</label></div>
        <div class="width70 floatR"><input class="width100 form-control" name="lastname" type="text" value="" size="20"></div>
    </div><br>
    <div class="form-group">
        <div class="width30 floatL"><label>Email</label></div>
        <div class="width70 floatR"><input class="width100 form-control" name="email"  src=""   type="text" value="" size="20"></div>
    </div><br>
    <div class="form-group">
        <div class="width30 floatL"><label>Age</label></div>
        <div class="width70 floatR"><input class="width100 form-control" name="age" type="text" value="" size="20"></div>
    </div><br>
    <div class="form-group">
        <div class="width30 floatL"><label>Address</label></div>
        <div class="width70 floatR"><input class="width100 form-control" name="address" type="text" value="" size="20"></div>
    </div><br>
    <div class="form-group">
        <div class="width30 floatL"><label>Country</label></div>
        <div class="width70 floatR"><input class="width100 form-control" name="country" type="text" value="" size="20"></div>
    </div><br>
        <div class="form-group">
        <div class="width30 floatL"><label>Password</label></div>
        <div class="width70 floatR"><input class="width100 form-control" name="password" size="20" type="password"></div>
    </div><br>
        <div class="form-group">
        <div class="width30 floatL"><label>R-Password</label></div>
        <div class="width70 floatR"><input class="width100 form-control" name="password2" type="password" size="20"></div>
    </div><br>
        <div class="form-group">
        <div class="width30 floatL"><label>Interests:</label></div>
    </div>
    <div class="width70 floatR"><div class="form-group">
    <input name="ch" value="travel" type="radio">
    <label for="customRadio">Travel</label>
    <input name="ch" value="reading" type="radio">
    <label for="customRadio">Reading</label>
    <input name="ch" value="swimming" type="radio">
    <label for="customRadio">Swimming</label>
    </div></div> -->
    <br><br><br>

    <div class="form-group">
    <div class="row">
    <div class="width50"><input class="btn btn-success" type="submit"   value="Submit" style="font-weight: bold"></div>
    <div class="width50"><input class="btn btn-danger" type="reset" style="font-weight: bold"></div>        
    </div>
    </div>
     </form>      
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-2"></div>
    </div> 
    
</body>
</html>