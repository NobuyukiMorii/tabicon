<?php

App::uses('AppController', 'Controller');

class SitesController extends AppController {

    public $name = 'Site';
    public $uses  = array('Site','Choice');
    public $components = array('Paginator');

    public function add()
    {
        if(!empty($this->request->data))
        {
            if($this->request->data)
            {

                if(!$this->Site->validates())
                {
                    $this->set("error",$this->Site->validationErrors);
                    $this->render("add");
                } else 
                {
                    //滞在時間を秒数に変更する
                    $this->request->data['Site']['staying_time'] = $this->request->data['Site']['staying_time']*60;

                    //住所から緯度と経度を計算する
                    $coordinates = $this->getLatLng($this->request->data['Site']['address']);
                    $geo_info = explode(',', $coordinates);
                    
                    $this->request->data['Site']['latitude'] = $geo_info[0];
                    $this->request->data['Site']['longitude'] = $geo_info[1];

                    //保存する
                    $this->Site->saveAll($this->request->data);
                    $this->Session->setFlash('観光地を登録しました。', 'default', array(), 'success');
                    $this->redirect(array('action'=>'read'));
                }

            }
        }
    }

    public function getLatLng($address)
    {
        $api_uri = 'http://maps.googleapis.com/maps/api/geocode/xml?address='.urlencode($address).'&sensor=false';

        $xml = simplexml_load_file($api_uri);
        $code = $xml->status;
        if ($code == 'OK')
        {
            $lat = $xml->result->geometry->location->lat;
            $lng = $xml->result->geometry->location->lng;
            $coordinates = $lat. ',' . $lng;
        } else 
        {
            $coordinates = false;
        }
        return $coordinates;
    }

    public function read()
    {
        $this->Paginator->settings = array(
                'conditions' => array(
                    "NOT" => array("Site.id" => array("0")),
                ),
        );
        $data = $this->Paginator->paginate('Site');

        $this->set('data',$data);
    }

}