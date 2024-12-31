<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
         .error  { color: red }
      </style>

    
    <title>my website</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="home.html">Find your way</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

              <li class="nav-item">
                <a class="nav-link text-primary" href="office.php">Office</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-primary" href="contact.html">Contact</a>
              </li>
             
            </ul>
          </div>
        </div>
      </nav>
      <style>
        body {
            color: #404E67;
            background: #F5F7FA;
            font-family: 'Open Sans', sans-serif;
        }
        .table-wrapper {
            width: 700px;
            margin: 30px auto;
            background: #fff;
            padding: 20px;	
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
        }
        .table-title h2 {
            margin: 6px 0 0;
            font-size: 22px;
        }
        .table-title .add-new {
            float: right;
            height: 30px;
            font-weight: bold;
            font-size: 12px;
            text-shadow: none;
            min-width: 100px;
            border-radius: 50px;
            line-height: 13px;
        }
        .table-title .add-new i {
            margin-right: 4px;
        }
        table.table {
            table-layout: fixed;
        }
        table.table tr th, table.table tr td {
            border-color: #e9e9e9;
        }
        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }
        table.table th:last-child {
            width: 100px;
        }
        table.table td a {
            cursor: pointer;
            display: inline-block;
            margin: 0 5px;
            min-width: 24px;
        }    
        table.table td a.add {
            color: #27C46B;
        }
        table.table td a.edit {
            color: #FFC107;
        }
        table.table td a.delete {
            color: #E34724;
        }
        table.table td i {
            font-size: 19px;
        }
        table.table td a.add i {
            font-size: 24px;
            margin-right: -1px;
            position: relative;
            top: 3px;
        }    
        table.table .form-control {
            height: 32px;
            line-height: 32px;
            box-shadow: none;
            border-radius: 2px;
        }
        table.table .form-control.error {
            border-color: #f50000;
        }
        table.table td .add {
            display: none;
        }
    </style>
    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        var actions = $("table td:last-child").html();
        // Append table with add row form on add new button click
        $(".add-new").click(function(){
            $(this).attr("disabled", "disabled");
            var index = $("table tbody tr:last-child").index();
            var row = '<tr>' +
                '<td><input type="text" class="form-control" name="name" id="name"></td>' +
                '<td><input type="text" class="form-control" name="department" id="department"></td>' +
                '<td>' + actions + '</td>' +
            '</tr>';
            $("table").append(row);		
            $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
            $('[data-toggle="tooltip"]').tooltip();
        });
        // Add row on add button click
        $(document).on("click", ".add", function(){
            var empty = false;
            var input = $(this).parents("tr").find('input[type="text"]');
            input.each(function(){
                if(!$(this).val()){
                    $(this).addClass("error");
                    empty = true;
                } else{
                    $(this).removeClass("error");
                }
            });
            $(this).parents("tr").find(".error").first().focus();
            if(!empty){
                input.each(function(){
                    $(this).parent("td").html($(this).val());
                });			
                $(this).parents("tr").find(".add, .edit").toggle();
                $(".add-new").removeAttr("disabled");
            }		
        });
        // Edit row on edit button click
        $(document).on("click", ".edit", function(){		
            $(this).parents("tr").find("td:not(:last-child)").each(function(){
                $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
            });		
            $(this).parents("tr").find(".add, .edit").toggle();
            $(".add-new").attr("disabled", "disabled");
        });
        // Delete row on delete button click
        $(document).on("click", ".delete", function(){
            $(this).parents("tr").remove();
            $(".add-new").removeAttr("disabled");
        });
    });
    </script>
    </head>
    <body>

      <!-- add-->

        <div class="container">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2>Employee <b>Details</b></h2></div>




                    </div>
                </div>

 <?php

         $name = isset($_POST[ "name" ]) ? $_POST[ "name" ] : "";
         $location = isset($_POST[ "location" ]) ? $_POST[ "location" ] : "";

         $iserror = false;
         $formerrors = 
            array( "nameerror" => false, "locationerror" => false);

         $inputlist = array( "name" => "Name", "location" => "Office Number" );
