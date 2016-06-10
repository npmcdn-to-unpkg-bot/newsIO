@extends('master')
@section('app', 'snug-feeds')

@section('content')
    <div ng-controller="feedsController">
        <div class="ui thin sidebar visible" id="sidebar" ng-class="{'hidden': sidebarToggle}">
            <div class="toggle" ng-click="toggleSidebar()">
                <i class="sidebar icon"></i>
            </div>
            <div id="logo">
                <a href="/">
                    <img src="https://s3-us-west-2.amazonaws.com/news-io/img/logo-green.png" class="img-responsive">
                </a>
            </div>
            <div class="item" ng-class="{'active': articleFilter == @{{feed.id}}}" ng-repeat="feed in activeFeeds">
                <a href="#" ng-click="filterArticles(feed.id)"><img ng-src="https://s3-us-west-2.amazonaws.com/news-io/icons/@{{feed.icon_name}}.png"><b ng-show="!sidebarToggle">@{{feed.source}}</b></a>
            </div>
        </div>
        <div id="feed-stream" ng-class="{'wider': sidebarToggle}">
            <div class="ui text segment contain">
                <div class="ui warning message" ng-show="!warning">
                    <i class="close icon" ng-click="warning=true;"></i>
                    <div class="header">
                        FYI
                    </div>
                    <p>Don't forget to register to save your feeds.</p>
                </div>
                <div class="ui grid">
                    <div class="six wide column">
                        <div class="featured-article article">
                            <a class="ui green ribbon label">The Latest</a>
                            <article article="feeds[0]"></article>
                        </div>

                        <div class="featured-article article">
                            <a class="ui green ribbon label">Featured</a>
                            <article article="feeds[1]"></article>
                        </div>

                    </div>
                    <div class="ten wide column right">
                        <div class="ui three column grid">
                            <div class="column" ng-repeat="feed in feeds" ng-if="$index > 0 && !articleFilter ||
                        articleFilter == feed.feed_id">
                                <div class="ui fluid card article">
                                    <article article="feed"></article>
                                </div>
                            </div>
                        </div>

                        <button id="load-more" class="ui primary button" ng-click="getArticles(true)">
                            Load More
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div id="utility-bar">
            <div class="ui grid">
                <div class="four wide column">
                    <p>Jaden</p>
                </div>
                <div class="four wide column">
                    <button class="ui button right floated" ng-click="showLoginModal()">Login</button>
                    <button class="ui button right floated">Register</button>
                </div>
            </div>
        </div>
        <modal options="loginModal"></modal>
    </div>
@endsection

@section('scripts')
    <script src="/js/Controllers/FeedsController.js"></script>
    <script src="/js/Directives/Article.js"></script>
    <script src="/js/Services/ArticleService.js"></script>
@endsection