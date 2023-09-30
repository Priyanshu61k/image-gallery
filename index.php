<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
    body
    {
      color:white;
      text-align:center;
      padding: 100px; 
      background-image: url("download2.jpg");
      height: 500px;
      background-position: center;
      background-repeat: no-repeat;
      background-color:plum; 
    }
    .login-form
    {
      margin:0;
      padding: 0;

      float:left;
      color:white;
      cursor: pointer;
      background-color:pink;
    
    }
    .modal-header
    {
     margin:0px;
     padding:5px;
    }
    .header1 div
    {
     display:inline-block ; 
    }
    #preview
    {
      display:none;
      height:20%;
      width:20%;
      color:#353535;
      background-color: #929292;
      position: static;
      border: 1px solid black;
    }
    #imagepreview
    {
      color:black;
      background-color:pink;
      
    }
    #imagepreview1
    {
      color:black;  
      background-color:pink;
      display:flex;
      flex-flow: row wrap;
      top: 50 % ;
      left: 50 % ;
    }
    #preview1
    {
      display:none;   
    }
    .upload
    {
      float:right;
    }
    #header12
    {
      color:red:
    }
    </style>
  </head>
  <body>
    <h1>Upload Images</h1>
    <div class="modal fade" id="exampleModal" tabindex="-1"aria-labelledby="exampleModalLabel" aria-hidden="true" >
      <div class="modal-dialog  modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <div class="modal-body">
              <div class="header1">
                <div class="login-form">
                  <form   method="post">
                   <a> <button id="1" value="1" name="1">Logo</button></a>
                    <button id="2" value="2" name="2">Gallery</button>
                    <button id="3" value="3" name="3">Banner</button>
                    <input id="access_token" type="hidden" name="access_token" value="<?php echo  $_SESSION['access_token']; ?>" />
                  </form>
                </div>
                <div class="upload">  
                  <form id="submitform" action="" method="post"  enctype="multipartform-data"> 
                    <input type="button" value="upload"  onclick="document.getElementById('fileInput').    click();" class="btn btn-primary" id="upload"    name="upload" />
                    <input id="fileInput" type="file" name="fileInput" style="display:none;" />
                    <input type="submit"  class="btn btn-primary" name="submit"  value="submit" />
                  </form>
                </div>
              </div>
              <div id="preview">
                <h3>image preview</h3>
                <form method="post"  id="selectform" action=" ">
                  <div id="imagepreview"></div>
                  <div id="selectbox">
                    <select name="cars" id="cars">
                      <option value="1"  class="logo1">logo</option>
                      <option value="2"  class="gallery1">gallery</option>
                      <option value="3"  class="banner1">banner</option>
                    </select>
                    <input type="submit"  class="btn btn-primary" name="submit1"id="submit1"  />
                  </div>
                </form>
              </div>
              <div id="preview1">
                <h3>image preview1</h3>
                <div id="imagepreview1"  ></div>
              </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></ button>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="click-images">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal"         data-bs-target="#exampleModal">
        ADD MEDIA FILES
      </button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function()
    {
      $("#submitform").on("submit",function(e){
        e.preventDefault();
        var formdata= new FormData(this);
        $.ajax
        ({
          url:"upload.php",
          type:"POST",
          data:formdata,
          contentType:false,
          processData:false,
          success: function(data)
          {
            $("#preview").show();
            $("#imagepreview").html(data);
            $("#fileInput").val('');
          }
        });
      });
    });
    </script>
    <script>
    $(document).ready(function()
    {
      $("#selectform").on("submit",function(e)
      {
        e.preventDefault();
        var formdata= new FormData(this);
        $.ajax
        ({
          url:"logic.php",
          type:"POST",
          data:formdata,
          contentType:false,
          processData:false,
          success: function (data){
            $("#imagepreview1").html(data); 
            $("#cars").val(''); 
            $("#preview1").show();
            $("#imagepreview1").html(data);
          }
        });
      });
    });
    </script>
    <script>
    $(document).ready(function()
    {
      $("#1").click(function(e)
      {
        e.preventDefault();
        $.ajax
        ({
          type: "POST",
          url: "logo.php",
          data:
          {
            id: $("#1").val(),
            access_token: $("#access_token").val()
          },
          success: function(data)
          {
            $("#preview1").show();
            $("#imagepreview1").html(data);
          },
        });
      });
    });
    </script>
    <script>
    $(document).ready(function()
    {
      $("#2").click(function(e)
      {
        e.preventDefault();
        $.ajax
        ({
          type: "POST",
          url: "gallery.php",
          data:
          {
            id: $("#2").val(),
            access_token: $("#access_token").val()
          },
          success: function(data)
          {
            $("#preview1").show();
            $("#imagepreview1").html(data);
          },
        });
      });
    });
    </script>
    <script>
    $(document).ready(function()
    {
      $("#3").click(function(e)
      {
        e.preventDefault();
        $.ajax
        ({
          type: "POST",
          url: "banner.php",
          data:
          {
            id: $("#3").val(),
            access_token: $("#access_token").val()
          },
          success: function(data)
          {
            $("#preview1").show();
            $("#imagepreview1").html(data);
          },
        });
      });
    });
   </script>
  </body>
</html>