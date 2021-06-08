<!--
    Programmed By: DJ Booker
    June 8, 2021
    This program will demonstrate AJAX
-->

<html>

<body>
    <p> This is something containing a lot of stuff </p>
    <hr />
    <div id="mydoc">
        <p> This is an article about XYZ. If you want to know more about it, click the button. </p>

        <!--Button to load the article-->
        <button type="button" onclick="LoadDoc();"> Load Article </button>
    </div>
    <!--Java Script to handle button press-->
    <script>
        /*
        readyState  Holds the status of the XMLHttpRequest.
        0: request not initialized
        1: server connection established
        2: request received
        3: processing request
        4: request finished and response is ready status Returns the status-number of a request
        200: "OK"
        403: "Forbidden"
        404: "Not Found"
        For a complete list go to w3schools.com/tags/ref_http messages.asp
        */
        function LoadDoc() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("mydoc").innerHTML = this.responseText;
                }

            }
            xhttp.open("GET", "AjaxFile.txt", true);
            xhttp.send();
        }
    </script>

    <!--Stock Prices-->
    <hr />
    <div>
        <h2>The most recent stock price for Apple is: $<span id="myPrice">180</span></h2>
        <!-- <button type="button" onclick="loadPrice();"> Update Price </button> -->
    </div>
    <script>
        // Refresh every second (1000ms = 1 sec)
        var alarm1 = setInterval(loadPrice, 1000);

        function loadPrice() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("myPrice").innerHTML = this.responseText;
                }

            }
            xhttp.open("GET", "AjaxAction-1.php", true);
            xhttp.send();
        }
    </script>

    <!--Progress Bar-->
    <hr />
    <div>
        <h1>Loading something that takes a long time:<span id="pvalue">0</span>%</h1>
        <progress min=0 max="100" value="0" id="myprogress" style="display: none;"></progress>

        <button type="button" onclick="loadInfo();" id="start">Start Loading Info</button>
    </div>
    <div>
        <script>
            function loadInfo() {

                var alarm2 = setInterval(showProgress, 500);
            }

            function showProgress() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("pvalue").innerHTML = this.responseText;
                    }

                }
                var p = document.getElementById("pvalue").innerHTML;
                xhttp.open("GET", "AjaxAction-2.php?cp=" + p, true);
                xhttp.send();

                // Check to see if its 100 percent
                if (p >= 100) {
                    clearInterval(alarm2);
                }
                document.getElementById("myprogress").style.display = "block";
                document.getElementById("myprogress").value = p;
            }
        </script>
    </div>

</body>

</html>