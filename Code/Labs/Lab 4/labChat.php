<?php
$result = $_GET["msg"];
if ($result == "q") {
    echo "@@@quit now@@@";
} elseif ($result == "0") {
    echo "GGC address is: 1000 University<br>";
    echo "Center Lane | Lawrenceville, GA<br>";
    echo "30043<br>";
} elseif ($result == "1") {
    echo "GGC telphone number is:<br>";
    echo "678.407.5000<br>";
} elseif ($result == "2") {
    echo "GGC ITEC program is:<br/>";
    echo "Information technology (ITEC) is<br>";
    echo "the multidisciplinary study, design,<br>";
    echo "development, implementation,<br>";
    echo "support or management of computer-based information<br>";
    echo "systems, particularly software<br>";
    echo "applications and system networks<br>";
    echo "At GGC, ITEC majors may focus<br>";
    echo "on one of four areas: digital media,<br>";
    echo "enterprise systems, software<br>";
    echo "development or systems security.<br>";
} elseif ($result == "3") {
    echo "About PHP programming: PHP is a<br>";
    echo "server scripting language, and a<br>";
    echo "powerful tool for making dynamic<br>";
    echo "and interactive Web pages. PHP is<br>";
    echo "a widely-used, free, and efficient<br>";
    echo "backend web development<br>";
    echo "language.<br>";
} else {
    echo "Welcome to GGC customer service.<br>";
    echo "Please choose the following menu:<br>";
    echo "0: GGC address<br>";
    echo "1: GGC telphone number<br>";
    echo "2: About ITEC program<br>";
    echo "3: About PHP programming<br>";
    echo "q: Quit chatting<br>";
}