/*Add*/
         if ( isset( $_POST["submit"] ) )
         {
            if ( $name == "" )                   
            {
               $formerrors[ "nameerror" ] = true;
               $iserror = true;                   
            } 

               if ( !preg_match( "/[0-9][A-Z]-[0-9]{3}/", 
               $location ) ) 
            {
               $formerrors[ "locationerror" ] = true;
               $iserror = true;
            }     

            
            if ( !$iserror )  
            {
               $database = mysqli_connect( "localhost", "root", "" );


                   $query = "INSERT INTO names " .
                   "( name, location) " .
                   "VALUES ( '$name', '$location')";
     
               if ( !$database )
                  die( "<p>Could not connect to database</p>" );

               if ( !mysqli_select_db(  $database, "CCISMapDB" ) )
                  die( "<p>Could not open CCISMapDB database</p>" );
             
               if ( !( $result = mysqli_query( $database, $query ) ) ) 
               {
                  print( "<p>Could not execute query!</p>" );
                  die( mysqli_error() );
               } // end if

               mysqli_close( $database );

               print( "<p>$name has been added successfully.</p><br>
                  <p>The following information has been saved in our database:</p>
                  <p>Name: $name </p>
                  <p>Office: $location</p>
                  <br><br>
                  <form method = 'post' action = 'office.php' >
                   <p>Click on the button below to view our database.</p>
                  <p> <button class='site-btn'>Here</button></p></form> ");
                  die();
            } 
         }  

/*Delete*/
         else{  if ( isset( $_POST["submit2"] ) ){
            if ( $name == "" )                   
            {
               $formerrors[ "nameerror" ] = true;
               $iserror = true;                   
            } 

            if ( !preg_match( "/[0-9][A-Z]-[0-9]{3}/", 
               $location ) ) 
            {
               $formerrors[ "locationerror" ] = true;
               $iserror = true;
            }        

            
            if ( !$iserror )  
            {
               $database = mysqli_connect( "localhost", "root", "" );


                   $query = "DELETE FROM `names` WHERE name = '$name' AND location = '$location' ";
     
               if ( !$database )
                  die( "<p>Could not connect to database</p>" );

               if ( !mysqli_select_db(  $database, "CCISMapDB" ) )
                  die( "<p>Could not open CCISMapDB database</p>" );
             
               if ( !( $result = mysqli_query( $database, $query ) ) ) 
               {
                  print( "<p>Could not execute query!</p>" );
                  die( mysqli_error() );
               } // end if

               mysqli_close( $database );

               print( "<p>$name has been deleted successfully.</p><br>
                  
                  <form method = 'post' action = 'office.php' >
                   <p>Click on the button below to view our database.</p>
                  <p> <button class='site-btn'>Here</button></p></form> ");
                  die();
            } 
         }
     }

         if ( $iserror )                                              
         {                                                            
            print( "<p class = 'error'>Fields with * need to be filled 
               in properly.</p>" );
         } // end if

   ?>      
      
      <form method = "post" action = "#" class="contact__form">
<?php
        foreach ( $inputlist as $inputname => $inputalt )
         {
            print( "<div><label>$inputalt:</label><input type = 'text'
               name = '$inputname' value = '" . $$inputname . "'>" );
            
            if ( $formerrors[ ( $inputname )."error" ] == true ) 
               print( "<span class = 'error' color: red >*</span>" );        
            
            print( "</div>" );
         } 

         if ( $formerrors[ "locationerror" ] ) 
            print( "<p class = 'error'>Must be in the form 
               1A-111" );

               print( "
               
               <p> <button class='site-btn'name = 'submit'>Add</button>
              
             <button class='site-btn'name = 'submit2'>Delete</button></p>
               </form> 
               
               <br><br>" );
     
    ?>
                 


            </div>
        </div>     
    </body>
    </html>