<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

  /**
   * @Route("/default", name="default")
   */
  public function index() {

    $city = "Bryansk"; // город. Можно и по-русски написать, например: Брянск
    $country = "RU"; // страна
    $mode = "json"; // в каком виде мы получим данные json или xml
    $units = "metric"; // Единицы измерения. metric или imperial
    $lang = "ru"; // язык
    $countDay = 1; // количество дней. Максимум 14 дней
    $appID = "0e7e4cba52d6661828c7c6b91be4faaf"; // Ваш APPID
    // формируем урл для запроса
    $url = "http://api.openweathermap.org/data/2.5/forecast?q=$city,$country&cnt=$countDay&lang=$lang&units=$units&appid=$appID";
    $data = @file_get_contents($url);
    // если получили данные
    if ($data) {
      // декодируем полученные данные
      $dataJson = json_decode($data);
      // получаем только нужные данные
      $arrayDays = $dataJson->list;
      foreach ($arrayDays as $oneDay) {
        $weather = $oneDay->main->temp;
      }
    } else {
      $weather = "Сервер не доступен!";
    }

    return $this->render('default/index.html.twig', [
                'weather' => $weather,
    ]);
  }

}
