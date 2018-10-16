<?php
/**
 * Created by PhpStorm.
 * User: yajima
 * Date: 2018-10月-12
 * Time: 13:05
 */

class Shipings_model extends CI_Model
{
    public function load_prefectures($param = NULL, $orders = array('sort' => 'ASC'))
    {
        $results = array();

        if ($param !== NULL)
        {
            foreach ($param as $key => $val)
            {
                $this->db->where($key, $val);
            }
            unset($key, $val);
        }

        foreach ($orders as $key => $val)
        {
            $this->db->order_by($key, $val);
        }
        unset($key, $val);

        $this->db->from('prefectures');

        $query = $this->db->get();

        foreach ($query->result_array() as $row)
        {
            if ($this->session->has_userdata('prefecture_id'))
            {
                if ($row['id'] === $this->session->prefecture_id)
                {
                    $row['selected'] = 'selected';
                }
                else
                {
                    $row['selected'] = '';
                }
            }
            else
            {
                if ($row['name'] === '福井県')
                {
                    $row['selected'] = 'selected';
                }
                else
                {
                    $row['selected'] = '';
                }
            }
            $results[] = $row;
        }
        return $results;
    }

    public function search_shipings($param = NULL, $orders = array('prefectures.sort' => 'ASC'))
    {
        $results = array();

        if ($param !== NULL)
        {
            foreach ($param as $key => $val)
            {
                $this->db->where($key, $val);
            }
            unset($key, $val);
        }

        foreach ($orders as $key => $val)
        {
            $this->db->order_by($key, $val);
        }
        unset($key, $val);

        $this->db->select('shippings.prefecture_id, shippings.name, shippings.price, prefectures.id, prefectures.name AS prefecture_name, prefectures.sort');
        $this->db->from('shippings');
        $this->db->join('prefectures', 'prefectures.id = shippings.prefecture_id', 'left');

        $query = $this->db->get();

        foreach ($query->result_array() as $row)
        {
            if ($this->session->has_userdata('prefecture_id'))
            {
                if ($row['id'] === $this->session->prefecture_id)
                {
                    $row['selected'] = 'selected';
                }
                else
                {
                    $row['selected'] = '';
                }
            }
            else
            {
                if ($row['name'] === '福井県')
                {
                    $row['selected'] = 'selected';
                }
                else
                {
                    $row['selected'] = '';
                }
            }
            $results[] = $row;
        }
        return $results;
    }

    public function update_shipings($param = NULL)
    {
        $this->db->replace('shippings', $param);

        return TRUE;
    }
}