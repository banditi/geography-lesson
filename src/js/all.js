var initNewGame;
var number_of_question = 5;
var questions = [];
var question = {
  num: 128,
  country: "RU",
};
var question_iter = 0;
var kind_question = "C"; //"S"
var score = 0;
var curr_score = 10;
var curr_answer;
var curr_video;
var main_map;
var load_info;
var load_video;

$(function() {
  var palette = ['#66C2A5', '#FC8D62', '#8DA0CB', '#E78AC3', '#A6D854'];
  generateColors = function () {
    var colors = {},
        key;
    for (key in main_map.regions) {
      colors[key] = palette[Math.floor(Math.random()*palette.length)];
    }
    return colors;
  }
  // $("#question").text("Find: " + question).removeClass("none");

  $("#world-map").vectorMap({
    map: "world_mill_en",
    backgroundColor: "lightblue",
    regionsSelectable: true,
    regionsSelectableOne: true,
    regionStyle: {
      initial: {
        fill: "black",
        "fill-opacity": 1
      },
      hover: {
        "fill-opacity": 0.6
      },
      selected: {
        "fill-opacity": 0.8
      },
      selectedHover: {
        "fill-opacity": 0.7
      }
    },
    markerStyle: {
      initial: {
        fill: '#F8E23B',
        stroke: '#383f47'
      }
    },
    markers: all_capitals,
    onRegionClick: function (event, code) {
      // var curr = $("#world-map").vectorMap("get", "mapObject");
      curr_answer = code;
    },
    onMarkerClick: function (event, code) {
      // console.log(code, all_capitals[code].country);
      // var curr = $("#world-map").vectorMap("get", "mapObject");
      // $("#answer").removeClass("none");
      if (kind_question == "C") {
        curr_answer = all_capitals[code].country;
        main_map.clearSelectedRegions();
        main_map.setSelectedRegions(all_capitals[code].country);
      }
    },
    onRegionLabelShow: function (event, element, code) {
      event.preventDefault();
    },
  });
  

  initNewGame = function () {
    questions = [];
    question = {
      num: 128,
      country: "RU",
    };
    question_iter = 0;
    kind_question = "C";
    score = 0;
    curr_score = 10;
    $("#playAgain").addClass("none");
    $("#confirm").removeClass("none");
    $("#hint").removeClass("none");
    $("#more-info").addClass("none");
    main_map.clearSelectedRegions();
    for (var i = 0; i < number_of_question; i++) {
      var num = Math.floor(Math.random() * (all_capitals.length + 1));
      if (i > 0) {
        var j = 0;
        while (j < i) {
          if (num == questions[j].num) {
            num = Math.floor(Math.random() * (all_capitals.length + 1));
          }
          j++;
        }
      }
      var obj = {
        "num": num,
        "country": all_capitals[num].country
      }
      questions.push(obj);
    }

    $("#question b").text(main_map.getRegionName(
      questions[question_iter].country
    ));

    $("#num_q").text(number_of_question);
    $("#count_q").text(question_iter + 1);
    $("#score").text(score);
    $("#all_score").text(10 * number_of_question);

  }

  main_map = $("#world-map").vectorMap("get", "mapObject");
  initNewGame();

  $("#confirm:not(.disabled)").on("click", function (event) {
    if (curr_answer) {
      question = questions[question_iter];
      if (curr_answer == question.country) {
        $("#answer").text("Correct!");
        $("#answer").removeClass("alert-error");
        $("#answer").addClass("alert-success").stop().fadeIn(100).delay(3000).fadeOut(100);
        if (question_iter < number_of_question - 1) {
          $("#next_q").toggleClass("none");
        }
        $("#confirm").toggleClass("none");
        $("#hint").toggleClass("none");
        $("#more-info").toggleClass("none");
        load_info(main_map.getRegionName(questions[question_iter].country));
        load_video(main_map.getRegionName(questions[question_iter].country));
        score += curr_score;
        if (question_iter == number_of_question - 1) {
          $("#res_score").text(score);
          $("#resultModal").modal();
          $("#playAgain").toggleClass("none");
        }
      } else {
        if (curr_score > 2 && curr_answer) {
          curr_score -= 2;
        }
        // if ( !$("#next_q").hasClass("disabled") ) {
        //   $("#next_q").addClass("disabled");
        // }
        try {
          $("#answer").text("Wrong! It's " + main_map.getRegionName(curr_answer));
          $("#answer").removeClass("alert-success");
          $("#answer").addClass("alert-error").stop().fadeIn(100).delay(3000).fadeOut(100);

        } catch (e) {

        }
      }
      $("#score").text(score);
    }
    
  });

  $("#next_q").on("click", function (event) {
    main_map.clearSelectedRegions();
    if ( !$(this).hasClass("disabled")) {
      if (question_iter < number_of_question - 1) {
        question_iter++;
        curr_score = 10;
        curr_answer = undefined;
        curr_video = undefined;
        $("#question b").text(main_map.getRegionName(questions[question_iter].country));
        $("#answer").text("");
        $("#more-info").toggleClass("none");
        $("#info-wiki").html("");
        $("#confirm").toggleClass("none");
        $("#hint").toggleClass("none");
        $("#youtube-video").attr("src", "");
        $("#count_q").text(question_iter + 1);
      } else {
      }
      $(this).toggleClass("none");
    }
  });

  $("#hint").on("click", function (event) {
    score += 1;
    $("#score").text(score);
    curr_score = 10;
    curr_answer = undefined;
    curr_video = undefined;
    if (question_iter < number_of_question - 1) {
      $("#next_q").toggleClass("none");
    }
    $("#confirm").toggleClass("none");
    $("#hint").toggleClass("none");
    $("#more-info").toggleClass("none");
    if (question_iter == number_of_question - 1) {
      $("#res_score").text(score);
      $("#resultModal").modal();
      $("#playAgain").toggleClass("none");
    }
    load_info(main_map.getRegionName(questions[question_iter].country));
    load_video(main_map.getRegionName(questions[question_iter].country));
    main_map.clearSelectedRegions();
    main_map.setSelectedRegions(questions[question_iter].country);
    main_map.setFocus(questions[question_iter].country);
  });

  $("#open-video").on("click", function (event) {
    if (curr_video) {
      $("#youtube-video").show();
      $("#videoModal").find(".modal-body h3").remove();
      $("#youtube-video").attr("src", curr_video);
    } else {
      $("#youtube-video").hide();
      $("#videoModal").find(".modal-body").find("h3").remove();
      $("#videoModal").find(".modal-body").append("<h3>Sorry, no video for this country...</h3>");
    }
    $("#videoModal").modal();
  });

  $("#videoModal").on("hide", function () {
    $("#youtube-video").attr("src", "");
  });

  $(".play_again").on("click", initNewGame);

  load_info = function (country) {
    $("#loading").show();
    $.ajax({
      type: "POST",
      url: "/script.php",
      data: {
        "page": encodeURIComponent(country),
      },
      success: function (data) {
        // console.log(data);
        try {
          // var ps = [];
          var array_el = $(JSON.parse(data)["parse"]["text"]["*"]);
          var flag_finish = false;
          $("#info-wiki").html("");
          $("#loading").hide();
          array_el.each(function (index, element) {
            // console.log(flag_finish);
            if ($(element)[0].localName == "p" && !flag_finish) {
              // ps.push(element);
              $(element).find("a").each(function (ind, el) {
                $(el).before($(el).text());
                $(el).remove();
              });
              $(element).find("sup.reference").remove();
              $(element).find("#coordinates").remove();
              $("#info-wiki").html($("#info-wiki").html() + "<p>" + $(element).html() + "</p>");
              // console.log($("#more-info").html() + $(element).html());
            }
            flag_finish = (!flag_finish) ? ($(element)[0].className == "toc") : true;
          });
        } catch (e) {
          $("#loading").hide();
          $("#more-info").html("<a href='//en.wikipedia.org/wiki/"+encodeURIComponent(country)+"' target='_blank'>More information about this country...</a>");
        }
      }
    });
  }

  load_video = function (country) {
    $.ajax({
      type: "POST",
      url: "/video.php",
      data: {
        "country": encodeURIComponent(country),
      },
      success: function (data) {
        // console.log(data);
        try {
          var video = JSON.parse(data);
          curr_video = video.feed.entry[0].content.src;
          // console.log("Video: ", curr_video);
        } catch (e) {
          
        }
      }
    });
  }

});
