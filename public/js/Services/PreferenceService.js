'use strict';

(function(angular){
    angular.module('snugfeed.service.preference', ['ngCookies'])
        .service('preferenceService', function ($cookies) {

            /**
             * Set a preference
             * @param preference
             * @param value
             */
            function set(preference, value) {
                var cookie = $cookies.getObject('preferences') ? $cookies.getObject('preferences') : {};
                cookie[preference] = value;
                $cookies.putObject('preferences', cookie);
            }

            /**
             * Get a preference
             * @param preference
             * @returns {boolean}
             */
            function get(preference) {
                if(typeof $cookies.getObject('preferences') !== 'undefined') return $cookies.getObject('preferences')[preference];
                return false;
            }

            return {
                set: set,
                get: get
            }

        });
})(angular);