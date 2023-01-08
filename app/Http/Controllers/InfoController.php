<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    /** Массив искомых валют
     *
     * @var array
     */
    public $valuteArr = [
        'USD',
        'EUR',
        'SEK',
        'JPY',
        'CAD'
    ];

    /** Получает массив данных о валюте и отображает страницу info
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $valute = $this->getValute();

        return view('info', compact('valute'));
    }

    /** Ожидает ajax запрос, возвращает json валюты
     *
     * @return false|string
     */
    public function actionValute()
    {
        if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) && !strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            return json_encode(["error" => "not ajax"]);
        }

        return json_encode($this->getValute());
    }

    /** Получает и обрабатывает XML с информацией о валютах с cbr.ru
     *  возвращает массив с кодом, названием и значением валют
     *
     * @return array
     */
    public function getValute() : array
    {
        $xml = file_get_contents('https://www.cbr.ru/scripts/XML_daily.asp');
        $xml_data = simplexml_load_string($xml);
        $json = json_encode($xml_data);
        $valuteJson = json_decode($json, true)['Valute'];

        $valute = [];
        $i = 0;

        foreach ($valuteJson as $valuteVal) {
            if (in_array($valuteVal['CharCode'], $this->valuteArr)) {
                $valute += [
                    $i => [
                        'code' => $valuteVal['CharCode'],
                        'name' => $valuteVal['Name'],
                        'value' => round(floatval(str_replace(',', '.', $valuteVal['Value'])), 2)
                    ]
                ];
                $i++;
            }
        }

        return $valute;
    }
}
