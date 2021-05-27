<?php
// Function to show a message
function showMSG()
{
    echo "Hello World!!!<br/>";
}

// Function to show correct image based on the given value
function showImage($weather)
{
    if ($weather == "sunny") {
        $image = "https://see.news/wp-content/uploads/2020/04/%D8%AA%D9%86%D8%B2%D9%8A%D9%84-1.jpeg";
    }
    elseif ($weather == "rainy") {
        $image = "https://www.telegraph.co.uk/content/dam/news/2017/08/09/TELEMMGLPICT000136990468_trans_NvBQzQNjv4BqIwl9IG5jqjTnMF_mYsqh_pUlecjHnB-Tj8AhLJz5PNg.jpeg?imwidth=450";
    }
    elseif ($weather == "cloudy") {
        $image = "https://www.dayton.com/resizer/i4RpuXrpe_YI736ujT0hjLKz33E=/1066x600/cloudfront-us-east-1.images.arcpublishing.com/coxohio/FDIJ2UYUQJHGFMJGER3FMGKMSE.jpg";
    }
    else $image = "https://tentsupply.com/wp-content/uploads/tent-supply-windy.jpg";

        echo "<img src= '".$image."' height=200px width=200px>";
}
?>

