<?php
    include "switchlan.php";
    if(!isset($_GET['id'])) {
      http_response_code(400); // bad request
      exit;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Additional CSS Files -->
<link rel="stylesheet" href="assets/css/fontawesome.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/owl.css">

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>

</head>

  <body>
    <section class="blog-posts grid-system" style="margin-top: 20px;">
      <div class="container" id="div_HotelDetail" ng-app="myapp" ng-controller="ctrlHotelDetail" ng-init="selectdata('<?php echo $_GET['id'] ?>')" ng-cloak>
        <div class="row" ng-repeat="data in getdata" id="getdataid">
          <div class="col-md-5" id="div_Data">
            <div class="sidebar-item recent-posts">
             
            <div class="sidebar-item recent-posts">
              <div class="sidebar-heading">
                <h2 style="font-family: Phetsarath OT;" ng-show="data.langid == 1">{{data.itemnamela}}</h2>
                <h2 style="font-family: Phetsarath OT;" ng-show="data.langid == 2">{{data.itemnameen}}</h2>
              </div>

              <div class="content">
                <p>
                  <span style="font-family: Phetsarath OT;"><?php echo $lang['address'] ?>:</span>
                  <br>
                  <strong style="font-family: Phetsarath OT;" ng-show="data.langid == 1">{{data.detailsla}}</strong>
                  <strong style="font-family: Phetsarath OT;" ng-show="data.langid == 2">{{data.detailsen}}</strong>
                </p>

                <p>
                  <span style="font-family: Phetsarath OT;"><?php echo $lang['tel'] ?>:</span>
                  <br>
                  <strong style="font-family: Phetsarath OT;">{{data.tel1}}</strong>

                </p>

             </div>
            </div>
            <br>
            <div class="main-button" id="pnlaction" ng-show="<?php echo $_SESSION['userid'] == 1 ? true : false ?>">
              <a id="btnEditItem" href="#" data-toggle="modal" data-target="#edithotelmodal" style="font-family: Phetsarath OT;"><?php echo $lang['edit'] ?></a>
              <br>
              <br>
              <a id="btnDeleteItem" href="#" style="font-family: Phetsarath OT;" ng-click="DeleteHotel('<?php echo $_GET['id'] ?>')"><?php echo $lang['delete'] ?></a>
            </div>
            <br>
          </div>
        </div>

        <div class="modal fade" id="edithotelmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" style="font-family: Phetsarath OT;"><?php echo $lang['editcustomerservice'] ?></h5>
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
                                <span style="font-family: Phetsarath OT;"><?php echo $lang['namelao'] ?></span>
                                <input type="text" class="form-control" id="txthotelname" ng-model="ndata.itemnamela" style="font-family: Phetsarath OT;" required="Please enter hotel name La">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <span style="font-family: Phetsarath OT;"><?php echo $lang['nameeng'] ?></span>
                                <input type="text" class="form-control" id="txthotelnameeng" ng-model="ndata.itemnameen" style="font-family: Phetsarath OT;" required="Please enter hotel name Englist">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <span style="font-family: Phetsarath OT;"><?php echo $lang['addresslao'] ?></span>
                                <input type="text" class="form-control" id="txtDetail" ng-model="ndata.detailsla" style="font-family: Phetsarath OT;" required="please enter address Lao">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <span style="font-family: Phetsarath OT;"><?php echo $lang['addresseng'] ?></span>
                                <input type="text" class="form-control" id="txtDetaileng" ng-model="ndata.detailsen" style="font-family: Phetsarath OT;" required="please enter address English">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <span style="font-family: Phetsarath OT;"><?php echo $lang['tel'] ?></span>
                                <input type="text" class="form-control" id="txttel" ng-model="ndata.tel1" style="font-family: Phetsarath OT;" required="please enter address English">
                            </div>
                        </div>
                      
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-success" data-toggle="modal" id="btnSaveEditData" ng-click="updateData()" style="font-family: Phetsarath OT;"><?php echo $lang['save'] ?></button>
                                <button type="button" class="btn btn-success" data-toggle="modal" id="btnclose" data-dismiss="modal" style="font-family: Phetsarath OT;"><?php echo $lang['close'] ?></button>
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
    <!-- Modal -->

  <script>  
   
  var app = angular.module("myapp", []);  
  app.directive("fileInput", function($parse){  
        return{  
            link: function($scope, element, attrs){  
                  element.on("change", function(event){  
                      var files = event.target.files;  
                      //console.log(files[0].name);  
                      $parse(attrs.fileInput).assign($scope, element[0].files);  
                      $scope.$apply();  
                  });  
            }  
        }  
  }); 

  app.controller("ctrlHotelDetail", function($scope, $http){
    $scope.getdata = {
          "itemid": "",
          "itemnamela": "",
          "itemnameen": "",
          "detailsla": "",
          "detailsen": "",
          "tel1": "",
      }
    $scope.getdataimage = {
            "imagename": ""
    }   

    $scope.ndata = {
          "itemid": "",
          "itemnamela": "",
          "itemnameen": "",
          "detailsla": "",
          "detailsen": "",
          "tel1": "",
          "action": "edit",
      }

      $scope.nid = {
            "id": 0,
      }

      $scope.uploadFile = function(element){
            $scope.files = element.files;
            var form_data = new FormData();
            $scope.myFile = $scope.files[0];
            if($scope.myFile != 'undefined'){
                var file = $scope.myFile; 
                form_data.append('file', file);
                $http.post('pages/uploadhotel.php', form_data,  
                {  
                      transformRequest: angular.identity,  
                      headers: {'Content-Type': undefined,'Process-Data': false}  
                }).success(function(response){  
                  if(response != ""){
                    var nfilename = response.replace(/"([^"]+(?="))"/g, '$1');
                      $scope.ndata.images.push({
                                  "imagename": nfilename,
                              });
                  }
                }); 
            }
        }

        $scope.selectdata = function(id){
          var sessionLangId = "<?php echo $_SESSION['langid']; ?>"; 
          $http({ method  : 'POST',
          url :'pages/getcustomerservicelist.php',
          data : {'myid': id, 'langid': sessionLangId},
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
          }).success(function(data){ 
            $scope.getdata = data;
            $scope.ndata.itemid = data[0].itemid;
            $scope.ndata.itemnamela = data[0].itemnamela;
            $scope.ndata.itemnameen = data[0].itemnameen;
            $scope.ndata.detailsla = data[0].detailsla;
            $scope.ndata.detailsen = data[0].detailsen;
            $scope.ndata.tel1 = data[0].tel1;
            $scope.ndata.action = "edit";
          });  
        }

        $scope.selectdataImage = function(id){
          $http({ method  : 'POST',
          url :'pages/gethotelimage.php',
          data : {'myid': id},
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
          }).success(function(data){ 
            $scope.getdataimage = data;
            $scope.ndata.images = data;
          });  
        }

        $scope.updateData = function() {
          if($scope.ndata != null){
            if($scope.ndata.itemnamela == '' || $scope.ndata.itemnamela == undefined){
              alert('Please enter name in Lao.');
              return;
            }
            if($scope.ndata.itemnameen == '' || $scope.ndata.itemnameen == undefined){
              alert('Please enter name in English.');
              return;
            }
            if($scope.ndata.detailsla == '' || $scope.ndata.detailsla == 'undefined'){
               alert('Please enter address in Lao.');
               return;
            }  
            if($scope.ndata.detailsen == '' || $scope.ndata.detailsen == 'undefined'){
              alert('Please enter address in English.');
              return;
            } 
            if($scope.ndata.tel1 == '' || $scope.ndata.tel1 == 'undefined'){
              alert('Please enter tel.');
              return;
            }
          }else{
            alert('Please enter data.');
            return;  
          }

          $scope.ndata.action = "edit";

          if (confirm("Do you want to update?") == false) {
            return;                    
          }

          $http({ method  : 'POST',
          url :'pages/updatecustomerservice.php',
          data : $scope.ndata,
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
          }) .success(function(data) {
              alert(data);  
              window.location.reload();
          });
        } 

        $scope.DeleteHotel = function(id){
          if (confirm("Do you want to delete data?.") == false) {
            return;                    
          }
          $http({ method  : 'POST',
          url :'pages/deletecustomerservice.php',
          data : {'myid': id},
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
          }).success(function(data){ 
            alert(data);
            window.location.href = './customerserviceview.php';
          });  
        }


  });  
  </script> 
  </body>
  </html>