<?
// if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
// header("Access-Control-Allow-Origin: *");

//$APPLICATION->SetPageProperty("description", "Зпишитесь на курсы \"Хочу знать\"! Пройдите подготовку к ЕГЭ и ГИА 2014 в нашем центр подготовки к ЕГЭ в Москве. Занятия в группах до 5 человек по 14 предметам ЕГЭ и ГИА!");
//$APPLICATION->SetPageProperty("keywords", "Курсы \"Хочу знать\" | Подготовка к ЕГЭ и ГИА 2014, курсы ЕГЭ 2014 и ГИА в Москве. Занятия по подготовке школьников и учеников к ЕГЭ И ГИА 2014, центр подготовки к ЕГЭ в Москве. Подготовительные курсы");
//$APPLICATION->SetPageProperty("title", "Курсы \"Хочу знать\" | Подготовка к ЕГЭ и ГИА 2014, курсы ЕГЭ 2014 и ГИА в Москве. Занятия по подготовке школьников и учеников к ЕГЭ И ГИА 2014, центр подготовки к ЕГЭ в Москве. Подготовительные курсы");
//$APPLICATION->SetTitle("Курсы \"Хочу знать\" | Подготовка к ЕГЭ и ГИА 2014, курсы ЕГЭ 2014 и ГИА в Москве. Занятия по подготовке школьников и учеников к ЕГЭ И ГИА 2014, центр подготовки к ЕГЭ в Москве. Подготовительные курсы");

?> 
<div class="section"><div class="inner">
<div id="hbody">
  <h1>
<? 
$num_s = (is_numeric($_GET["utm_school"])) ? (int) $_GET["utm_school"] : false;

if ($num_s && $num_s > 0 && false): ?>
      <span>Учитесь в школе</span>
      <span class="mkgreen size1"><?=$num_s?></span>?
      <span>Курсы</span>
      <span class="mkgreen">ЕГЭ</span> 
      <span> рядом с вами!</span>
  </h1>
  <div class="h2">
      Всего в 2 минутах от метро Охотный ряд, Театральная, Площадь революции. <br>
      Мини-группы до 5 человек. Подготовка по стандартам ЕГЭ по 14 предметам. <br>
<? else: ?>
      <span>Курсы</span>
      <span class="mkgreen">ЕГЭ</span> 
      <span>и</span> 
      <span class="mkgreen">ОГЭ</span> 
      <span>(ГИА)</span>
  </h1>
  <div class="h2">
      В мини-группах до 5 человек. По методике Юрия Спивака<br>
<? endif ?>

    <?
      // $url = parse_url($_SERVER["HTTP_REFERER"], PHP_URL_HOST);
      if (/*isset($url) && */isset($_GET["utm_term"]) && false) {
        $json_word = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/script/keys_word.json");
        $keys_word = json_decode($json_word, true);
        if ($keys_word[$_GET["utm_term"]])
          echo $keys_word[$_GET["utm_term"]].". "; //strtoupper(preg_replace("/_/", " ", $_GET["utm_term"])).". ";
      }
    ?>
  </div>
</div>
<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://maps.googleapis.com/maps/api/directions/json?origin=55.755920,37.620997&destination=55.752296,37.637361&sensor=false&mode=walking");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

$json = json_decode(curl_exec($ch));

curl_close($ch);

?>
<?php

  // "http://maps.googleapis.com/maps/api/directions/json?origin=55.755920,37.620997&destination=55.752296,37.637361&sensor=false&mode=walking"));
?>

<!-- <script src="/js/jhere.js"></script> -->
<!-- <script src="/js/route.js"></script> -->

<!-- <div id="mapContainer" style="height: 300px; margin-bottom: 30px;"></div> -->
<script type="text/javascript">
// $(document).ready(function () {
//   $.ajax({
//     type: "GET",
//     url: "http://maps.googleapis.com/maps/api/directions/json",
//     data: {
//       origin: "55.755920,37.620997",
//       destination: "55.752296,37.637361",
//       sensor: false,
//       mode: "walking",
//     },
//     success: function (data) {
//       console.log(JSON.parse(data));
//     },
//     dataType: "JSON",
//     jsonpCallback: "callback",
//   });
// });





// $(window).on('load', function() {
//     $('#mapContainer').jHERE({
//         enable: ['behavior', 'zoombar', 'scalebar'],
//         center: [55.749019, 37.624255],
//         zoom: 15,
//       type: 'smart'
//     })
//     .jHERE('route', [55.7523766,37.6397705],
//                     [55.756027, 37.620917],
//            {
//             transportMode: 'pedestrian',
//             width: 3,
//             color: '#444',
//             marker: {
//               text: '#',
//               textColor: '#fff',
//               fill: '#1e90ff'
//             }});
// });

// nokia.Settings.set("app_id", "AfzfISFKZxtIZABSYbsx");
// nokia.Settings.set("app_code", "4lICREWtkvRJpg3obmAlSA");
        
