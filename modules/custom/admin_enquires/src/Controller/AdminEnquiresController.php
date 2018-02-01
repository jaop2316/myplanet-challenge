<?php

namespace Drupal\admin_enquires\Controller;

use Drupal\Core\Controller\ControllerBase;

use Drupal\Core\Url;

class AdminEnquiresController extends ControllerBase
{


    static function add($name, $message, $phone, $inquiry, $hotelid)
    {
        db_insert('admin_enquires')->fields(array(
            'name' => $name,
            'email' => $message,
            'phone' => $phone,
            'inquiry' => $inquiry,
            'hotelid' => $hotelid,

        ))->execute();
    }

    static function getAll()
    {
        $result = db_query('SELECT * FROM {admin_enquires}')->fetchAllAssoc('id');
        return $result;
    }

    static function getHotel($hotelid)
    {
        $result = db_query('SELECT title FROM {node_field_data} WHERE nid = :id', array(':id' => $hotelid))->fetchField();
        return $result;
    }

    static function getEnquiry($id)
    {
        $result = db_query('SELECT * FROM {admin_enquires} WHERE id = :id', array(':id' => $id));
        return $result;
    }

    public function content()
    {

        // Table header
        $header = array(
            'name' => t('Submitter name'),
            'email' => t('Email'),
            'hotel' => t('Hotel'),
            'operations' => t('Operations'),
        );

        $rows = array();


        foreach (self::getAll() as $id => $content) {

            $url = Url::fromRoute('admin_enquires_show' ,['id' => $id]);
            $internal_link = \Drupal::l(t('Show'), $url);

            $hotelname = self::getHotel($content->hotelid);

            $rows[] = array(
                'data' => array($content->name, $content->email, $hotelname, $internal_link)
            );
        }

        $table = array(
            '#type' => 'table',
            '#header' => $header,
            '#rows' => $rows,
            '#attributes' => array(
                'id' => 'bd-admin-enquires',
            ),
        );

        return $table;
    }

    public function detail()
    {
        $detailId = \Drupal::request()->attributes->get('id');

        foreach (self::getEnquiry($detailId) as $id => $content) {
            $name = $content->name;
            $email =  $content->email;
            $phone = $content ->phone;
            $inquiry = $content ->inquiry;
            $hotelname = self::getHotel($content->hotelid);
        }

        $enquiryname=$name;
        $enquiryemail = $email;
        $enquiryphone = $phone;
        $inquiry = $inquiry;
        $hotel = $hotelname;

        return array(
            '#theme' => 'admin_enquires',
            '#name' => $enquiryname,
            '#email' => $enquiryemail,
            '#phone' => $enquiryphone,
            '#inquiry' => $inquiry,
            '#hotel' => $hotel,
        );
    }


}