<?php include_once 'php/Sql_query.php';$sql = new Sql_query ; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Data Table - Vali Admin</title>
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
                    <h1><i class="fa fa-th-list"></i> Data Table</h1>
                    <p>Table to display analytical data effectively</p>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($sql->getUserData() as $user_data) : ?>
                                    <tr>
                                        <td><?php echo $user_data->firstname . " " . $user_data->lastname ?></td>
                                        <td><?php echo $user_data->email ; ?></td>
                                        <td><?php echo $user_data->contact ; ?></td>
                                        <td><a href="edit_user.php?user_id=<?php echo $sql->encode_data($user_data->id) ?>"><button class="btn btn-primary">edit</button></a></td>
                                        <td><a href="delete_user.php?user_id=<?php echo $sql->encode_data($user_data->id) ?>"><button class="btn btn-danger">Delete</button></a></td>
                                    </tr>
                                    <?php endforeach ; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include_once 'common/js.php' ; ?>
        <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript">$('#sampleTable').DataTable();</script>
    </body>
</html>