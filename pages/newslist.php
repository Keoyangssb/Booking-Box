<?php
    include "switchlan.php";
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap core CSS -->

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>
    <!-- Banner Ends Here -->

    <section class="blog-posts grid-system" style="margin-top: 20px;">
      <div class="container" id="div_Data" ng-app="myapp" ng-controller="hotellist" ng-init="selectdata()" ng-cloak>
        <div class="all-blog-posts">
          <div class="container">
            <div class="row justify-content-center">
              <h2 class="text-center" style="font-family: Phetsarath OT;"><?php echo $lang['news'] ?></h2>
              &nbsp
              &nbsp
              <button type="button" class="btn btn-success" id="btnAddItem" data-toggle="modal" data-target="#addedithotel" style="font-family: Phetsarath OT;"><?php echo $lang['add'] ?></button>
           </div>
          </div>
          <br>

        </div>


    <div class="team-members">
      <div class="container" ng-repeat="data in getdata">
        <div class="row">
          <div class="col-md-12">
            <h5 ng-show="data.langid == 1" style="font-family: Phetsarath OT;">{{data.itemnamela}}</h5>
            <h5 ng-show="data.langid == 2" style="font-family: Phetsarath OT;">{{data.itemnameen}}</h5>

            <p ng-show="data.langid == 1" style="font-family: Phetsarath OT;">{{data.detailsla}}
            <br>
            <a href="" ng-click="ContentPage(data.itemid)" Title="Continue to read more...">Read more...</a>
            <br>
            </p>

            <p ng-show="data.langid == 2" style="font-family: Phetsarath OT;">{{data.detailsen}}
            <br>
            <a href="" ng-click="ContentPage(data.itemid)" Title="Continue to read more...">Read more...</a>
            <br>
            </p>
            <br>
          </div>
        </div>
        </div>
        </div>


        <div class="modal fade" id="addedithotel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" style="font-family: Phetsarath OT;"><?php echo $lang['addnews'] ?></h5>
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
                                <input type="text" class="form-control" id="txthotelname" ng-model="ndata.itemnamela" style="font-family: Phetsarath OT;" required="Please enter hotel name La">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <span style="font-family: Phetsarath OT;"><?php echo $lang['titlenameeng'] ?></span>
                                <input type="text" class="form-control" id="txthotelnameeng" ng-model="ndata.itemnameen" style="font-family: Phetsarath OT;" required="Please enter hotel name Englist">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <span style="font-family: Phetsarath OT;"><?php echo $lang['detailslao'] ?></span>
                                <textarea class="form-control" id="txtDetail" ng-model="ndata.detailsla" style="font-family: Phetsarath OT;" required="please enter address Lao"></textarea> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <span style="font-family: Phetsarath OT;"><?php echo $lang['detailseng'] ?></span>
                                <textarea class="form-control" id="txtDetaileng" ng-model="ndata.detailsen" style="font-family: Phetsarath OT;" required="please enter address English"></textarea> 
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


        <div class="modal fade" id="editnewsmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" style="font-family: Phetsarath OT;"><?php echo $lang['editnews'] ?></h5>
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
                                <input type="text" class="form-control" id="txthotelname" ng-model="ndata.itemnamela" style="font-family: Phetsarath OT;" required="Please enter hotel name La">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <span style="font-family: Phetsarath OT;"><?php echo $lang['titlenameeng'] ?></span>
                                <input type="text" class="form-control" id="txthotelnameeng" ng-model="ndata.itemnameen" style="font-family: Phetsarath OT;" required="Please enter hotel name Englist">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <span style="font-family: Phetsarath OT;"><?php echo $lang['detailslao'] ?></span>
                                <textarea class="form-control" id="txtDetail" ng-model="ndata.detailsla" style="font-family: Phetsarath OT;" required="please enter address Lao"></textarea> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <span style="font-family: Phetsarath OT;"><?php echo $lang['detailseng'] ?></span>
                                <textarea class="form-control" id="txtDetaileng" ng-model="ndata.detailsen" style="font-family: Phetsarath OT;" required="please enter address English"></textarea> 
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
                     //console.log(files[0].name);  
                     $parse(attrs.fileInput).assign($scope, element[0].files);  
                     $scope.$apply();  
                });  
           }  
      }  
 }); 

 app.controller("hotellist", function($scope, $http){
  $scope.ndata = {
          "itemid ": "",
          "itemnamela": "",
          "itemnameen": "",
          "detailsla": "",
          "detailsen": "",
          "img": ""
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
      
      $scope.select = function(){  
           $http.get("pages/select.php")  
           .success(function(data){  
                $scope.images = data;  
           });  
      }  

      $scope.selectdata = function(){ 
        var sessionLangId = "<?php echo $_SESSION['langid']; ?>"; 
          $http({ method  : 'POST',
          url :'pages/getnewslist.php',
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
                  if($scope.ndata != null){
                    if($scope.ndata.itemnamela == '' || $scope.ndata.itemnamela == 'undefined'){
                      alert('Please enter Title Name Lao.');
                      return;
                    }
                    if($scope.ndata.itemnameen == '' || $scope.ndata.itemnameen == 'undefined'){
                      alert('Please enter Title name in English.');
                      return;
                    }
                    if($scope.ndata.detailsla == '' || $scope.ndata.detailsla == 'undefined'){
                      alert('Please enter detais in Lao.');
                      return;
                    }  
                    if($scope.ndata.detailsen == '' || $scope.ndata.detailsen == 'undefined'){
                      alert('Please enter detais in English.');
                      return;
                    }    
                    
                    //save data
                    if (confirm("Do you want to save?") == false) {
                      return;                    
                    }
                    $scope.insertData();
                  }else{
                    alert('Please enter data.')
                  }
                }
            });
      });

      $scope.insertData = function() {
        $http({ method  : 'POST',
        url :'pages/addnews.php',
        data : $scope.ndata,
        headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
        }) .success(function(data) {  
            $scope.ndata = {
              "itemid ": "",
              "itemnamela": "",
              "itemnameen": "",
              "detailsla": "",
              "detailsen": "",
              "img": ""
            }
            $scope.selectdata();
        });
      } 

      $scope.DelImage = function(index){  
        if (confirm("Do you want to delete?") == true) {
		        $scope.ndata.images.splice(index, 1);
      	}
      }

      $scope.ContentPage = function(itemid){  
        location.href = "newsdetailview.php?id=" + itemid;
      }

 });  
 </script> 

  </body>
</html>

