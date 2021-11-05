<html>
    <head>
        <title>
            Graduate Students
</title>
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
            <h2>Download Data</h2>
</div>
<div>
<label for="year">Graduating Year:</label>

<select name="year" id="year">
  <option value="2015">2015</option>
  <option value="2016">2016</option>
  <option value="2017">2017</option>
  <option value="2018">2018</option>
</select>
</div>
<div>
    <button>Download Excel Sheet</button>
</div>
</body>
</html>