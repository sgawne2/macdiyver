<?php
session_start();
?>
<html lang="en" >
<head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="91270851940-5lgc81fgbnda478gb40n80nqi207rnpe.apps.googleusercontent.com">

    <!--Angular Material Style Sheets-->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- jQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- Google Analytics tracking code -->
    <?php include_once("google_analytics.php") ?>

    <!-- Pinterest -->
    <script
        type="text/javascript"
        async defer
        src="//assets.pinterest.com/js/pinit.js"
    ></script>

    <!-- Angular Material requires Angular.js Libraries -->
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular-route.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>

    <!-- Angular Material Library -->
    <script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>

    <!-- Google Sign In -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <!--Local Script Sources-->
    <script src="js/diyApp/diyApp.js"></script>
    <script src="js/components/app/app.component.js"></script>
    <script src="js/components/addStep/addStep.component.js"></script>
    <script src="js/components/autoChip/autoChip.component.js"></script>
    <script src="js/components/projectCard/projectCard.component.js"></script>
    <script src="js/components/createProfile/createProfile.component.js"></script>
    <script src="js/components/sidePanel/sidePanel.component.js"></script>
    <script src="js/components/footer/footer.component.js"></script>

</head>
<body ng-app="diyApp">

<!--sticky header-->
<md-toolbar layout="column" ng-controller="AppCtrl">
    <div class="md-toolbar-tools">

        <!--hamburger icon-->
        <md-button ng-click="toggleLeft()"><md-icon md-font-set="material-icons">dehaze</md-icon></md-button>


        <!--<div class="logo"></div>-->
        <div class="logo"></div>
        <h2><a href="index.php">Mac<span class="tealText">diy</span>ver</a></h2>
        <span flex=""></span>

        <md-button><a href="submit_project.php">Submit Project</a></md-button>
        <md-button id="profile-btn" style="display:none">My Profile</md-button>
        <!--<md-button id="signout" style="display:none" onclick="signOut()">Log out</md-button>-->
        <div class="g-signin2" data-onsuccess="onSignIn" data-theme="light"></div>
        <script>
            function onSignIn(googleUser) {
                // Useful data for your client-side scripts:
                var profile = googleUser.getBasicProfile();
                console.log("ID: " + profile.getId()); // Don't send this directly to your server!
                console.log('Full Name: ' + profile.getName());
                console.log('Given Name: ' + profile.getGivenName());
                console.log('Family Name: ' + profile.getFamilyName());
                console.log("Image URL: " + profile.getImageUrl());
                console.log("Email: " + profile.getEmail());

                // The ID token you need to pass to your backend:
                var id_token = googleUser.getAuthResponse().id_token;
                console.log("ID Token: " + id_token);
                document.getElementById("profile-btn").setAttribute("style", "display:block");
                document.getElementById("signout").setAttribute("style", "display:block");
            }
            function signOut() {
                var auth2 = gapi.auth2.getAuthInstance();
                auth2.disconnect();
                auth2.signOut().then(function () {
                    console.log('User signed out.');
                    document.getElementById("signout").setAttribute("style", "display:none");
                });
            }
        </script>
    </div>
</md-toolbar>
<div layout="column" style="height:5%;"></div>

<md-card flex="70" flex-offset="15" style="max-height:none">
    <div style="background-color: #00BFA5; color:white; width:100%">
        <h2>About Us</h2>
    </div>

    <md-card-content class="aboutUsCard">
        <h3>You got trash? No, friend, you've got treasure.</h3>
        <p>Hi, we're Sean, Vernon, and Miles, and we're proud to bring you MacDIYver, a website dedicated to showing you that with some effort, a good plan, and a little broken glass, you can make some truly amazing things. We're a passionate group of hackers and makers, and we'd love to help you express your own creativity and maker spirit.</p>
        <h3>You provide the tools, and we provide the plan!</h3>
        <p>You tell MacDIYver the tools and materials that you have available, and MacDIYver will help you find the perfect project, so that you can spend more time making and less time making excuses.</p>
        <p>We created MacDIYver as our final project for the LearningFuze Full Immersion Web Development Bootcamp as a culmination of all of the technologies that we've learned about over the past twelve weeks. Our front end utilizes Angular and [stuff I don't know that you should answer yourself] in order to deliver a dynamic and responsive user experience. Our back end [does stuff I have no idea].</p>
        <h2>Meet the Team!</h2>
        <h3>Sean</h3>
        <p>The Full-Stack Developer</p>
        <h3>Vernon</h3>
        <p>The Backend Developer</p>
        <h3>Miles</h3>
        <p>The Front End Developer</p>
        <h2>Turn your garbage into gold!</h2>

    </md-card-content>
</md-card>

<!--side nav-->
<side-panel></side-panel>
<div layout="column" style="height:5%;"></div>
<footer></footer>
</body>
</html>