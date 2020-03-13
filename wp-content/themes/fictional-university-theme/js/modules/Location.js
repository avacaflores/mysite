import $ from 'jquery';

class Location {
  constructor() {
    this.events();
  }

  events() {
    $(".mybuttonk").on("click", this.ourClickDispatcher.bind(this));
    
  }

  // methods
  ourClickDispatcher(e) {



    //var currentMajorBox = $(e.target).closest(".major-box");

    this.getLocation();
  }


  getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(this.showPosition);
    } else { 
        x = $("#demo");
      x.innerHTML = "Geolocation is not supported by this browser.";
    }
  }

  showPosition(position) {
    //x = $("#demo")
    //x.innerHTML = "Latitude: " + position.coords.latitude + 
    //"<br>Longitude: " + position.coords.longitude;
    //document.getElementById("myLocation").setAttribute("data-lat", "56");//=position.coords.latitude;
    //var h1 = document.getElementById("myLocation");
    //var att = document.createAttribute("data-lat);
    //att.value = "55";
    //h1.setAttributeNode(att);;
    $("#myLocation").attr("class","marker");
    $("#myLocation").attr("data-lat","56");
    $("#myLocation").attr("data-lng","-72");
    //data-lat="45" data-lng="-72"

    //$("#map").attr("class","acf-map");
    //var googleMap2 = new GoogleMap();
  
  }


  changeMajor(currentMajorBox) {

    var newMajor = currentMajorBox.data('major')
    console.log(newMajor);

    $.ajax({
      beforeSend: (xhr) => {
        xhr.setRequestHeader('X-WP-Nonce', universityData.nonce);
      },
      url: universityData.root_url + '/wp-json/university/v1/manageMajor',
      type: 'POST',
      data: {'major': newMajor},
      success: (response) => {

        $(".major-box").each(function() {
            $(this).attr('data-selected', '');
        });

        currentMajorBox.attr('data-selected', 'yes');

        console.log(response);
      },
      error: (response) => {
        console.log(response);
      }
    });
  }
}

export default Location;