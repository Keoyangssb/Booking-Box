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
              <button type="button" class="btn btn-success" id="btnAddItem" data-toggle="modal" data-target="#modal_EditAboutus" style="font-family: Phetsarath OT; height:35px; margin-top: -65px;"><?php echo $lang['edit'] ?></button>
           </div>

            <div class="row">           
              <div class="main-banner header-text" style="margin-top: -65px;">
                <div class="container-fluid">
                  <div class="owl-banner owl-carousel">
                  <div class="item">
                    <img src="images/{{getPic1}}" alt="">
                  </div>
                  <div class="item">
                    <img src="images/{{getPic2}}" alt="">
                  </div>
                  <div class="item">
                    <img src="images/{{getPic3}}" alt="">
                  </div>
                  <div class="item">
                    <img src="images/{{getPic4}}" alt="">
                  </div>
                  <div class="item">
                    <img src="images/{{getPic5}}" alt="">
                  </div>
                  <div class="item">
                    <img src="images/{{getPic6}}" alt="">
                  </div>
                </div>
                </div>
              </div>
            </div>

          <div class="row">
            <div class="col-lg-12"  ng-repeat="data in getdata">
              <p ng-show="data.langid == 1" style="font-family: Phetsarath OT; color: black; font-size: large;">{{data.aboutdetailla}}</p>
              <p ng-show="data.langid == 2" style="font-family: Phetsarath OT; color: black; font-size: large;">{{data.aboutdetailen}}</p>
            </div>
          </div>
    
          <div class="modal fade" id="modal_EditAboutus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                  
                                      <div class="col-md-12">
                                      <span style="font-family: Phetsarath OT;"><?php echo $lang['aboutuslao'] ?></span>
                                          <textarea class="form-control" style="font-family: Phetsarath OT;" ng-model="ndata.aboutdetailla"></textarea> 
                                      </div>

                                      <div class="col-md-12">
                                      <span style="font-family: Phetsarath OT;"><?php echo $lang['aboutuseng'] ?></span>
                                          <textarea class="form-control" style="font-family: Phetsarath OT;" ng-model="ndata.aboutdetailen"></textarea> 
                                      </div>

                                      <div class="col-md-4">  
                                        <input type="file" file-input="files" accept="image/*" onchange="angular.element(this).scope().uploadFile(this)"/>  
                                    </div>

                                    <table class="table table-bordered" ng-hide="ndata.images.length==0">
                                      <thead>
                                        <tr>
                                          <th style="width: 0%; font-family: Phetsarath OT;" ng-hide="true">hide</th>
                                 
                                          <th style="width: 10%; font-family: Phetsarath OT;"><?php echo $lang['image'] ?></th>
                                          <th style="width: 10%; font-family: Phetsarath OT;"><?php echo $lang['delete'] ?></th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr ng-repeat="image in ndata.images track by $index">
                                        <td ng-hide="true"> 
                                                              <a id="a_{{$index+1}}" class="btn-attachment" target="_blank">
                                                              </a>
                                          </td>
                                         
                                          <td ng-hide="image.imagename == ''"><img ng-src="/images/{{image.imagename}}" style="height: 100px; width: 100px;"></td>
                                          <td ng-hide="image.imagename == ''">
                                            <button type="button" class="trash_button" ng-click="DelImage($index)"
                                                                            style="cursor: pointer;">
                                                                            <i class="fa fa-trash"></i>
                                                                        </button>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>

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
                  $scope.ndata.images.push({
                    "imagename": nfilename,
                   });
                }
              }); 
           }
      }
 $scope.getdata = {
            "aboutid": "",
            "aboutdetail": "",
            "images": [{
                "imagename": ""
            }]
      }

  $scope.getdataimage = {
            "imagename": ""
  }

  $scope.getPic1 = "";
  $scope.getPic2 = "";
  $scope.getPic3 = "";
  $scope.getPic4 = "";
  $scope.getPic5 = "";
  $scope.getPic6 = "";

  $scope.ndata = {
            "aboutid": "",
            "aboutdetailla": "",
            "aboutdetailen": "",
            "images": [{
                "imagename": ""
            }]
      }

      $scope.selectdata = function(){  
        var sessionLangId = "<?php echo $_SESSION['langid']; ?>"; 
          $http({ method  : 'POST',
          url :'pages/getaboutus.php',
          data : {'myid': 0, 'langid': sessionLangId},
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
          }).success(function(data){
            $scope.getdata = data;  
            $scope.ndata.aboutid = data[0].aboutid;
            $scope.ndata.aboutdetailla = data[0].aboutdetailla;
            $scope.ndata.aboutdetailen = data[0].aboutdetailen;
            $scope.selectdataImage(1);
           });  
      }

      $scope.selectdataImage = function(id){
          $http({ method  : 'POST',
          url :'pages/getaboutusimage.php',
          data : {'myid': id},
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
          }).success(function(data){ 
            $scope.getdataimage = data;
            $scope.ndata.images = data;
            $scope.getPic1 = data[0].imagename;
            $scope.getPic2 = data[1].imagename;
            $scope.getPic3 = data[2].imagename;
            $scope.getPic4 = data[3].imagename;
            $scope.getPic5 = data[4].imagename;
            $scope.getPic6 = data[5].imagename;
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
                    if($scope.ndata.aboutdetailla == '' || $scope.ndata.aboutdetailla == undefined){
                      alert('Please enter about us in Lao.');
                      return;
                    }else{
                      $scope.updatetData();
                    }
                  }
                }
            });
      });

      $scope.DelImage = function(index){  
        if (confirm("Do you want to delete?") == true) {
		        $scope.ndata.images.splice(index, 1);
      	}
      }

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