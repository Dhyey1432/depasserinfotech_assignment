<?php include_once 'php/Sql_query.php';$sql = new Sql_query ; 
include_once 'php/Form_validation.php';$form_validation = new Form_validation ;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form_validate_check = json_decode($form_validation->execute($_POST , $_FILES["fileToUpload"]["name"]));
    if ($form_validate_check->status) {
        $target_dir = "uploads/";$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        if ($sql->Users($_POST,$_FILES["fileToUpload"]["name"]) == 1) {
            header("Location: user_list.php");exit();
        } 
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="description" content="Vali is a responseive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
        <title>Form Components - Vali Admin</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include_once 'common/css.php' ; ?>
    </head>
    <body class="app sidebar-mini rtl">
        <?php include_once 'common/header.php' ; ?>
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <?php include_once 'common/sidebar.php' ; ?>
        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1><i class="fa fa-edit"></i> Add new user </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="row">
                            <div class="col-lg-10">
                                <form method="post" accept-charset="utf-8" enctype='multipart/form-data' action="">
                                    <div class="form-group">
                                        <label>firstname</label>
                                        <input class="form-control" value="<?php echo isset($_POST['firstname']) ? $_POST['firstname'] : "" ?>" name="firstname" data-validation="email" type="firstname">
                                        <div class="text-danger"><?php echo isset($form_validate_check->message->firstname) ? $form_validate_check->message->firstname : "" ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label>lastname</label>
                                        <input class="form-control" value="<?php echo isset($_POST['lastname']) ? $_POST['lastname'] : "" ?>" name="lastname" type="text">
                                        <div class="text-danger"><?php echo isset($form_validate_check->message->lastname) ? $form_validate_check->message->lastname : "" ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email id</label>
                                        <input class="form-control" value="<?php echo isset($_POST['email']) ? $_POST['email'] : "" ?>" name="email" type="text">
                                        <div class="text-danger"><?php echo isset($form_validate_check->message->email) ? $form_validate_check->message->email : "" ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile number</label>
                                        <input class="form-control" value="<?php echo isset($_POST['contact']) ? $_POST['contact'] : ""  ?>" name="contact" type="text">
                                        <div class="text-danger"><?php echo isset($form_validate_check->message->firstname) ? $form_validate_check->message->lastname : "" ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" name="password" type="password">
                                        <div class="text-danger"><?php echo isset($form_validate_check->message->password) ? $form_validate_check->message->password : "" ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label>confirm Password</label>
                                        <input class="form-control" name="cpassword" type="password">
                                        <div class="text-danger"><?php echo isset($form_validate_check->message->cpassword) ? $form_validate_check->message->cpassword : "" ?></div>
                                    </div>
                                    <div class="form-group">
                                        <img id="blah" src="#" alt="your image" />
                                        <label id="image_lable">File input</label>
                                        <input class="form-control-file" name="fileToUpload" type='file' onchange="readURL(this);" >
                                        <div class="text-danger"><?php echo isset($form_validate_check->message->image) ? $form_validate_check->message->image : "" ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Address 1</label>
                                        <textarea class="form-control" rows="10" name="address_1"><?php echo isset($_POST['address_1']) ? $_POST['address_1'] : "" ?></textarea>
                                        <div class="text-danger"><?php echo isset($form_validate_check->message->address_1) ? $form_validate_check->message->address_1 : "" ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Address 2</label>
                                        <textarea class="form-control" rows="10" name="address_2"><?php echo isset($_POST['address_2']) ? $_POST['address_2'] : "" ?></textarea>
                                        <div class="text-danger"><?php echo isset($form_validate_check->message->address_2) ? $form_validate_check->message->address_2 : "" ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Country</label>
                                        <select class="form-control" name="country_id" id="select_country_create_new">
                                            <option value="0">---Select Country---</option>
                                            <?php foreach ($sql->getAllCuntry() as $country_data) : ?>
                                                <option value="<?php echo $country_data->id ?>"><?php echo $country_data->name ?></option>
                                            <?php endforeach ; ?>
                                        </select>
                                        <div class="text-danger"><?php echo isset($form_validate_check->message->country_id) ? $form_validate_check->message->country_id : "" ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label>State</label>
                                        <select class="form-control" name="state_id" id="select_state">
                                            <option value="0">---Select state---</option>
                                        </select>
                                        <div class="text-danger"><?php echo isset($form_validate_check->message->state_id) ? $form_validate_check->message->state_id : "" ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Cities</label>
                                        <select class="form-control" name="city_id" id="select_cities">
                                            <option value="0">---Select cities---</option>
                                        </select> 
                                        <div class="text-danger"><?php echo isset($form_validate_check->message->city_id) ? $form_validate_check->message->city_id : "" ?></div>
                                    </div>
                                    <div class="tile-footer">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </main>
        <?php include_once 'common/js.php' ; ?>
        <script type="text/javascript">
            $( document ).ready(function() {
                $("#blah").hide();
            });
        </script>
    </body>
</html>