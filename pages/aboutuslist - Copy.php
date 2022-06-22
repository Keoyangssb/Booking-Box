<?php
    include "switchlan.php";
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>

  </head>

  <body> 
<section class="about-us">
<div class="container" id="div_Data" ng-app="myapp" ng-controller="controlaboutus" ng-init="selectdata()" ng-cloak>
            <div class="row justify-content-center">
            <h2 class="text-center" style="font-family: Phetsarath OT; margin-top: -65px;"><?php echo $lang['aboutus'] ?></h2>
              &nbsp
              &nbsp
              <button type="button" class="btn btn-success" id="btnAddItem" data-toggle="modal" data-target="#edit_aboutus" style="font-family: Phetsarath OT; height:35px; margin-top: -65px;"><?php echo $lang['edit'] ?></button>
           </div>

    <div class="row">

    <img src="images/{{ndata.Others}}" alt="">
      <div class="col-lg-12"  ng-repeat="data in getdata">
        <p style="font-family: Phetsarath OT;">{{data.aboutdetail}}</p>
      </div>
    </div>
    
    <div class="row">
      <div class="col-lg-12">
        <ul class="social-icons">
         
        </ul>
      </div>
    </div>
    
    <div class="modal fade" id="edit_aboutus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" style="font-family: Phetsarath OT;"><?php echo $lang['editaboutus'] ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="contact-us">
                    <div class="contact-form">
                      <form action="#" id="contact">
                        <div class="row">

                        <div class="col-md-4">  
                              <input type="file" file-input="files" accept="image/*" onchange="angular.element(this).scope().uploadFile(this)"/>  
                          </div>

                            <div class="col-md-12">
                                <textarea class="form-control" style="font-family: Phetsarath OT;" ng-model="ndata.aboutdetail"></textarea> 
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                            <button type="button" class="btn btn-success" data-toggle="modal" id="btnSaveData" data-validate="div_Data" style="font-family: Phetsarath OT;"><?php echo $lang['save'] ?></button>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-dismiss="modal" style="font-family: Phetsarath OT;"><?php echo $lang['close'] ?></button>
                            </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>

  </div>
</section>

<script>  
 var app = angular.module("myapp", []);  
 app.directive("fileInput", function($parse){  
      return{  
           link: function($scope, element, attrs){  
                element.on("change", function(event){  
                     var files = event.target.files;  
                     $parse(attrs.fileInput).assign($scope, element[0].files);  
                     $scope.$apply();  
                });  
           }  
      }  
 }); 

 app.controller("controlaboutus", function($scope, $http){

  $scope.uploadFile = function(element){
           $scope.files = element.files;
           var form_data = new FormData();
           $scope.myFile = $scope.files[0];
           if($scope.myFile != 'undefined'){
              var file = $scope.myFile; 
              form_data.append('file', file);
              $http.post('pages/uploadaboutus.php', form_data,  
              {  
                    transformRequest: angular.identity,  
                    headers: {'Content-Type': undefined,'Process-Data': false}  
              }).success(function(response){  
                if(response != ""){
                  var nfilename = response.replace(/"([^"]+(?="))"/g, '$1');
                  $scope.ndata.Others = nfilename;
                }
              }); 
           }
      }

  $scope.ndata = {
            "aboutid": "",
            "aboutdetail": "",
            "Others": ""
      }

      $scope.selectdata = function(){  
          $http({ method  : 'POST',
          url :'http://polysolutions.la/pages/getaboutus.php',
          data : {'myid': 0},
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
          }).success(function(data){
            $scope.getdata = data;  
            $scope.ndata.aboutid = data[0].aboutid;
            $scope.ndata.aboutdetail = data[0].aboutdetail;
            $scope.ndata.Others = data[0].Others;
           });  
      }

      $(document).ready(function () { 

        var sessionUserId = "<?php echo $_SESSION['userid']; ?>";
                if(sessionUserId == 1){
                  $("#btnAddItem").show();
                }else{
                  $("#btnAddItem").hide();
                }

        $("[data-validate]").click(function (event) {
                if ($(this).attr('id') == 'btnSaveData') {
                  if (confirm("Do you want to update?") == false) {
                    return;                    
                  }

                  if($scope.ndata != null){
                    if($scope.ndata.aboutdetail == '' || $scope.ndata.aboutdetail == undefined){
                      alert('Please enter about detail.');
                      return;
                    }else{
                      $scope.updatetData();
                    }
                  }
                }
            });
      });

      $scope.updatetData = function() {
        $http({ method  : 'POST',
          url :'pages/addaboutus.php',
          data : $scope.ndata,
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
          }) .success(function(data) {
              alert(data);  
              window.location.reload();
          });
      } 
 });  
 </script> 

</body>
</html>