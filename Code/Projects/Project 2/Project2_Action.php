<?php
if($_POST["submitme"]){
if($_POST["name"]=== 'admin' && $_POST["passwd"]=== 'admin')
{
    $file = "Project2.txt";
    $InfoStr = file_get_contents($file);
    $InfoStr = trim($InfoStr);
    $InfoList = explode("\n", $InfoStr);
    foreach($InfoList as $index=>$line)
    {
        $personInfo[$index] = explode("\t", $line); //$personInfo is a 2D array
    }
        $found = 0;
            echo "<table border=1>";
    echo "<tr>
            <th>No.</th>        
            <th>Name</th>
            <th>Email</th>
            <th>Major</th>
            <th>Grade</th>
            <th>IP address</th>
            <th>Date</th>
            <th>Time</th>
        </tr>";
        
    if($_POST["showwhat"] == "all")
    {
   echo  "The grade for each student is shown as follows.";
        foreach($personInfo as $people)
    {
            $found++;
            echo "<tr>";
                echo "<td>".$found."</td>";
            foreach($people as $info)
                echo "<td>".$info."</td>";
            echo "</tr>";
        
    }
    }
    if($_POST["showwhat"] == "p100")
    {
    echo "The students who got 100 points.";
        foreach($personInfo as $people)
    {
        if($people[3] == 100)
        {
            $found++;
            echo "<tr>";
                echo "<td>".$found."</td>";
            foreach($people as $info)
                echo "<td>".$info."</td>";
            echo "</tr>";
        }
    }
    }

    if($_POST["showwhat"] == "dm0")
    {
    echo "The Digital Media students who got 0 points.";


        foreach($personInfo as $people)
    {
        if($people[3] == 0 && $people[2] == "Digital Media")
        {
        
            $found++;
            echo "<tr>";
                echo "<td>".$found."</td>";
            foreach($people as $info)
                echo "<td>".$info."</td>";
            echo "</tr>";
           }
   
    }
    }
    
    else if($_POST["showwhat"] == "bydate")
    {
   $yesterday  = strtotime(date("d.m.Y", time()-57600))."<br/>";
    echo "The info for students who took the test after 8:00am of yesterday.<br/>";
        foreach($studentInfo as $student)
        {            
            if((strtotime($student[5])+28800)>$yesterday)
            {
                $found++;
            echo "<tr>";
                echo "<td>".$found."</td>";
            foreach($people as $info)
                echo "<td>".$info."</td>";
            echo "</tr>";
            }
        }
     }
    
    else if($_POST["showwhat"] == "byname")
    {
     echo "The infor for students whose name is: ".$_POST["student"].".<br/>";
    foreach($personInfo as $people)
    {
        if($_POST["student"] == $people[0])
        {
            $found++;
            echo "<tr>";
                echo "<td>".$found."</td>";
            foreach($people as $info)
                echo "<td>".$info."</td>";
            echo "</tr>";
        }
    }
    }
echo "</table>";
    echo "Totally ".$found." people found.<br/>";
}
else
{
    echo "Not authorized to see grades";
}

$file = "project2.txt";
$studentStr = file_get_contents($file);
$studentStr = trim($studentStr); //trim extra spaces or newlines at the end or the beginning

$studentList = explode("\n", $studentStr);
}
?>