<!--
    Programmed By: DJ Booker
    June 8, 2021
    This program will demonstrate the use of GIFs for loading something
-->

<html>

<head>
    <style>
        .menu:hover
        {
            background-color: blueviolet;
        }
    </style>
</head>

<body>
    <!--Busy Processing-->
    <p>Click the following button to do something that takes a long time:</p>
    <img id="myimg" src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/09b24e31234507.564a1d23c07b4.gif" width="100" height="100" style="display: none;">
    <button id="mybutton" onclick="showBusy();">Start the job </button>

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
        function showBusy() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState < 4) {
                    document.getElementById("mybutton").innerHTML = "Processing...";
                    document.getElementById("mybutton").disabled = true;
                    document.getElementById("myimg").style.display = "inline";
                }
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("myimg").style.display = "none";
                    document.getElementById("mybutton").disabled = false;
                    document.getElementById("mybutton".innerHTML = "Start the job")
                    // document.getElementById("mydoc").innerHTML = this.responseText;
                }

            }
            xhttp.open("GET", "busyProcessing.php", true);
            xhttp.send();
        }
    </script>

    <!--Script to show text hints-->
    <hr />
    <p>Start typing a name in the input box below</p>
    <span style="float: left;">First Name:</span>
    <div style="float: left;">
        <input type="text" onkeyup="showHint(this.value);" id="myinput" autocomplete="off">
        <div style="border: 1px black solid; height: 120px; display:none" id="hint"></div>
    </div>
    <script>
        function showHint(str) {
            if (str.length == 0) {
                document.getElementById("hint").innerHTML = "";
                document.getElementById("hint").style.display = "none";
                return;
            }

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var result = this.responseText;
                    if (result != "") {
                        document.getElementById("hint").style.display = "block";
                    } else
                        document.getElementById("hint").style.display = "none";

                    document.getElementById("hint").innerHTML = result;

                }

            }
            xhttp.open("GET", "getHint.php?q=" + str, true);
            xhttp.send();
        }

        function selectMe(name) {
            document.getElementById("myinput").value = name;
             document.getElementById("hint").style.display = "none";
        }
    </script>
</body>

</html>