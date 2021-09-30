  
    function on() {
        document.getElementById("overlay").style.display = "block";
      }
  
      function off() {
        document.getElementById("overlay").style.display = "none";
      }
  
  
  
      $(document).ready(function() {
        $(".navbar").click(function() {
          var x = $(window).width();
          if (x < 850) {
            $(".minimize").toggle();
          }
        });
      });
  
      $(document).resize(function() {
        $(".navbar").click(function() {
          var x = $(window).width();
          if (x < 850) {
            $(".minimize").toggle();
          }
        });
      });
  
  
  
  
      const toggle = document.getElementById("toggle");
      toggle.onclick = function() {
        toggle.classList.toggle("active");
        document.body.classList.toggle('dark_theme');
      }
  
  
  
      $(document).ready(function() {
        $(".post_icon").click(function() {
          $(this).siblings('.index_link').toggle();
        });
      });
    