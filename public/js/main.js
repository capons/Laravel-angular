var myApp = angular.module('myApp', []);
myApp.controller('MyController', ['$scope', 'notify', function ($scope, notify) {
    $scope.callNotify = function(msg) {
    if(typeof (msg) !== 'undefined') //check if input !empty
        if(msg.length !== 0) {       //check if input !empty
            notify(msg);           
            $scope.message = '';  //clear input field
        }
    };
}]);
myApp.factory('notify', ['$window', function(url) {
    var msgs = [];
    return function (msg) {
        msgs.push(msg);
        if (msgs.length == 3) {
            url.alert(msgs.join("\n")); //alert elements of array in new row
            msgs = []; //reset array
        }
    }
}]);







