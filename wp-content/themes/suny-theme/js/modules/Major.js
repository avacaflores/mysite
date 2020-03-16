import $ from 'jquery';

class Major {
  constructor() {
    this.events();
  }

  events() {
    $(".major-box").on("click", this.ourClickDispatcher.bind(this));
  }

  // methods
  ourClickDispatcher(e) {
    var currentMajorBox = $(e.target).closest(".major-box");

    this.changeMajor(currentMajorBox);
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

export default Major;