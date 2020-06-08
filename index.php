<?php ?>
<!DOCTYPE html>
<html>

<head>

    <!-- <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsenui.css"> -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsen-css-components.min.css"> -->
    <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsenui.css">
    <link rel="stylesheet" href="css/theme.css">
    <link rel="stylesheet" href="css/onsen-css-components.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/onsenui/js/onsenui.min.js"></script>

    <style>
    
        input:-internal-autofill-selected {
            background-color: #000000 !important;
        }
    
    </style>
</head>

<body>
    <ons-navigator swipeable id="myNavigator" page="page1.html"></ons-navigator>

    <template id="page1.html">
        <ons-page id="page1">
            <ons-toolbar>
                <div class="center">Login</div>
            </ons-toolbar>

            <section class="custom-section" style="margin: 16px;">
                <h1>Welcome to weekly budget app!</h1>
                <p>Login page is going here!</p>

                <div style="text-align: center; margin-top: 30px;">
                    <p>
                        <ons-input id="username" modifier="underbar" placeholder="Username" float></ons-input>
                    </p>
                    <p>
                        <ons-input id="password" modifier="underbar" type="password" placeholder="Password" float></ons-input>
                    </p>
                    <p style="margin-top: 30px;">
                        <ons-button onclick="login()" modifier="large">Sign in</ons-button>
                    </p>
                </div>


                <ons-button id="push-button-settings" modifier="large">Settings</ons-button>
            </section>

            

            


        </ons-page>
    </template>

    <template id="page2.html">
        <ons-page id="page2">
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>Page 1</ons-back-button>
                </div>
                <div class="center"></div>
            </ons-toolbar>

            <section class="custom-section" style="margin: 16px;">
                <div id="showDataDiv" class="container-1" style="text-align: center">
                    <p>Getting the data:</p>
                    <svg class="progress-circular progress-circular--indeterminate">
                        <circle class="progress-circular__background" />
                        <circle class="progress-circular__primary progress-circular--indeterminate__primary" />
                        <circle class="progress-circular__secondary progress-circular--indeterminate__secondary" />
                    </svg>
                </div>
            </section>


        </ons-page>
    </template>

    <template id="settings.html">
        <ons-page id="settings">

            <ons-toolbar>
                <div class="left">
                    <ons-back-button>Page 1</ons-back-button>
                </div>
                <div class="center"></div>
            </ons-toolbar>

            <ons-tabbar swipeable position="auto">
                <ons-tab page="tab1.html" label="Tab 1" icon="ion-home, material:md-home" badge="255" active>
                </ons-tab>
                <ons-tab page="tab2.html" label="Tab 2" icon="md-settings" active-icon="md-face">
                </ons-tab>
            </ons-tabbar>


            <template id="tab1.html">
                <ons-page id="Tab1">
                    <p style="text-align: center;">
                        This is the first page.
                    </p>
                </ons-page>
            </template>

            <template id="tab2.html">
                <ons-page id="Tab2">
                    <p style="text-align: center;">
                        This is the second page.
                    </p>
                </ons-page>
            </template>
        </ons-page>
    </template>







</body>

</html>

<script>

    ons.notification.toast('Welcome!', { buttonLabel: 'Dismiss', timeout: 1500 })


    // pages code
    document.addEventListener('init', function(event) {
        var page = event.target;

        if (page.id === 'page1') {
            page.querySelector('#push-button-settings').onclick = function() {
                document.querySelector('#myNavigator').pushPage('settings.html', {
                    data: {
                        title: 'Settings'
                    }
                });
            };
            page.querySelector('#push-button').onclick = function() {
                document.querySelector('#myNavigator').pushPage('page2.html', {
                    data: {
                        title: 'Get data page'
                    }
                });
            };
        } else if (page.id === 'page2') {
            page.querySelector('ons-toolbar .center').innerHTML = page.data.title;
            GetAllData();
        }
    });

    // tabs code
    document.addEventListener('prechange', function(event) {
        //document.querySelector('ons-toolbar .center').innerHTML = event.tabItem.getAttribute('label');
    });

    function GetAllData() {

        $.get("fetch_all_weeks.php", {
                login: "true",
                week: 1,
                year: 2020
            },
            function(data, status) {

                let response = JSON.stringify(data);
                //alert("Data: " + response + "\nStatus: " + status);
                //console.log("data: " + data);

                let output = "<br><br>";
                output += data;
                $('#showDataDiv').html(output);



            });

    }


    var login = function() {
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;

        if (username === 'admin' && password === 'secret') {
            ons.notification.toast('Logged in!', { buttonLabel: 'Dismiss', timeout: 1500 })
            document.querySelector('#myNavigator').pushPage('page2.html', {
                    data: {
                        title: 'Get data page'
                    }
            });
        } else {
            ons.notification.alert('Incorrect username or password.');
        }
    };
</script>