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
          <div class="col-md-7">
            <div>
              <img src="images/guesthouse/{{data.img}}" alt="" class="img-fluid wc-image">
            </div>
            <br>
            <div class="row">
              <div class="col-sm-4 col-6" ng-repeat="dataimg in getdataimage">
                <div>
                  <img src="images/guesthouse/{{dataimg.imagename}}" alt="" class="img-fluid">
                </div>
                <br>
              </div>
            </div>
            <br>
          </div>

          <div class="col-md-5">
            <div class="sidebar-item recent-posts">
             
            <div class="sidebar-item recent-posts">
              <div class="sidebar-heading">
                <h2 style="font-family: Phetsarath OT;" ng-show="data.langid == 1">{{data.itemnamela}}</h2>
                <h2 style="font-family: Phetsarath OT;" ng-show="data.langid == 2">{{data.itemnameen}}</h2>
              </div>

              <div class="content">
                <p>
                  <span style="font-family: Phetsarath OT;"><?php echo $lang['details'] ?></span>

                  <br>

                  <strong style="font-family: Phetsarath OT;" ng-show="data.langid == 1">{{data.detailsla}}</strong>
                  <strong style="font-family: Phetsarath OT;" ng-show="data.langid == 2">{{data.detailsen}}</strong>

                  <div>
                  <br>
                <span style="font-family: Phetsarath OT;"><?php echo $lang['scanqrcode'] ?></span>
                <br>
                  <img src="images/qrcode/qrcode.png" alt="" class="img-fluid">
                </div>
                </p>
             </div>
            </div>
            <br>
            <div class="main-button" ng-show="<?php echo $_SESSION['userid'] == 1 ? true : false ?>">
              <a href="#" data-toggle="modal" data-target="#edithotelmodal" style="font-family: Phetsarath OT;"><?php echo $lang['edit'] ?></a>
              <br>
              <br>
              <a href="#" style="font-family: Phetsarath OT;" ng-click="DeleteHotel('<?php echo $_GET['id'] ?>')"><?php echo $lang['delete'] ?></a>
            </div>
            <br>
          </div>
        </div>

        <div class="modal fade" id="edithotelmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" style="font-family: Phetsarath OT;"><?php echo $lang['editguesthouse'] ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="contact-us">
                    <div class="contact-form">
                      <form action="#" id="contact">
                        <div class="col-md-12" id="contact">
                          <div class="row">
                              <div class="col-md-12">
                                  <span style="font-family: Phetsarath OT;"><?php echo $lang['guesthousenamelao'] ?></span>
                                  <input type="text" class="form-control" id="txthotelname" ng-model="ndata.itemnamela" style="font-family: Phetsarath OT;" required="Please enter guest house name">
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12">
                                  <span style="font-family: Phetsarath OT;"><?php echo $lang['guesthousenameeng'] ?></span>
                                  <input type="text" class="form-control" id="txthotelnameeng" ng-model="ndata.itemnameen" style="font-family: Phetsarath OT;" required="Please enter guest house name">
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-md-12">
                                  <span style="font-family: Phetsarath OT;"><?php echo $lang['detailslao'] ?></span>
                                  <input type="text" class="form-control" id="txtaddress" ng-model="ndata.detailsla" style="font-family: Phetsarath OT;" required="please enter address">
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12">
                                  <span style="font-family: Phetsarath OT;"><?php echo $lang['detailseng'] ?></span>
                                  <input type="text" class="form-control" id="txtaddresseng" ng-model="ndata.detailsen" style="font-family: Phetsarath OT;" required="please enter address">
                              </div>
                          </div>
                        </div>
                        <div class="col-md-12"> 
                          <div class="col-md-4">  
                              <input type="file" file-input="files" accept="image/*" onchange="angular.element(this).scope().uploadFile(this)"/>  
                          </div>

                          <span style="font-family: Phetsarath OT;"><?php echo $lang['imagesize'] ?></span>

                          <table class="table table-bordered" ng-hide="ndata.images.length==0">
                            <thead>
                              <tr>
                                <th style="width: 0%; font-family: Phetsarath OT;" ng-hide="true">hide</th>
                                <th style="width: 80%; font-family: Phetsarath OT;"><?php echo $lang['iamgename'] ?></th>
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
                                <td ng-hide="image.imagename == ''">{{image.imagename}}</td>
                                <td ng-hide="image.imagename == ''"><img ng-src="images/guesthouse/{{image.imagename}}" style="height: 100px; width: 100px;"></td>
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
  </body>
</html>


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
          "img": ""
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
          "img": "",
          "images": [{
               "imagename": ""
          }]
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
              $http.post('pages/uploadguesthouse.php', form_data,  
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
        url :'pages/getguesthouselist.php',
        data : {'myid': id, 'langid': sessionLangId},
        headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
        }).success(function(data){ 
          $scope.getdata = data;
          $scope.ndata.itemid = data[0].itemid;
          $scope.ndata.itemnamela = data[0].itemnamela;
          $scope.ndata.itemnameen = data[0].itemnameen;
          $scope.ndata.detailsla = data[0].detailsla;
          $scope.ndata.detailsen = data[0].detailsen;
          $scope.selectdataImage(id);
        });  
      }

      $scope.selectdataImage = function(id){
        $http({ method  : 'POST',
        url :'pages/getguesthouseimage.php',
        data : {'myid': id},
        headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
        }).success(function(data){ 
          $scope.getdataimage = data;
          $scope.ndata.images = data;
        });  
      }

      $scope.updateData = function() {
        if (confirm("Do you want to update?") == false) {
          return;                    
        }
        if($scope.ndata != null){
          if($scope.ndata.itemnamela == '' || $scope.ndata.itemnamela == undefined){
            alert('Please enter guest house name in Lao.');
            return;
          }
          if($scope.ndata.itemnameen == '' || $scope.ndata.itemnameen == undefined){
            alert('Please enter guest house name in English.');
            return;
          }
          if($scope.ndata.detailsla == '' || $scope.ndata.detailsla == undefined){
            alert('Please enter details in Lao.');
            return;
          }
          if($scope.ndata.detailsen == '' || $scope.ndata.detailsen == undefined){
            alert('Please enter details in English.');
            return;
          }
          if($scope.ndata.images.length == 0 || $scope.ndata.images.length == 1){
             alert('Please select image.');
             return;  
          }
          
        }else{
          alert('Please enter data.');
          return;  
        }

        $http({ method  : 'POST',
        url :'pages/updateguesthouse.php',
        data : $scope.ndata,
        headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
        }) .success(function(data) {
            alert(data);  
            //$scope.selectdata($scope.ndata.itemid);
            window.location.reload();
        });
      } 

      $scope.DelImage = function(index){  
        if (confirm("Do you want to delete?") == true) {
		        $scope.ndata.images.splice(index, 1);
      	}
      }

      $scope.DeleteHotel = function(id){
        if (confirm("Do you want to delete data?.") == false) {
          return;                    
        }
        $http({ method  : 'POST',
        url :'pages/deleteguesthouse.php',
        data : {'myid': id},
        headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
        }).success(function(data){ 
          alert(data);
          window.location.href = './guesthouseview.php';
        });  
      }


 });  
 </script> 