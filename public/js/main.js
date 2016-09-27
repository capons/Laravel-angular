
var module = angular.module('myApp', []);
module.controller('FilterController', ['$scope','filterFilter', function($scope,filterFilter) {
    $scope.array = [
        {name: 'Tobias'},
        {name: 'Jeff'},
        {name: 'Brian'},
        {name: 'Igor'},
        {name: 'James'},
        {name: 'Brad'}
    ];
    $scope.filteredArray = filterFilter($scope.array, 'a');
}]);









