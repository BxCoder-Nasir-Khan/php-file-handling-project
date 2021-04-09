<?php 
  session_start();
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />


    <style>
      .download-btn,.delete-form{
        display: inline-block !important;
        padding: 5px;
      }
      .delete-btn,.download-all-btn{
        border: 0px solid red;
        background:none;
        cursor: pointer;
      }
      .checkbox .custom-checkbox{
        top: 0;
        right: -25px;
        
      }
      .download-all-btn{
        border:1px solid #333;
      }
    </style>

    <title>PHP File Handling</title>
  </head>
  <body>
    

    <div class="container">
      <div class="row justify-content-center my-4">
        <div class="col-12 col-lg-8">
          <div class="card p-3">
            <h1 class="text-center">PHP File Handling</h1>


            <form action="script/upload.php" method="post" enctype="multipart/form-data">
              <label for="my_file">Upload File</label>
              <input required id="my_file" type="file" name="my_file" class="form-control">

              <input type="submit" name="upload_btn" class="form-control btn btn-info mt-3 rounded-0">
            </form>
            <!-- end file upload -->


            <!-- message show div -->

            <?php 
              if(isset($_SESSION['message']) && $_SESSION['message'] != '' ){
                echo '<div class="alert alert-info mt-3">'.$_SESSION['message'] .'</div>';
                $_SESSION['message'] = '';
              }
            ?>
            
            
          </div>
        </div>

        <div class="col-12 col-lg-8 mt-4">

           <div class="row mb-2">
             <div class="col-6">
               <h5 class="text-left">All files</h5>
             </div>
             <div class="col-6 text-right">
               <form action="script/download-all.php" method="POST">
                 <button class="download-all-btn"> <i class="fa fa-download" aria-hidden="true"></i> Download All</button>
               </form>
               <!-- end download all -->
             </div>
           </div>

          <table class="table table-bordered">
            <thead>
              <tr align="center">
                <th scope="col">No</th>
                
                <th scope="col">Name</th>
                <th scope="col">Preview</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

              <?php 
                $location = "./upload";
                $folder = opendir($location);

                if($folder){
                  $index = 0;
                    while (false != ($image = readdir($folder))) {
                     

                      if($image != '.' && $image != '..'){

                           $index++;
                           
                          $image_path = "upload/".$image;

                          echo '

                            <tr align="center">
                              <th scope="row">'.$index.'</th>
                              <td>'.$image.'</td>
                              <td align="center">
                                <a target="_blank" href="'.$image_path.'">
                                  <img width="30px" src="'.$image_path.'" alt="">
                                </a>
                              </td>
                              <td>
                                <a class="download-btn" href="'.$image_path.'" download>
                                 <i class="fa fa-download" aria-hidden="true"></i>
                                </a> 
                                <form  class="delete-form" action="script/delete.php" method="POST">
                                  <input type="hidden" value="'.$image.'" name="file_name">
                                </form>
                                <button  class="delete-btn" ><i class="fa fa-trash" aria-hidden="true"></i></button>
                              </td>
                            </tr>

                          ';
                          
                      }
                     
                    }



                }

              ?>








              
            </tbody>
          </table>
          <!-- table end -->
        </div>
      </div>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    <script>
      $(document).ready(function(){


        $(".delete-btn").click(function(){
            let delete_ok = confirm("Are you sure?");

            if(delete_ok){
              let form = $(this).siblings('form').eq(0);
              form.submit();
            }
        })


      })
    </script>


   
  </body>
</html>