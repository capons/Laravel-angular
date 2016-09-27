var app = angular.module('todoApp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.controller('todoController',['$scope','$http','$log', function($scope, $http, $log) {

    $scope.todos = [];
    $scope.loading = false;

    $scope.init = function() {
        $scope.loading = true;
        $http.get('/api/todos').
        success(function(data, status, headers, config) {
            $log.log(data);
            $scope.todos = data['response'];
            $scope.loading = false;

        });
    };

    $scope.addTodo = function() {
        $scope.loading = true;

        $http.post('/api/todos', {
            title: $scope.todo.title,
            done: $scope.todo.done
        }).success(function(data, status, headers, config) {
            $log.log(data);
            $scope.todos.push(data['response']);
            $scope.todo = '';
            $scope.loading = false;

        });
    };

    $scope.updateTodo = function(todo) {
        $scope.loading = true;

        $http.put('/api/todos/' + todo.id, {
            title: todo.title,
            done: todo.done
        }).success(function(data, status, headers, config) {
            todo = data;
            $scope.loading = false;

        });
    };

    $scope.deleteTodo = function(index) {
        $scope.loading = true;

        var todo = $scope.todos[index];
        
        $http.delete('/api/todos/' + todo.id)
            .success(function() {
                $scope.todos.splice(index, 1);
                $scope.loading = false;

            });
    };


    $scope.init();

}]);




