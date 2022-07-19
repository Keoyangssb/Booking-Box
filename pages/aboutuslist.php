<?php
    include "switchlan.php";
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
<section class="about-us">
<div class="container" id="div_Data" ng-app="myapp" ng-controller="controlaboutus" ng-init="selectdata()" ng-cloak>
            <div class="row justify-content-center">
            <h2 class="text-center" style="font-family: Phetsarath OT; margin-top: -65px;"><?php echo $lang['aboutus'] ?></h2>
              &nbsp
              &nbsp
              <button type="button" class="btn btn-success" id="btnAddItem" data-toggle="modal" data-target="#modal_AddAboutus" style="font-family: Phetsarath OT; height:35px; margin-top: -65px;"><?php echo $lang['add'] ?></button>
           </div>


    <section class="blog-posts grid-system">
      <div class="container" ng-repeat="data in getdata">
        <div class="row">
          <div class="col-md-5">
            <div>
              <img src="images/aboutus/{{data.imagename}}" alt="" class="img-fluid wc-image">
            </div>

            <br>
          </div>

          <div class="col-md-7">
            <div class="sidebar-item recent-posts">
              <div class="sidebar-heading">
                

                  <h2 ng-click="ContentPage(data.itemid)" href="" ng-show="data.langid == 1" style="font-family: Phetsarath OT; text-align: left;">{{data.titlenamela}}</h2>
                  <h2 ng-click="ContentPage(data.itemid)" href="" ng-show="data.langid == 2" style="font-family: Phetsarath OT; text-align: left;">{{data.titlenameen}}</h2>

                </div>

                <div class="content">
                  <p ng-show="data.langid == 1" style="font-family: Phetsarath OT; text-align: left;">{{data.aboutdetailla}}
                  <br>
                  <a href="" data-toggle="modal" data-target="#edithotelmodal" Title="Update About Us..." style="font-family: Phetsarath OT;" ng-show="<?php echo $_SESSION['userid'] == 1 ? true : false ?>"><?php echo $lang['edit'] ?></a>
                  <a ng-show="<?php echo $_SESSION['userid'] == 1 ? true : false ?>">  |  </a>
                  <a href="" ng-click="DeleteHotel(data.itemid)" Title="Delete About Us..." style="font-family: Phetsarath OT;" ng-show="<?php echo $_SESSION['userid'] == 1 ? true : false ?>"><?php echo $lang['delete'] ?></a>
                </p>

                  <p ng-show="data.langid == 2" style="font-family: Phetsarath OT; text-align: left;">{{data.aboutdetailen}}
                  <br>
                  <a href="" data-toggle="modal" data-target="#edithotelmodal" Title="Update About Us..." style="font-family: Phetsarath OT;" ng-show="<?php echo $_SESSION['userid'] == 1 ? true : false ?>"><?php echo $lang['edit'] ?></a>
                  <a ng-show="<?php echo $_SESSION['userid'] == 1 ? true : false ?>">  |  </a>
                  <a href="" ng-click="DeleteHotel(data.itemid)" Title="Delete About Us..." style="font-family: Phetsarath OT;" ng-show="<?php echo $_SESSION['userid'] == 1 ? true : false ?>"><?php echo $lang['delete'] ?></a>

                </p>


                </div>

              </div>

              
            </div>
          </div>
        </div>
        
        <br>
                <br>


      </div>
    </section>


          <!-- <div class="row">
            <div class="col-lg-12"  ng-repeat="data in getdata">
              <p ng-show="data.langid == 1" style="font-family: Phetsarath OT; color: black; font-size: large;">{{data.aboutdetailla}}</p>
              <p ng-show="data.langid == 2" style="font-family: Phetsarath OT; color: black; font-size: large;">{{data.aboutdetailen}}</p>
            </div>
          </div> -->
    

          <div class="modal fade" id="modal_AddAboutus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="font-family: Phetsarath OT;"><?php echo $lang['addaboutus'] ?></h5>
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
                                      <span style="font-family: Phetsarath OT;"><?php echo $lang['titlenamelao'] ?></span>
                                          <input type="text" class="form-control" style="font-family: Phetsarath OT;" ng-model="ndata.titlenamela"> 
                                      </div>
                                      <div class="col-md-12">
                                      <span style="font-family: Phetsarath OT;"><?php echo $lang['titlenameeng'] ?></span>
                                          <input type="text" class="form-control" style="font-family: Phetsarath OT;" ng-model="ndata.titlenameen">
                                      </div>

                                      <div class="col-md-12">
                                      <span style="font-family: Phetsarath OT;"><?php echo $lang['detailslao'] ?></span>
                                          <textarea class="form-control" style="font-family: Phetsarath OT;" ng-model="ndata.aboutdetailla"></textarea> 
                                      </div>

                                      <div class="col-md-12">
                                      <span style="font-family: Phetsarath OT;"><?php echo $lang['detailseng'] ?></span>
                                          <textarea class="form-control" style="font-family: Phetsarath OT;" ng-model="ndata.aboutdetailen"></textarea> 
                                      </div>


                                      <div class="col-md-12"> 
                                          <div class="col-md-4">  
                                              <input type="file" file-input="files" accept="image/*" onchange="angular.element(this).scope().uploadFile(this)"/>  
                                          </div>
                                          <div>
                                            <!-- <img src="ndata.imagename" alt="" class="img-fluid wc-image"> -->
                                          </div>

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

  $scope.ndata = {
            "aboutid": "",
            "titlenamela": "",
            "titlenameen": "",
            "aboutdetailla": "",
            "aboutdetailen": "",
            "imagename": "",
            "langid": ""
      }

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
                  
                }
              }); 
           }
      }

 $scope.getdata = {
            "aboutid": "",
            "titlenamela": "",
            "titlenameen": "",
            "aboutdetailla": "",
            "aboutdetailen": "",
            "imagename": "",
            "langid": ""
      }


      $scope.selectdata = function(){  
        var sessionLangId = "<?php echo $_SESSION['langid']; ?>"; 
          $http({ method  : 'POST',
          url :'pages/getaboutus.php',
          data : {'myid': 0, 'langid': sessionLangId},
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
          }).success(function(data){
            $scope.getdata = data;  
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