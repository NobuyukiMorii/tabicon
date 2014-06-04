<?php

App::uses('AppController', 'Controller');

class ChoicesController extends AppController {

    public $name = 'Choice';
    public $uses  = array('Choice','Site','Attachment');
    public $helpers = array('GoogleMap');

    public function index()
    {

    }

    public function search()
    {
        $options = $this->Site->find('list', array(
            'fields' => array('Site.id','Site.name'),
            'recursive' => 0
        ));
        $this->set('options',$options);


    }

    public function result()
    {
        if(!empty($this->request->data))
        {
            if($this->request->data)
            {

                if(!$this->Site->validates())
                {
                    $this->set("error",$this->Site->validationErrors);
                    $this->render("search");
                } else 
                {
                    //出発地点の緯度と経度と名称を取得
                    $StartLatLon = $this->Site->find('all',array(
                        'conditions' => array('Site.id' => $this->request->data['Choice']['start']),
                        'fields' => array('Site.name','address','Site.longitude','Site.latitude','staying_time','price','description','open','close'),
                        'recursive' => 0
                        )
                    );
                    //到着地点の緯度と経度とを取得
                    $GoalLatLon = $this->Site->find('all',array(
                        'conditions' => array('Site.id' => $this->request->data['Choice']['goal']),
                        'fields' => array('Site.name','address','Site.longitude','Site.latitude','staying_time','price','description','open','close'),
                        'recursive' => 0
                        )
                    );
                    //候補地点として出発地点と到着地点以外の観光地の緯度と経度と滞在時間を取得。
                    //現在の時間で開店している箇所のみを表示。（作業がよるなので、今は非表示）
                    $SuggestLatLon = $this->Site->find('all',array(
                        'conditions' => array(
                            "NOT" => array("Site.id" => array($this->request->data['Choice']['start'], $this->request->data['Choice']['goal'],"0")),
                            // 'Site.open <' => strtotime(date("H:i:s")),
                            // 'Site.close >' => strtotime(date("H:i:s"))
                        ),
                        'fields' => array('Site.name','address','Site.longitude','Site.latitude','staying_time','price','description','open','close'),
                        'recursive' => 0,
                        )
                    );
                    //①出発地点と候補地点の歩行時間を取得。
                    $SuggestLatLon = $this->getFromStartTime($StartLatLon,$SuggestLatLon);
                    //②候補地点と到着地点の歩行時間を取得。
                    $SuggestLatLon = $this->getToGoalTime($GoalLatLon,$SuggestLatLon);
                    //①と②と滞在時間を合計して、短い順に並べ替える。
                    $SuggestLatLon = $this->getTotalTime($SuggestLatLon);

                    //寄り道しない場合の時間
                    $DirectRoute = $this->getFromStartTime($StartLatLon,$GoalLatLon);
                    $DirectRoute[0]["TotalTime"] = round($DirectRoute[0]["FromStartTime"]/60);

                    //現在の日付と曜日と時間
                    $week = array("日", "月", "火", "水", "木", "金", "土");
                    $w = date("w");
                    $today = date('Y/n/j');
                    $now = date('H:i');
                    //候補地のデータをビューに渡して、テーブルとして表示。
                    $this->set(compact('StartLatLon','GoalLatLon','SuggestLatLon','DirectRoute','today','now','w','week'));
                    $this->Session->write(compact('StartLatLon','GoalLatLon','SuggestLatLon','DirectRoute','today','now','w','week'));
                }

            }
        } else 
        {
        $info = $this->Session->read('StartLatLon','GoalLatLon','SuggestLatLon','DirectRoute','today','now','w','week');
        pr($info);
        $this->set(Compact($info));
        }
    }

