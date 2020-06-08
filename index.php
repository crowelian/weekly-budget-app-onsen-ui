<?php ?>
<!DOCTYPE html>
<html>

<head>
    
    <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsenui.css">
    <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsen-css-components.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/onsenui/js/onsenui.min.js"></script>
</head>

<body>
    <ons-navigator swipeable id="myNavigator" page="page1.html"></ons-navigator>

    <template id="page1.html">
        <ons-page id="page1">
            <ons-toolbar>
                <div class="center">Login</div>
            </ons-toolbar>
            <h1>Welcome to weekly budget app!</h1>
            <p>Login page is going here!</p>

            <ons-button id="push-button" style="width: 100%;">Login</ons-button>
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

            <div id="showDataDiv" class="container-1" style="text-align: center">
                <p>Getting the data:</p>
                <svg class="progress-circular progress-circular--indeterminate">
                    <circle class="progress-circular__background"/>
                    <circle class="progress-circular__primary progress-circular--indeterminate__primary"/>
                    <circle class="progress-circular__secondary progress-circular--indeterminate__secondary"/>
                </svg>
            </div>
            


        </ons-page>
    </template>
</body>

</html>

<script>

    ons.notification.toast('Welcome to BUGDET APP!', { timeout: 2000, animation: 'fall' })

    document.addEventListener('init', function(event) {
        var page = event.target;

        if (page.id === 'page1') {
            page.querySelector('#push-button').onclick = function() {
                document.querySelector('#myNavigator').pushPage('page2.html', {
                    data: {
                        title: 'Get data page'
                    }
                });
            };
        } else if (page.id === 'page2') {
            page.querySelector('ons-toolbar .center').innerHTML = page.data.title;
            GetData();
        }
    });

function GetData() {
    
        $.get("test_fetch.php",
        {
            login: "true",
            week: 1,
            year: 2020,
            userid: 3
        },
        function(data, status){
            
            let response = JSON.stringify(data);
            //alert("Data: " + response + "\nStatus: " + status);
            //console.log("data: " + data);

            let output = "<br><br>";
            output += "Week: " + data.week_info.week_num + "<br>" +
            "week_id: " + data.week_info.week_id +"<br>" +
            "year: " + data.week_info.year;
            $('#showDataDiv').html(output);


            
        });
    
}
    


</script>