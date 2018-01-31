<?php

namespace Drupal\admin_enquires\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class EnquireForm extends FormBase {

    public function getFormId() {
        return 'enquire_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state) {

        $form['name'] = array(
            '#title' => 'Name',
            '#description' => 'Enter your name',
            '#type' => 'textfield',
            '#required' => TRUE,
        );

        $form['email'] = array(
            '#type' => 'Email',
            '#title' => t('Email'),
            '#required' => TRUE,
        );

        $form['phone'] = array (
            '#type' => 'textfield',
            '#title' => t('Phone'),
        );

        $form['inquiry'] = array(
            '#title' => 'Inquiry',
            '#description' => 'Enter your inquiry',
            '#type' => 'textarea',
            '#required' => TRUE,
        );

        $form['actions']['#type'] = 'actions';
        $form['actions']['submit'] = array(
            '#type' => 'submit',
            '#value' => $this->t('Save'),
            '#button_type' => 'primary',
        );

        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state) {

        drupal_set_message($this->t('@emp_name ,Your enquires is being submitted!', array('@emp_name' => $form_state->getValue('employee_name'))));

    }
}