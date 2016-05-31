myapp.controller('myController',function($scope,$http){
    $scope.Name="";
    $scope.Email="";
    $scope.Mobile="";
    $scope.User=[];
    //$scope.Info=[];
    $scope.searchData   = '';
 // set the default search/filter term

    $scope.clear = function() {
        $scope.Name = "";
        $scope.Email = "";
        $scope.Mobile = "";
    };

    /*----------------------------------Save data to database code----------------------------------------*/
    //$scope.table_show=false;
    $scope.addUser=function(){
       // alert("ok");
        var testuser={name:$scope.Name,email:$scope.Email,mobile:$scope.Mobile};
        if( $scope.Name=="" || $scope.Email=="" || $scope.Mobile==""){

        }
        else{
            $scope.User.push(testuser);
            $scope.Name="";
            $scope.Email="";
            $scope.Mobile="";
           // $scope.table_show=true;

                // Posting data to php file
                $http({
                    method  : 'POST',
                    url     : 'save',
                    data    : $scope.User[0], //forms user object
                    headers : {'Content-Type': 'application/x-www-form-urlencoded'}
                })
                    .success(function(data) {
                        var dt=data;
                       // $scope.Info.push(testuser);
                    });
            };

    };



    //#region ANGULAR Bootstrap Pagination

    $scope.filteredTodos = []
        , $scope.currentPage = 1
        , $scope.numPerPage = 10
        , $scope.maxSize = 5;
    $scope.Length = 30;

    /*PAGINATION WATCH*/

    /*First Time Load*/
    $http({
        method: 'GET',
        url: 'angular/show/1',//this url 1 means page 1 and will fetch/get data for first time page load
    }).then(function successCallback(response) {
        $scope.Info=response.data.users;
        $scope.Length=response.data.users.length;
    }, function errorCallback(response) {
        // called asynchronously if an error occurs
        // or server returns response with an error status.
    });

    /*PAGINATION BAR GENERATION NUMBERING */

    setInterval(function(){
        $http({
        method: 'GET',
        url: 'totalItemsLength',
    }).then(function successCallback(response) {
        $scope.Length=parseInt(response.data.users);
        $scope.apply();
    }, function errorCallback(response) {

    }); }, 500);

    /*CURRENT WATCH FOR EACH PAGE CHANGE*/
    $scope.$watch('currentPage', function () {
        $http({
            method: 'GET',
            url: 'angular/show/'+$scope.currentPage,//this url will fetch/get data from show_angular method
        }).then(function successCallback(response) {
            $scope.Info=response.data.users;
        }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
        });
    });




    /*--------------------------------Edit and update data code-------------------------------------*/
    $scope.edituser=function($index,data){

        // Posting data to php file
        $http({
            method  : 'POST',
            url     : 'update',
            data    : data, //forms user object
            headers : {'Content-Type': 'application/x-www-form-urlencoded'}
        })
            .success(function(data) {

            });

    }

    /*--------------------------------Delete data code-------------------------------------*/

    //delete record
    $scope.confirmDelete = function(data,index) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $http({
                method: 'Get',
                url:'delete/' + data.id
            }).
                success(function(data) {
                   $scope.Info.splice(index,1);
                }).
                error(function(data) {
                    console.log(data);
                    alert('Unable to delete');
                });
        } else {
            return false;
        }
    }

        //==============Clock timer========================
    $scope.TimeCtrl = function($scope, $timeout) {
        $scope.clock = "loading clock..."; // initialise the time variable
        $scope.tickInterval = 1000 //ms

        var tick = function () {
            $scope.clock = Date.now() // get the current time
            $timeout(tick, $scope.tickInterval); // reset the timer
        }

        // Start the timer
        $timeout(tick, $scope.tickInterval);
    };


});

