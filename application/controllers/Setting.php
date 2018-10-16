<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: yajima
 * Date: 2018-10月-15
 * Time: 20:10
 * @property Shipings_model $Shipings_model
 */

class Setting extends CI_Controller
{
    var $data = array();

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Shipings_model');
        $this->data['prefectures'] = $this->Shipings_model->load_prefectures();
    }

    public function index()
    {
        redirect('setting/price');
    }

    public function price()
    {
        $template = "setting";

        // TODO: フォーム送信された時の処理
        if ( ! empty($this->input->post('update')) && $this->input->post('update') == "update" && $this->input->post('keyword') == UPDATE_PASSWORD)
        {
            // var_dump($this->input->post(NULL,TRUE));
            $prefecture_ids = $this->input->post('prefecture_id', TRUE);
            $names = $this->input->post('name', TRUE);
            $pricees = $this->input->post('price', TRUE);

            foreach ($pricees as $key => $val)
            {
                $param = array(
                    'prefecture_id' => $prefecture_ids[$key],
                    'name' => $names[$key],
                    'price' => $pricees[$key]
                );
                // var_dump($param);
                $this->Shipings_model->update_shipings($param);
            }
        }

        // TODO: 現在の設定一覧を表示
        $sort = array(
            'prefectures.sort' => 'ASC',
            'shippings.name' => 'ASC'
            );
        $this->data['shipping'] = $this->Shipings_model->search_shipings(NULL, $sort);

        $this->data['title'] = "送料設定";

        $this->load->view($template, $this->data);
    }
}