    public function getFromStartTime($StartLatLon,$SuggestLatLon)
    {
        foreach($SuggestLatLon as $key => $value) {
            $api_uri = array($key => $key);

            $api_uri[$key] ='http://maps.googleapis.com/maps/api/distancematrix/xml?origins='.$StartLatLon[0]['Site']['latitude'].','.$StartLatLon[0]['Site']['longitude'].'&destinations='.$value['Site']['latitude'].','.$value['Site']['longitude'].'&mode=walk&language=ja&sensor=false';

            $xml[$key] = array($key => $key);
            $xml[$key] = simplexml_load_file($api_uri[$key]);

            $code[$key] = $xml[$key]->status;

            if ($code[$key] == 'OK')
            {
                $FromStartTime[$key] = $xml[$key]->row->element->duration->value;
                
            } else {
                $FromStartTime[$key] = false;
            }
        }
        //xmlデータを一般の配列にキャスト
        $FromStartTime = json_decode(json_encode($FromStartTime), true);

        //候補地点に、出発地点からの時間を追加
        foreach($SuggestLatLon as $key => $value) {
            $value['Site']['FromStartTime'] = $FromStartTime[$key][0];
            $SuggestLatLon[$key] = $value['Site'];
        }

        return $SuggestLatLon;
    }

    public function getToGoalTime($GoalLatLon,$SuggestLatLon)
    {
        foreach($SuggestLatLon as $key => $value) {
            $api_uri = array($key => $key);

            $api_uri[$key] ='http://maps.googleapis.com/maps/api/distancematrix/xml?origins='.$GoalLatLon[0]['Site']['latitude'].','.$GoalLatLon[0]['Site']['longitude'].'&destinations='.$value['latitude'].','.$value['longitude'].'&mode=walk&language=ja&sensor=false';

            $xml[$key] = array($key => $key);
            $xml[$key] = simplexml_load_file($api_uri[$key]);

            $code[$key] = $xml[$key]->status;

            if ($code[$key] == 'OK')
            {
                $ToGoalTime[$key] = $xml[$key]->row->element->duration->value;
                
            } else {
                $ToGoalTime[$key] = false;
            }
        }
        //xmlデータを一般の配列にキャスト
        $ToGoalTime = json_decode(json_encode($ToGoalTime), true);
        //候補地点に、到着時間までの時間を追加
        foreach($SuggestLatLon as $key => $value) {
            $value['ToGoalTime'] = $ToGoalTime[$key][0];
            $SuggestLatLon[$key] = $value;
        }

        return $SuggestLatLon;
    }

    public function getTotalTime($SuggestLatLon)
    {
        //合計して秒から分に変更
        foreach($SuggestLatLon as $key => $value) {
            $value['TotalTime'] = round(($SuggestLatLon[$key]['staying_time'] + $SuggestLatLon[$key]['FromStartTime'] + $SuggestLatLon[$key]['ToGoalTime'])/60);
            $SuggestLatLon[$key] = $value;
        }

        //時間が短い順び並び替え
        $TotalTime = array();
        foreach ($SuggestLatLon as $value) $TotalTime[] = $value['TotalTime'];
        array_multisort($TotalTime, SORT_ASC, SORT_NUMERIC, $SuggestLatLon);

        return $SuggestLatLon;
    }