//         var map = new nokia.maps.map.Display(
//           document.getElementById("mapContainer"), {
//             components: [new nokia.maps.map.component.Behavior()],
//             // Zoom level for the map
//             zoomLevel: 15,
//             // Map center coordinates
//             center: [55.749019, 37.624255]
//           }
//         );
//   // Create a route manager
//         var router = new nokia.maps.routing.Manager();
        
//         // Create waypoints
//         var waypoints = new nokia.maps.routing.WaypointParameterList();
        
//         waypoints.addCoordinate(
//           new nokia.maps.geo.Coordinate(55.752283, 37.637361)
//         );
        
//         waypoints.addCoordinate(
//           new nokia.maps.geo.Coordinate(55.756027, 37.620917)
//         );
//         var modes = [{
//           type: "shortest",
//           transportModes: ["pedestrian"]
//         }];
        
//         var onRouteCalculated = function (observedRouter, key, value) {
//           if (value == "finished") {
//             var routes = observedRouter.getRoutes();
        
//             // Create the default map representation of a route
//             var mapRoute = new nokia.maps.routing.component.RouteResultSet(routes[0]).container;
//             map.objects.add(mapRoute);
        
//             // Zoom to the bounding box of the route
//             map.zoomTo(mapRoute.getBoundingBox(), false, "default");
//           } else if (value == "failed") {
//             alert("The routing request failed.");
//           }
//         };
        
//         // Add the observer function to the router's "state" property
//         router.addObserver("state", onRouteCalculated);
        
//         // Calculate the route (and call onRouteCalculated afterwards)
//         router.calculateRoute(waypoints, modes);
</script>
</div>
</div>

<div class="section bg_form" id=""><div class="inner">
<div id="form_slider">
  <div class="bg_lightblue bd_blue remain mkdarkblue">
    <div class="center mp_semibold size3">Уже с 15 октября начинаются занятия в новых группах 7-месячного курса!</div>
    <div class="center bold">Запишитесь в новые группы заранее и получите скидку!</div>
  </div>
  <div class="right">
    <div class="dod">
      <div>
        <div class="h2 mp_semibold mkdarkblue">
          Запишитесь на День открытых <br> дверей и получите скидку!
        </div>
        <div class="">
          <img src="/images/sale_50_sept.png" alt="" style="padding-top: 10px;">
        </div>
        <div class="center mp_regular size1">(скидка на первый месяц обучения)</div>
      </div>
        
      <? include($_SERVER["DOCUMENT_ROOT"]."/script/dod.php"); ?>
    </div>
  </div>
  
</div>

</div></div>

<a href="/oplata/">
<div class="section" id="prepayment">
<!--   <div class="inner">
    <div class="text left">В школе "Хочу знать" группы заполнены на 76%. Чтобы забронировать места в группах, необходимо оплатить курсы или внести небольшую предоплату.</div>
    <div class="yellowbutton right">Подробнее</div>
  </div> -->
</div>
</a>

<div class="section method bg_grey">
<div class="inner">
  <div class="h2 center size5 mksemigrey">Методика Юрия Спивака</div>
  <div>
    <img src="http://master-igor.com/upload/iblock/52a/%D0%AE%D1%80%D0%B0.jpg" alt="">
    <p>Юрий Спивак - выпускник МФТИ, ведущего технического ВУЗа России. В течение 8 лет ведет подготовку школьников к экзаменам ЕГЭ и ОГЭ (ГИА) применяя метод Полного Понимания. Этот метод позволяет быстро подготовиться к экзаменам и сдать их собственными силами.</p>
    <p>Впервые применил эту методику к себе, когда готовился к поступлению в МФТИ. За 3 месяца с абсолютного нуля он поднял свои знания по физике до уровня МФТИ и успешно сдал вступительные экзамены. Основные принципы такой подготовки и легли в основу методики преподавания.</p>
    <p class="center size2"><br>Вы можете записаться в группу именно к Юрию Спиваку на странице <a href="/groups/" tabindex="-1">Выбрать группы</a></p>
  </div>
</div>
</div>

<div class="section result_sec"><div class="inner">

