<?php

namespace Drupal\admin_enquires\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\admin_enquires\Controller\AdminEnquiresController;

class EnquireForm extends FormBase
{

  /**
   * {@inheritdoc}
   */
  public function getFormId(){
    return 'enquire_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state){
    $form['name'] = array(
      '#title' => 'Name',
      '#description' => 'Enter your name',
      '#type' => 'textfield',
      '#required' => TRUE,
    );
    $form['email'] = array(
      '#type' => 'email',
      '#title' => t('Email'),
      '#required' => TRUE,
    );
    $form['phone'] = array(
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


  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state){
    $values = array(
      'email' => $form_state->getValue('email'),
    );

    if (!valid_email_address($values['email'])) {
      $form_state->setErrorByName('phone_number', $this->t('Please Enter a valid email address.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state){
    $values = array(
      'name' => $form_state->getValue('name'),
      'email' => $form_state->getValue('email'),
      'phone' => $form_state->getValue('phone'),
      'inquiry' => $form_state->getValue('inquiry'),
      'hotelid' => $form_state->getValue('hotel_id'),

    );
    $node = \Drupal::routeMatch()->getParameter('node');
    $nid = $node->id();

    AdminEnquiresController::add($values['name'], $values['email'], $values['phone'], $values['inquiry'], $nid);

    drupal_set_message($this->t('Your enquires is being submitted!', array('@emp_name' => $form_state->getValue('name'))));

    return;
  }

}