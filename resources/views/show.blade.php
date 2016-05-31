<!DOCTYPE html>
<html lang="en">
<head>
    <title>Angular VS Laravel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Bootstrap Material Design -->
    <link href="css/bootstrap-material-design.css" rel="stylesheet">
    <link href="css/bootstrap-material-design.min.css" rel="stylesheet">
    <link href="css/ripples.min.css" rel="stylesheet">



    <!-- Material Design fonts -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.12/angular.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-animate.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.14.3.js"></script>

    <!--AngularJS-->
    <script src="app/app.js"></script>
    {{-- <script src="lib/dirPagination.js"></script>--}}
    <script src="app/Controller/testcontroller.js"></script>
    {{--In one page we can write script like this--}}
    {{--<script type="text/javascript">
    var myapp = angular.module('testapp',[]);
    myapp.controller('myController',function($scope){
        $scope.Test="";
    });
</script>--}}
</head>
<body ng-app = "testapp">
<nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Laravel Angular</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{asset('/')}}">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container" ng-controller ="myController">
    <div class="panel panel-default" style="margin-top: 55px">
        <div class="panel-body">
            <h2 class="text-center"></h2>
            <form method="get" action="http://www.google.com/search" style="margin-left: 761px">
                <input type="text" name="q" size="31" maxlength="255" value="" placeholder=" Search Google"/>
                <input type="submit" value="Google Search" />
            </form>
            <i class="material-icons" style="color: purple">face</i>

            <div ng-controller='TimeCtrl' style="text-align: center;background:#bce8f1">
                <p>@{{ clock | date:'medium'}}</p>
            </div>

            <h6>Name:<p ng-bind="Name" class="text-primary"></p></h6>
            <h6>Email:<p ng-bind="Email" class="text-primary"></p></h6>
            <h6>Mobile No:<p ng-bind="Mobile" class="text-primary"></p></h6>

            <form class="form-inline" role="form" name="myForm">
                <div class="form-group">
                    <label class="sr-only" for="name">Name:</label>
                    <Input type="name" class="form-control" ng-model="Name"  placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="email" >Email:</label>
                    <input type="email"  name="myEmail" class="form-control" ng-model="Email"  placeholder="Enter Email">
                    <span ng-show="myForm.myEmail.$error.email">Not a valid e-mail address</span>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="pwd">Mobile No:</label>
                    <input type="mobile" class="form-control" ng-model="Mobile" placeholder="Enter Mobile No">
                </div>
                <button ng-click="addUser()" type="submit" class="btn btn-raised btn-primary btn-sm">Submit</button>
                <button ng-click="clear()" class="btn btn-raised btn-default btn-sm">Clear</button>
             
            </form>

            <form class="navbar-form" role="search" style="margin-left: 800px">
                <div class="input-group add-on">
                    <input class="form-control" ng-model="searchData" placeholder="Search" name="srch-term" id="srch-term" type="text">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>

            <h5 class="text-uppercase text-primary">All User Information::</h5>
            <table class="table table-bordered" >
                <thead>
                <tr>
                    {{-- <th>Id</th>--}}
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody ng-repeat="data in Info | filter:searchData" ng-switch="row.edit" ng-init="row={}">
                <tr ng-switch-default>
                    {{--<td>@{{data.id}}</td>--}}
                    <td>@{{data.name}}</td>
                    <td>@{{data.email}}</td>
                    <td>@{{data.mobile}}</td>
                    <td>
                        <button type="button" class="btn btn-raised btn-info btn-sm" ng-click="row.edit=true"><span class="glyphicon glyphicon-edit"></span>Edit</button>

                        <button type="button" class="btn btn-raised btn-danger btn-sm" ng-click="confirmDelete(data,$index)"><span class="glyphicon glyphicon-trash"></span>Delete</button>
                    </td>
                </tr>
                
                <tr ng-switch-when="true">
                    {{-- <td><input type="text" ng-model="data.id" ng-value="data.id"/></td>--}}
                    <td><input type="text" ng-model="data.name" ng-value="data.name"/></td>
                    <td><input type="text" ng-model="data.email" ng-value="data.email"/></td>
                    <td><input type="text" ng-model="data.mobile" ng-value="data.mobile"/></td>
                    <td>
                        <button type="button" class="btn btn-raised btn-primary btn-sm" ng-click="edituser($index,data,row.edit=false)"><span class="glyphicon glyphicon glyphicon-ok"></span> Save</button>

                        <a href="{{route("info")}}" class="btn btn-raised btn-default btn-sm"><span class="glyphicon glyphicon-remove"></span>Close</a>
                    </td>
                </tr>
                </tbody>
            </table>
            <div ng-animate="'animate-switch'" ng-show="true">
                <pagination ng-model="currentPage"
                            total-items="Length" items-per-page="numPerPage"
                            boundary-links="true">
                </pagination>
            </div>
        </div>
    </div>
</div>
</body>
</html>
