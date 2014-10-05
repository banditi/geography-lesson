var question = "US";
var curr_map;
var kind_q = "C"; //"S"

$(function() {
  var palette = ['#66C2A5', '#FC8D62', '#8DA0CB', '#E78AC3', '#A6D854'];
  generateColors = function () {
    var colors = {},
        key;
    for (key in curr_map.regions) {
      colors[key] = palette[Math.floor(Math.random()*palette.length)];
    }
    return colors;
  }

  $("#question").text("Find: " + question).removeClass("none");

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
    series: {
      regions: [{
        attribute: 'fill'
      }]
    },
    markerStyle: {
      initial: {
        fill: '#F8E23B',
        stroke: '#383f47'
      }
    },
    markers: all_capitals,
    onRegionClick: function (event, code) {
      var curr = $("#world-map").vectorMap("get", "mapObject");
      $("#answer").removeClass("none");
      if (code == question) {
        $("#answer").text("YES!");
      } else {
        $("#answer").text("No! " + curr.getRegionName(code));
      }
    },
    onMarkerClick: function (event, code) {
      console.log(code, all_capitals[code].country);
      var curr = $("#world-map").vectorMap("get", "mapObject");
      $("#answer").removeClass("none");
      if (kind_q == "C") {
        if (all_capitals[code].country == question) {
          $("#answer").text("YES!");
        } else {
          try {
            $("#answer").text("No! " + curr.getRegionName(all_capitals[code].country));
          } catch (e) {

          }
        }
        curr.clearSelectedRegions();
        curr.setSelectedRegions(all_capitals[code].country);
      }
    },
    onRegionLabelShow: function (event, element, code) {
      event.preventDefault();
    },
  });
  
  curr_map = $("#world-map").vectorMap("get", "mapObject");
  // curr_map.series.regions[0].setValues(generateColors());
});