<div class="h2 center mksemigrey size5">Результаты ЕГЭ наших учеников говорят сами за себя</div>
<table class="sresult">
  <tbody>
    <tr>
      <td>
        <span class="mkdarkgrey">Предмет</span>
      </td>
      <td>
        <span class="mkdarkgrey">Средний балл <br> по Москве</span>
      </td>
      <td>
        <span class="mkdarkgrey">Средний балл <br> наших учеников</span>
      </td>
      <td>
        <span class="mkdarkgrey">Максимальный балл <br> наших учеников</span>
      </td>
    </tr>
    <tr>
      <td>
        <span class="mkdarkgrey">Математика</span>
      </td>
      <td>
        <span class="mkdarkgrey">48,72</span>
      </td>
      <td>
        <span class="mkdarkgrey">
          <span>71,41 &nbsp;&nbsp;</span>
          <span class="mkgreen mkbold size1">(+22,69)</span>
        </span>
      </td>
      <td>
        <span class="mkdarkgrey">96</span>
      </td>
    </tr>
    <tr>
      <td>
        <span class="mkdarkgrey">Русский язык</span>
      </td>
      <td>
        <span class="mkdarkgrey">63,38</span>
      </td>
      <td>
        <span class="mkdarkgrey">
          <span>75,05 &nbsp;&nbsp;</span>
          <span class="mkgreen mkbold size1">(+11,67)</span>
        </span>
      </td>
      <td>
        <span class="mkdarkgrey">98</span>
      </td>
    </tr>
    <tr>
      <td>
        <span class="mkdarkgrey">Обществознание</span>
      </td>
      <td>
        <span class="mkdarkgrey">59,46</span>
      </td>
      <td>
        <span class="mkdarkgrey">
          <span>74,95 &nbsp;&nbsp;</span>
          <span class="mkgreen mkbold size1">(+15,49)</span>
        </span>
      </td>
      <td>
        <span class="mkdarkgrey">96</span>
      </td>
    </tr>
    <tr>
      <td>
        <span class="mkdarkgrey">Физика</span>
      </td>
      <td>
        <span class="mkdarkgrey">53,48</span>
      </td>
      <td>
        <span class="mkdarkgrey">
          <span>70,23 &nbsp;&nbsp;</span>
          <span class="mkgreen mkbold size1">(+16,75)</span>
        </span>
      </td>
      <td>
        <span class="mkdarkgrey">94</span>
      </td>
    </tr>
  </tbody>
</table>
<div class="center">* По данным Официального информационного портала ЕГЭ</div>

<div class="center">
  <div class="redbutton">
      <button class="size5" data-click="dod">Записаться на День открытых дверей</button>
  </div>
</div>

</div></div>

<div class="section utp bg_grey"><div class="inner">
<div class="h2 center mksemigrey size5">Ещё <span class="mkgreen size6">6</span> причин заниматься на наших курсах</div>
<table class="main">
  <tr>
    <td>
      <div>
        <img src="/images/shapka.png" alt="">
        <span>589 выпускников за 4 года</span>
      </div>
      <div>Посмотрите <a href="/success/ira-vorobeva/">видеоотзывы</a> наших учеников</div>
    </td>
    <td>
      <div>
        <img src="/upload/medialibrary/445/file.png" alt="">
        <span>3 этапа отбора преподавателей</span>
      </div>
      <div>В среднем 1 из 9 приглашенных претендентов становится преподавателем нашей школы.</div>
    </td>
    <td>
      <div>
        <img src="/images/ege_icon.png" alt="">
        <span>Строго по стандартам ЕГЭ и ОГЭ (ГИА)</span>
      </div>
      <div>Целенаправленная подготовка к ЕГЭ и ОГЭ (ГИА) с учетом изменений ФИПИ в КИМах</div>
    </td>
  </tr>
  <tr>
    <td>
      <div class="bord"></div>
    </td>
    <td>
      <div class="bord"></div>
    </td>
    <td>
      <div class="bord"></div>
    </td>
  </tr>
  <tr>
    <td>
      <div>
        <img src="/images/group_icon.png" alt="">
        <span>Мини-группы <br> до 5 человек</span>
      </div>
      <div>Вы всегда сможете задать вопрос и обсудить ваше выполнение домашнего задания.</div>
    </td>
    <td>
      <div>
        <img src="/images/kreml_icon.png" alt="">
        <span>Центр Москвы</span>
      </div> 
      <div>Центр Москвы. В 2-х минутах от метро Охотный ряд, Театральная, Площадь революции</div>
    </td>
    <td>
      <div>
        <img src="/images/litem3.png" alt="">
        <span>Удобное расписание</span>
      </div>
      <div>Вы укажете время, в которое вам удобно заниматься, и мы подберем вам подходящую группу.</div>
    </td>
  </tr>
</table>
</div></div>

<div class="section sec_univer"><div class="inner">
    
<div class="h2 center mksemigrey size5">Наши ученики поступают в лучшие вузы Москвы</div>
<?

$APPLICATION->IncludeComponent(
  "wn:list", 
  "list_univer", 
  Array(
    "FILTER_BY" => "",
    "IBLOCK_TYPE" => "people",
    "IBLOCK_ID" => "39",
    "NEWS_COUNT" => "100",
    "SORT_BY1" => "ACTIVE_FROM",
    "PROPERTY_CODE" => array("name", "last_name", "photo", "high_school", "department", "soc_link"),
    "SORT_ORDER1" => "DESC",
    "SORT_BY2" => "SORT",
    "SORT_ORDER2" => "DESC",
    // "INTENSIV_ONLY" => "N",
    "CACHE_TYPE" => "N",
    "SET_TITLE" => "N",
    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
    "ADD_SECTIONS_CHAIN" => "N",
    "USE_PERMISSIONS" => "N",
  )
);
?>
</div></div>

<div class="section last_button"><div class="inner">

<div class="center">
  <div class="redbutton">
      <button class="size5" data-click="dod">Записаться на День открытых дверей</button>
  </div>
</div>

<!-- </div></div> -->


<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>