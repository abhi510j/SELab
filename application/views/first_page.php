<html>
    <head>
        <title>
            Graduate Students
</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
    </style>
</head>
<body>
    <header>
        <div>
    <img src = "https://media.istockphoto.com/photos/bitten-apple-on-white-background-picture-id1190921276?s=612x612" width= 100 height = 70>
</div>
    <div >
    <button type="button">Logout</button>
</div>
</header>

<div>
        <h1>Faculty Name</h1>
    </div>
    <div>
    <a href="<?php echo base_url('/index.php/Welcome/first_page');?>">Update Status</a>
</div>
<div>
    <a href="<?php echo base_url('/index.php/Welcome/second_page');?>">Download Data</a>
</div>
        <div>
            <h2>Update Status</h2>
</div>
<div>
    <form method = "post" id = "import-form" enctype = "multipart/form-data">
        <p><label>Upload Excel File</label>
        <input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
        <br/>
        <input type="submit" name="import" value="Import" class="btn btn-info" />
</form>
<br/>
</div>
            <div>
        <p>
            File Specifications:
                <ul>
                    <li>Size should not exceed ___ MB.</li>
                        <li>Dataset should not contain details of students other than graduating students</li>
            </ul>
            </p>
</div>
<div>
        <button>Update Status</button>
</div>
<div>
        <button>Download Sample File </button>
</div>

<div class="table-responsive" id="student_data">
    
            </div>
</body>
</html>


<script>
    $(document).ready(function(){
        load_data();


        function load_data(){
            $.ajax({
                url:"<?php echo base_url(); ?>Excel_import/fetch",
                method: "POST",
                success: function(data){
                    $('#student_data').html(data);
                }
            })
        }

        $('#import-form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:"<?php echo base_url(); ?>Excel_import/import",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                success: function(data){
                    $('#file').val('');
                    load_data();
                    alert(data);
                }
            })
        });
    });
    </script>