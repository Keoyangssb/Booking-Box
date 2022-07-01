
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
   
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>

  </head>

  <body>

    <!-- Banner Ends Here -->
  <div class="container" id="div_Data" ng-app="myapp" ng-controller="controlaboutus" ng-init="selectdata()" ng-cloak>
    <div class="row justify-content-center">
      <h2 class="text-center" style="font-family: Phetsarath OT; margin-top: 40px;"><?php echo $lang['contactus'] ?></h2>
      &nbsp
      &nbsp
      <button type="button" class="btn btn-success" id="btnAddItem" data-toggle="modal" data-target="#edit_contactus" style="font-family: Phetsarath OT; height:35px; margin-top: 40px;"><?php echo $lang['edit'] ?></button>
    </div>
    <section class="contact-us">
      <div class="container">
        <div class="row">
        
          <div class="col-lg-12">
            <div class="down-contact">
              <div class="row">
                
                <div class="col-lg-12">
                  <div class="sidebar-item contact-information">
                    <div class="sidebar-heading">
                      <h2 style="font-family: Phetsarath OT;"><?php echo $lang['contactinformation'] ?></h2>
                    </div>
                    <div class="content">
                      <ul>
                        <li>
                          <h5 style="font-family: Phetsarath OT;"><?php echo $lang['phonenumber'] ?></h5>
                          <span style="color: black; font-size: large;">{{ndata.contel}}</span>
                        </li>
                        <li>
                          <h5 style="font-family: Phetsarath OT;"><?php echo $lang['email'] ?></h5>
                          <span style="color: black; font-size: large;">{{ndata.conemail}}</span>
                        </li>
                        <li>
                          <h5 style="font-family: Phetsarath OT;"><?php echo $lang['address'] ?></h5>
                          <span ng-show="ndata.langid == 1" style="font-family: Phetsarath OT; color: black; font-size: large;">{{ndata.conaddressla}}</span>
                          <span ng-show="ndata.langid == 2" style="font-family: Phetsarath OT; color: black; font-size: large;">{{ndata.conaddressen}}</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          
          
        </div>
      </div>

      <div class="modal fade" id="edit_contactus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" style="font-family: Phetsarath OT;"><?php echo $lang['editcontactus'] ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="contact-us">
                    <div class="contact-form">
                      <form action="#" id="contact">
                        <div class="row">
                            <div class="col-md-12">
                                <span style="font-family: Phetsarath OT;"><?php echo $lang['phonenumber'] ?></span>
                                <input type="text" class="form-control" id="txtcontel" ng-model="ndata.contel" style="font-family: Phetsarath OT;" required="Please enter hotel name">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <span style="font-family: Phetsarath OT;"><?php echo $lang['email'] ?></span>
                                <input type="text" class="form-control" id="txtconemail" ng-model="ndata.conemail" style="font-family: Phetsarath OT;" required="Please enter hotel name">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <span style="font-family: Phetsarath OT;"><?php echo $lang['addresslao'] ?></span>
                                <input type="text" class="form-control" id="txtconaddress" ng-model="ndata.conaddressla" style="font-family: Phetsarath OT;" required="Please enter hotel name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <span style="font-family: Phetsarath OT;"><?php echo $lang['addresseng'] ?></span>
                                <input type="text" class="form-control" id="txtconaddresseng" ng-model="ndata.conaddressen" style="font-family: Phetsarath OT;" required="Please enter hotel name">
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
    </section>
   </div>

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

  $scope.ndata = {
            "conid": "",
            "contel": "",
            "conemail": "",
            "conaddressla": "",
            "conaddressen": "",
            "langid": ""
      }

      $scope.selectdata = function(){  
        var sessionLangId = "<?php echo $_SESSION['langid']; ?>"; 
          $http({ method  : 'POST',
          url :'pages/getcontactus.php',
          data : {'myid': 0, 'langid': sessionLangId},
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
          }).success(function(data){
            $scope.getdata = data;  
            $scope.ndata.conid = data[0].conid;
            $scope.ndata.contel = data[0].contel;
            $scope.ndata.conemail = data[0].conemail;
            $scope.ndata.conaddressla = data[0].conaddressla;
            $scope.ndata.conaddressen = data[0].conaddressen;
            $scope.ndata.langid = sessionLangId;
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
                    if($scope.ndata.contel == '' || $scope.ndata.contel == undefined){
                      alert('Please enter Phone number.');
                      return;
                    }
                    if($scope.ndata.conemail == '' || $scope.ndata.conemail == undefined){
                      alert('Please enter Email.');
                      return;
                    }
                    if($scope.ndata.conaddressla == '' || $scope.ndata.conaddressla == undefined){
                      alert('Please enter Address in Lao.');
                      return;
                    }
                    if($scope.ndata.conaddressen == '' || $scope.ndata.conaddressen == undefined){
                      alert('Please enter Address in English.');
                      return;
                    }
                    else{
                      $scope.updatetData();
                    }
                  }
                }
            });
      });

      $scope.updatetData = function() {
        $http({ method  : 'POST',
          url :'pages/addcontactus.php',
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