    public function detail()
    {
        if(!empty($this->request->data))
        {
            if($this->request->data)
            {        
                // まず全部秒で計算
                //出発時間
                $this->request->data['Choice']['DepartureTimeFromStart'] = strtotime($this->request->data['Choice']['now']);
                //寄り道先への歩行時間
                $this->request->data['Choice']['FromStartTime'] = intval($this->request->data['Choice']['FromStartTime']);
                //寄り道先への到着時間
                $this->request->data['Choice']['AllivalTimeToYorimiti'] = $this->request->data['Choice']['FromStartTime'] + $this->request->data['Choice']['DepartureTimeFromStart'];
                //寄り道先の滞在時間
                $this->request->data['Choice']['staying_time'] = intval($this->request->data['Choice']['staying_time']);
                //寄り道先の出発時間
                $this->request->data['Choice']['DepartureTimeFromYorimiti'] = $this->request->data['Choice']['AllivalTimeToYorimiti'] + $this->request->data['Choice']['staying_time'];
                //目的地までの歩行時間
                $this->request->data['Choice']['ToGoalTime'] = intval($this->request->data['Choice']['ToGoalTime']);
                //目的地の到着時間
                $this->request->data['Choice']['AllivalTimeToGoal'] = $this->request->data['Choice']['ToGoalTime'] + $this->request->data['Choice']['DepartureTimeFromYorimiti'];
                //移動時間合計
                $this->request->data['Choice']['TransTime'] = $this->request->data['Choice']['FromStartTime'] + $this->request->data['Choice']['ToGoalTime'];
                //旅行時間合計
                $this->request->data['Choice']['TotalTime'] = $this->request->data['Choice']['FromStartTime'] + $this->request->data['Choice']['ToGoalTime'] + $this->request->data['Choice']['staying_time'];

                //滞在時間と移動時間の割合を算出
                //寄り道先までの歩行時間割合
                $this->request->data['Choice']['FromStartTimeRate'] = round($this->request->data['Choice']['FromStartTime'] / $this->request->data['Choice']['TotalTime'] * 100);
                //ゴールまでの歩行時間割合
                $this->request->data['Choice']['ToGoalTimeRate'] = round($this->request->data['Choice']['ToGoalTime'] / $this->request->data['Choice']['TotalTime'] * 100);
                //滞在時間の時間割合
                $this->request->data['Choice']['staying_timeRate'] = round($this->request->data['Choice']['staying_time'] / $this->request->data['Choice']['TotalTime'] * 100);
                //移動時間全体の割合
                $this->request->data['Choice']['TransTimeRate'] = round($this->request->data['Choice']['TransTime'] / $this->request->data['Choice']['TotalTime'] * 100);

                //分に変換
                //出発時間
                $this->request->data['Choice']['DepartureTimeFromStart'] = date("H:i",$this->request->data['Choice']['DepartureTimeFromStart']);
                //寄り道先への歩行時間
                $this->request->data['Choice']['FromStartTime'] = round($this->request->data['Choice']['FromStartTime'] / 60);
                //寄り道先への到着時間
                $this->request->data['Choice']['AllivalTimeToYorimiti'] = date("H:i",$this->request->data['Choice']['AllivalTimeToYorimiti']);
                //寄り道先の滞在時間
                $this->request->data['Choice']['staying_time'] = round($this->request->data['Choice']['staying_time'] / 60);
                //寄り道先の出発時間
                $this->request->data['Choice']['DepartureTimeFromYorimiti'] = date("H:i",$this->request->data['Choice']['DepartureTimeFromYorimiti']);
                //目的地までの歩行時間
                $this->request->data['Choice']['ToGoalTime'] = round($this->request->data['Choice']['ToGoalTime'] / 60);
                //目的地の到着時間
                $this->request->data['Choice']['AllivalTimeToGoal'] = date("H:i",$this->request->data['Choice']['AllivalTimeToGoal']);
                //移動時間合計
                $this->request->data['Choice']['TransTime'] = round($this->request->data['Choice']['TransTime'] / 60);
                //合計合計
                $this->request->data['Choice']['TotalTime'] = round($this->request->data['Choice']['TotalTime'] / 60);

                //お店の開店時間・閉店時間
                $this->request->data['Choice']['open'] = date('H:i',strtotime($this->request->data['Choice']['open']));
                $this->request->data['Choice']['close'] = date('H:i',strtotime($this->request->data['Choice']['close']));

                if(!$this->Choice->validates())
                {
                    $this->set("error",$this->Site->validationErrors);
                    $this->render("result");
                } else 
                {
                    //DBとセッションに保存する
                    $data = $this->request->data;
                    $this->Session->write('data',$data);
                    $this->Choice->save($data);
                    $this->set('data',$data);
                }
            }

            $picture = $this->Site->find('first',array(
                'conditions' => array('Site.id' => $this->request->data['Choice']['site_id']),
                    )
            );      
            $this->set('picture',$picture);


        }

    }

    public function map()
    {
    $data = $this->Session->read('data');
    $this->set(compact('data'));
    }

    public function favorite()
    {

    }


}