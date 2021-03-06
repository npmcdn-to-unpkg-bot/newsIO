'use strict';

(function(angular) {
    angular.module('snugfeed.service.feeds', [])
        .service('snugfeedFeedsService', [ "$http", "$q", "$rootScope", function ($http, $q, $rootScope) {

            var getFeeds = function () {
                return $http.get("/api/feed");
            };

            var getActiveFeeds = function() {
                return $http.get("/api/feed?active");
            };

            var addFeed = function (data) {
                return $http.post("/api/feed", data);
            };

            var removeFeeds = function (ids) {
                return $http.delete("/api/feed", {ids: ids});
            };

            var updateFeeds = function (feeds) {
                return $http.put("/api/feeds", feeds);
            };

            var searchForFeed = function(term) {
                return $http.get("/api/feed?term="+term);
            };

            return {
                getFeeds: getFeeds,
                updateFeeds: updateFeeds,
                addFeed: addFeed,
                getActiveFeeds: getActiveFeeds,
                removeFeeds: removeFeeds,
                searchForFeed: searchForFeed
            };

        }]);
})(angular);