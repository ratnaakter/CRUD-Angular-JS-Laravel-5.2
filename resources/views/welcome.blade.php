@extends('backend.layouts.master')
@section('sidebar')
@include('backend.layouts.sidebar')
@stop
@section('top_menu')
@include('backend.layouts.top_menu')
@stop
@section('content')
<div class="page" >{{--Initialize the controller name--}}
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href={!!('dashboard') !!}>Home</a></li>
            <li class="active"> Profile</li>
        </ol>
        <div class="page-header-actions">
            <a class="btn btn-sm btn-default btn-outline btn-round" href={!! ('live') !!}
            target="_blank">
            <i class="icon wb-link" aria-hidden="true"></i>
            <span class="hidden-xs">Website</span>
        </a>
    </div>
</div>
<div class="page-content" ng-controller="myController">
    <!-- Panel Example 1 -->
    <div class="panel">
        <header class="panel-heading">
            <h3 class="panel-title">
                Create Profile
            </h3>
            <div style="text-align: center;color: green">@{{Msg}}</div>
            <div style="margin-left: 20px">
                <h6>Title:<p ng-bind="title" class="text-primary"></p></h6>
                <h6>Description:<p ng-bind="description" class="text-primary"></p></h6>
                <h6>Name:<p ng-bind="name" class="text-primary"></p></h6>
                <h6>Email:<p ng-bind="email" class="text-primary"></p></h6>
            </div>
        </header>
        <form class="form-inline" role="form" name="myForm" style="margin-left: 29px">
            <div class="form-group form-material">
                <input type="text" class="form-control" ng-model="title"  placeholder="Enter Title"/>
            </div>
            <div class="form-group form-material">
                <input type="text" class="form-control"  ng-model="description" name="inputText"
                placeholder="Enter Description"/>
            </div>
            <div class="form-group form-material">
                <input type="text" class="form-control" ng-model="name" name="inputText" placeholder="Enter Name"/>
            </div>
            <div class="form-group form-material">
                <label class="sr-only" for="email" >Email:</label>
                <input type="email" class="form-control" ng-model="email"  placeholder="Enter Email">
            </div>
            <button ng-click="addProfile()" type="submit" class="btn btn-raised btn-success btn-sm">Submit</button>
            <button ng-click="clear()" class="btn btn-raised btn-default btn-sm">Clear</button>
            <br>
        </form>
        {{--========================== Search/filter===========================--}}
        <form class="navbar-form" role="search" style="margin-left: 800px">
            <div>
                <input class="form-control" style="background:powderblue" ng-model="searchData" placeholder="Search"
                name="srch-term"
                id="srch-term" type="text">
            </div>
        </form>
        <div class="panel-body">
            <div class="example table-responsive">
                <table class="table table-striped table-bordered" data-plugin="floatThead">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    {{--===========First time table view will be like this and ng-click="row.edit=true"=======--}}
                    <tbody ng-repeat="data in Info | filter:searchData" ng-switch="row.edit" ng-init="row={}">
                        <tr ng-switch-default>
                            <td>@{{data.title}}</td>
                            <td>@{{data.description}}</td>
                            <td>@{{data.name}}</td>
                            <td>@{{data.email}}</td>
                            <td style="width: 100px">
                                <button type="button" class="btn btn-raised btn-info btn-xs" ng-click="row.edit=true">
                                    <span class="glyphicon glyphicon-edit"></span>Edit
                                </button>
                                <button type="button" class="btn btn-raised btn-danger btn-xs" ng-click="confirmDelete
                                (data,$index)">
                                <span class="glyphicon glyphicon-trash"></span>Delete
                            </button>
                        </td>
                    </tr>
                    {{--===========First time table view will be like this and ng-click="edituser($index,data,row.edit=false)"=======--}}
                    <tr ng-switch-when="true">
                        <td><input type="text" ng-model="data.title" ng-value="data.title"/></td>
                        <td><input type="text" ng-model="data.description" ng-value="data.description"/></td>
                        <td><input type="text" ng-model="data.name" ng-value="data.name"/></td>
                        <td><input type="text" ng-model="data.email" ng-value="data.email"/></td>
                        <td>
                            <button type="button" class="btn btn-raised btn-primary btn-sm" ng-click="edituser($index,data,row.edit=false)"><span class="glyphicon glyphicon glyphicon-ok"></span> Save</button>
                            <a href="#" class="btn btn-raised btn-default btn-sm"><span class="glyphicon
                                glyphicon-remove"></span>Close</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End Page -->
@stop
