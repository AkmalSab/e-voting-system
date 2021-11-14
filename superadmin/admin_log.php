<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-black-light sidebar-mini">
<div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Log Activity</li>
            </ol>
        </section>
        <!-- Main content -->

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Log Activity (Admin)
            </h1>

        </section>
        <!-- Main content -->
        <section class="content">
            <?php
            if(isset($_SESSION['error'])){
                echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
                unset($_SESSION['error']);
            }
            if(isset($_SESSION['success'])){
                echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
                unset($_SESSION['success']);
            }
            ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <!--                            <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                            -->                        </div>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered">
                                <thead>
                                <th>ID</th>
                                <th>Date & Time</th>
                                <th>Description</th>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "SELECT * FROM logfile where category = 'Admin'";
                                $query = $conn->query($sql);
                                while($row = $query->fetch_assoc()){
                                    echo "
                        <tr>
                          <td>".$row['id']."</td>
                          <td>".$row['date']."</td>
                          <td>".$row['firstname'].' '.$row['nric'].' '.$row['status'].' '.$row['description']."</td>
                        </tr>
                      ";
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/admin_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
    $(function(){
        <!-- Edit button Function -->
        $(document).on('click', '.edit', function(e){
            e.preventDefault();
            $('#edit').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });
        <!-- Delete button Function -->

        $(document).on('click', '.delete', function(e){
            e.preventDefault();
            $('#delete').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });
        <!-- Approve button Function -->

        $(document).on('click', '.approve', function(e){
            e.preventDefault();
            $('#approve').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });
        <!-- Reject button Function -->
        $(document).on('click', '.reject', function(e){
            e.preventDefault();
            $('#reject').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $(document).on('click', '.photo', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            getRow(id);
        });

    });

    function getRow(id){
        $.ajax({
            type: 'POST',
            url: 'admin_row.php',
            data: {id:id},
            dataType: 'json',
            success: function(response){
                $('.id').val(response.id);
                $('#edit_firstname').val(response.firstname);
                $('#edit_lastname').val(response.lastname);
                $('#edit_password').val(response.password);
                $('.fullname').html(response.firstname+' '+response.lastname);
            }
        });
    }

</script>
</body>
</html>
