<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Interview TASK</title>
  </head>
  <body>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-6 col-md-6 mx-auto my-4">
          <div class="card p-3">
            <div class="card-body">
              <div class="card-title display-4 text-center">
                Add Student
              </div>
              <hr>
            <form id="form" action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="studentName" id="studentName" class="form-control my-3" placeholder="Student Name">
            <input type="text" name="age" id="age" class="form-control my-3" placeholder="Age">
            <input type="text" name="city" id="city" class="form-control my-3" placeholder="City">
            <input type="file" name="image" id="image" class="form-control my-3">
            <button class="btn btn-primary" type="submit" id="submitbtn">Submit</button>
          </forom>
          </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 mx-auto my-4">
         <div class="showData"></div>
        </div>
      </div>
    </div>
  </section>

  <!-- Jquery CDN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  <script>
    $(document).ready(function(){
      displayData();
    })
   
    //  inserting data into the database
      $("#form").on("submit", function(event){
        event.preventDefault();
        $.ajax({
          url:"backend.php",
          type: "POST",
          data : new FormData(this),
          contentType:false,
          processData:false,
          success:function(data,status){
            displayData();
          }
        })
      })

       //  fetching and displaying data from the database
       var records = "records";
      function displayData(e)
    { 
        $.ajax({
          url:"backend.php",
          type:"POST",
          data:{records:records},
          success:function(data, status)
          {
            $(".showData").html(data);
          }
        })
      e.preventDefault();
    }
    
  </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </body>
</html>