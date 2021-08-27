<?php
session_start();


include 'dbconnect.php';

if(isset($_SESSION['uid']) && isset($_SESSION['username'])){

  $uid = $_SESSION['uid'];
  $username = $_SESSION['username'];

}
else{
  header("location: login.php");
}


?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="welcome.css" >
    <link rel="stylesheet" href="navbar.css" >
  <title>Welcome</title>

  </head>

  <body>

  <?php
    include 'navbar.php';
  ?>




<div class="main">
  <div class="block">
    <div class="welcome">
      Welcome <?php echo $user ; ?> 
    </div>

    
  </div>

  <div class="container">
    <div class="back_img">
      <div class="quote">IT'S NOT NOT ABOUT THE     DESTINATION IT'S ABOUT THE JOURNEY !!!       
      </div>
    </div>
    
    <div class="subcontainer">
    <div class="blog_post">
        <div class="blog_div">
          <div class="blog_img">
            <img class="main_img" src="./image/weakend.jpg" alt="">
          </div>
          <div class="blog_data">
            <h3 class="head">When you have a weekend for yourself</h3>
            <p class="img_data">A big story coming through.. Feel free to just enjoy the photos if you don't have the patience to read 😉

            I decided in a sudden moment of the spur that I should go somewhere.. I decided to go to Kotagiri.. All the tourist spots are closed, but I just needed a place for a good drive..
            </p>
            <p class="writer"> - Smile Architect</p>
          </div>
        </div>
        <div class="blog_div">
          <div class="blog_img">
            <img class="main_img" src="./image/part10.jpg" alt="">
          </div>
          <div class="blog_data">
            <h3 class="head">10. Moving On</h3>
            <p class="img_data">“Sir? Sir?” I’m dreaming.

            “Sir?” It is 4:45am, five minutes before my alarm is to go off so that I can be ready for my pot of coffee to be delivered at 5:00. We leave for the park at 5:30, etc., etc.

            “Sir?” I’m not dreaming. The coffee is here so I scramble, or more accurately stumble, out of bed, pull on some clothes and unzip the room divider screen so that I can make my way to the screen at the tent’s front entry and unzip that.
            </p>
          </div>
        </div>
      </div>
      


      <div class="blog_post">
        <div class="blog_div">
          <div class="blog_img">
            <img class="main_img" src="./image/part9.jpg" alt="">
          </div>
          <div class="blog_data">
            <h3 class="head">9. Waw Pitiya: Wow</h3>
            <p class="img_data">Today is moving day. After sleeping in—until 6:30—my coffee arrived at 7:00. Breakfast is at 8:00 and I again had the opportunity to have a lengthy conversation with campmate Richard. His story would make a great book and I have taken the liberty to introduce him, via email, to Amy Butler at thestoryscribe.com should he be interested and/or need expert assistance to pursue the idea.Packed, I check out and depart at 10:00 in the back seat of Mr. Kalika’s Toyota. The drive—a bit over an hour—is instructive but not remarkable. 
            </p>
          </div>
        </div>

        <div class="blog_div">
          <div class="blog_img">
            <img class="main_img" src="./image/part8.jpg" alt="">
          </div>
          <div class="blog_data">
            <h3 class="head">8. Slow going until it's not</h3>
            <p class="img_data">One might think that driving the same roads in the same area over and over and over again would get monotonous. The difference here is that the animals—except for perhaps the water-hole bully buffalo—are always moving. Elephants seen at one place one day are not there the next. Leopards, the most elusive Yala creature—are territorial but moving about—and hiding—within that territory. So, when we board the Toyota truck and enter the park from the same place at the same time, it is anything other than the same. 
            </p>
          </div>
        </div>
      </div>






      <div class="blog_post">
        <div class="blog_div">
          <div class="blog_img">
            <img class="main_img" src="./image/part7.jpg" alt="">
          </div>
          <div class="blog_data">
            <h3 class="head">7. Suba Daba Doo</h3>
            <p class="img_data">Driving in a way that the BMW Driving Experience training team would praise and envy, Nishantha is a man on a mission. Yala Park Official Mr. Balawikrama—who has ridden shotgun on each of our game drives—has received a message. Shiram who is driving Sri Lankan Parliament Opposition Leader Mr. Sajith Premadasa at Galalukada Lake, has spotted a leopard.
            We are, only a half-hour after entering the park, 6 kilometers distant. Nishantha is not to be deterred.
            </p>
          </div>
        </div>

        <div class="blog_div">
          <div class="blog_img">
            <img class="main_img" src="./image/part6.jpg" alt="">
          </div>
          <div class="blog_data">
            <h3 class="head">6. Yala Yeah!</h3>
            <p class="img_data">Let me take some time for background on Yala National Park. In the southeast of the island, it borders the Indian Ocean and is the country’s second largest national park but lays claim to being the most visited. Designated as a wildlife sanctuary in 1900, you have seen that it hosts Sri Lankan leopards, Sri Lankan elephants, lots of birds along with the occasional sloth bear and lots of water buffalo. 
            </p>
          </div>
        </div>
      </div>


      <div class="blog_post">
       
        <div class="blog_div">
          <div class="blog_img">
            <img class="main_img" src="./image/part5.jpg" alt="">
          </div>
          <div class="blog_data">
            <h3 class="head">5. "J" Walking and more</h3>
            <p class="img_data">Meet the dominant male leopard in Yala National Park’s Block One: “J”.Up before 5:00, on the road at 5:30, first in the park when it opened at 6:00, Nichantha drove, quickly, deep into the park. Avinka explained that it was good to be first in. Today, however, there are very few vehicles in the park so, when we encountered “J” at about 7:30, we were alone with him and it stayed that way. But only for a bit as he had places to be which took him stealthily behind the bush and out of our sight.
            </p>
          </div>
        </div>

        <div class="blog_div">
          <div class="blog_img">
            <img class="main_img" src="./image/part4.jpg" alt="">
          </div>
          <div class="blog_data">
            <h3 class="head">4. Bull Standoff</h3>
            <p class="img_data">After a jet-lag impacted (which means often interrupted) sleep, at 8:20am, the room 126 telephone chirped. “Mr. Russell, we have received your PCR report. Shall I send it to your room?” One wonders how many guests have any reply to that inquiry other than mine: “Yes, please.”

            The intervening minutes passed with a slower than normal beat. Five minutes, nothing. Ten minutes, nothing. Fifteen minutes, nothing. 


            </p>
          </div>
        </div>
      </div>


      <div class="blog_post">
        <div class="blog_div">
          <div class="blog_img">
            <img class="main_img" src="./image/part3.jfif" alt="">
          </div>
          <div class="blog_data">
            <h3 class="head">3. Yala Limbo</h3>
            <p class="img_data">As usual, Emirates runs like clockwork. After a l o n g stay at the Emirates First Class Lounge at DBX, the flight was on time departing from a far away gate, C19. I was the only first class or business class passenger to Colombo on this 777-300ER, tail number A6EPM. This plane holds 8 in first class, 42 in business class and 304 more in economy class. I suspect that no more than 100 of the seats in the back were occupied but I cannot say that for certain.


            </p>
          </div>
        </div>

        <div class="blog_div">
          <div class="blog_img">
            <img class="main_img" src="./image/part2.jpeg" alt="">
          </div>
          <div class="blog_data">
            <h3 class="head">2. Aboard EK202, A380-800 to Dubai</h3>
            <p class="img_data">I am happy to escape the boisterous JFK Emirates Lounge, home to what seemed to be scores of screaming babies and toddlers and loud-talkers speaking Babel-like, multiple languages each struggling to be heard over the other. For this almost thirteen-hour-long overnight flight, up top there are 14 closed first-class suites and 76 flat-bed business class seats. 
            </p>
          </div>
        </div>
      </div>


      <div class="blog_post">
        <div class="blog_div">
          <div class="blog_img">
            <img class="main_img" src="./image/emirates.jpeg" alt="">
          </div>
          <div class="blog_data">
            <h3 class="head">1. Emirates Miles Expiring, Extension Not Possible</h3>
            <p class="img_data">I am finally back at it. I miss adventure travel terribly. But this trip? It only happened because of a weird and hard to believe set of circumstances.

            Early in 2021, Emirates Airlines let me know that my vast amount of award miles would expire at the end of the year, I was certain a mistake had been made.
            </p>
          </div>
        </div>
      </div>

    </div>

  </div>  

</div>



    
  </body>
</html>